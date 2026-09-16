<x-guest-layout>
    <div class="auth-card-header">
        <h2 class="auth-card-header-title">
            <i class="bi bi-key-fill"></i> Forgot Password
        </h2>
        <p class="auth-card-header-subtitle">Reset your account password</p>
    </div>

    <div class="px-4 pb-4 pt-3">
        <p class="small text-muted mb-3">
            Forgot your password? No problem. Just let us know your email
            address and we will email you a password reset link that will
            allow you to choose a new one.
        </p>

        <x-auth-session-status class="mb-3" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-envelope"></i></span>
                    <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter email" required autofocus>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary">Email Password Reset Link</button>
            </div>

            <div class="text-center small">
                <a href="{{ route('login') }}" class="text-decoration-underline text-muted">Back to Login</a>
            </div>
        </form>
    </div>
</x-guest-layout>