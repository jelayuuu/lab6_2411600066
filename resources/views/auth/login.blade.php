<x-guest-layout>
    <!-- Pink header band inside the card -->
    <div class="auth-card-header">
        <h2 class="auth-card-header-title">
            <i class="bi bi-mortarboard-fill"></i> Student Portal
        </h2>
        <p class="auth-card-header-subtitle">Login to your dashboard</p>
    </div>

    <div class="px-4 pb-4 pt-2">
        <x-auth-session-status class="mb-3" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-person"></i></span>
                    <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter email" required autofocus autocomplete="username">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Password with eye toggle -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-lock"></i></span>
                    <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" required autocomplete="current-password">
                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password', this)" tabindex="-1" aria-label="Show password">
                        <i class="bi bi-eye"></i>
                    </button>
                    @error('password') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Remember me -->
            <div class="form-check mb-3">
                <input id="remember_me" type="checkbox" name="remember" class="form-check-input">
                <label for="remember_me" class="form-check-label">Remember Me</label>
            </div>

            <!-- Log in button -->
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>

            <!-- Forgot password -->
            @if (Route::has('password.request'))
                <div class="text-center small mb-2">
                    <a href="{{ route('password.request') }}" class="text-decoration-underline text-muted">Forgot your password?</a>
                </div>
            @endif

            <!-- Register link -->
            @if (Route::has('register'))
                <div class="text-center small">
                    <span class="text-muted">Don't have an account?</span>
                    <a href="{{ route('register') }}" class="text-decoration-underline">Register</a>
                </div>
            @endif
        </form>
    </div>
</x-guest-layout>