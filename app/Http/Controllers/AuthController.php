<?php

namespace App\Http\Controllers;

use App\Models\AdminUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function create(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('dashboard.overview');
        }

        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $user = AdminUser::query()
            ->where('email_admin', $credentials['email'])
            ->first();

        $passwordMatches = $user && (
            Hash::check($credentials['password'], $user->password_admin)
            || hash_equals($user->password_admin, $credentials['password'])
        );

        if (! $passwordMatches) {
            return back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors([
                    'email' => 'Credenciais inválidas.',
                ]);
        }

        if ($user && hash_equals($user->password_admin, $credentials['password'])) {
            $user->forceFill([
                'password_admin' => Hash::make($credentials['password']),
            ])->save();
        }

        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard.overview'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
