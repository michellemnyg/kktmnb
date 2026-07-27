<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman auth.blade.php
    public function showLogin()
    {
        // Jika sudah login, tendang langsung ke dashboard
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth');
    }

    // Memproses data login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nip' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $this->ensureIsNotRateLimited($request);

        // Cek kecocokan NIP dan Password di database
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            \Illuminate\Support\Facades\RateLimiter::clear($this->throttleKey($request));
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        \Illuminate\Support\Facades\RateLimiter::hit($this->throttleKey($request));

        // Jika salah, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'nip' => 'NIP atau Password yang Anda masukkan salah.',
        ])->onlyInput('nip');
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function ensureIsNotRateLimited(Request $request): void
    {
        if (! \Illuminate\Support\Facades\RateLimiter::tooManyAttempts($this->throttleKey($request), 5)) {
            return;
        }

        event(new \Illuminate\Auth\Events\Lockout($request));

        $seconds = \Illuminate\Support\Facades\RateLimiter::availableIn($this->throttleKey($request));

        throw \Illuminate\Validation\ValidationException::withMessages([
            'nip' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    protected function throttleKey(Request $request): string
    {
        return \Illuminate\Support\Str::transliterate(\Illuminate\Support\Str::lower($request->input('nip')).'|'.$request->ip());
    }

    // Memproses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}