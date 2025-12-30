<x-guest-layout>
    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="form-label">
                <i class="fas fa-envelope me-2"></i>Adresse Email
            </label>
            <div class="input-icon">
                <i class="fas fa-envelope"></i>
                <input id="email" class="form-control @error('email') is-invalid @enderror"
                       type="email"
                       name="email"
                       value="{{ old('email') }}"
                       required
                       autofocus
                       autocomplete="username"
                       placeholder="votre@email.com">
            </div>
            @error('email')
                <div class="text-danger mt-2" style="font-size: 0.875rem;">
                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                </div>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="form-label">
                <i class="fas fa-lock me-2"></i>Mot de passe
            </label>
            <div class="input-icon">
                <i class="fas fa-lock"></i>
                <input id="password" class="form-control @error('password') is-invalid @enderror"
                       type="password"
                       name="password"
                       required
                       autocomplete="current-password"
                       placeholder="••••••••">
            </div>
            @error('password')
                <div class="text-danger mt-2" style="font-size: 0.875rem;">
                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                </div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="form-check">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label for="remember_me" class="form-check-label">
                Se souvenir de moi
            </label>
        </div>

        <!-- Submit Button -->
        <div class="mt-4">
            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt me-2"></i>Se connecter
            </button>
        </div>

        <!-- Forgot Password -->
        @if (Route::has('password.request'))
            <div class="forgot-password">
                <a href="{{ route('password.request') }}">
                    Mot de passe oublié ?
                </a>
            </div>
        @endif
    </form>
</x-guest-layout>
