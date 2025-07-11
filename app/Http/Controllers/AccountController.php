<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;
use App\Models\Product;

class AccountController extends Controller
{
    // Affiche la page "Mon compte"
    public function show()
    {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    return view('account');
    }

    /**
 * Affiche le formulaire de connexion pour les utilisateurs.
 *
 * Laravel redirige automatiquement les utilisateurs non authentifiés
 * vers la route nommée 'login' lorsqu'une route protégée par le middleware 'auth' est appelée.
 * Cette méthode fournit la vue correspondante pour éviter l'erreur "Route [login] not defined".
 */
public function showLoginForm()
{
    return view('login');
}


    // 🔐 Connexion utilisateur OU admin (détection manuelle)
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 1️⃣ Vérifie si c'est un admin
        $admin = Admin::where('email', $credentials['email'])->first();
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            session(['admin_id' => $admin->id]); // simple session pour admin
            return redirect()->route('admin.dashboard');
        }

        // 2️⃣ Sinon, tentative utilisateur standard
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ])->withInput();
    }

    // 📝 Inscription utilisateur
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Création automatique du panier
        $user->panier()->create([]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    // 👤 Tableau de bord utilisateur
    public function dashboard()
    {
        return view('dashboarduser');
    }

    // 👑 Tableau de bord admin
    public function adminDashboard()
    {
        if (!session()->has('admin_id')) {
            return redirect()->route('mon-compte')->withErrors(['email' => 'Accès refusé.']);
        }

        $nombreProduits = Product::count();
        $produitsStock = Product::where('stock', '>', 0)->count();
        $dernierProduit = Product::latest()->first();

        return view('backoffice.dashboard', compact(
            'nombreProduits',
            'produitsStock',
            'dernierProduit'
        ));
    }

    // 🔓 Déconnexion
    public function logout(Request $request)
    {
        session()->forget('admin_id');
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
