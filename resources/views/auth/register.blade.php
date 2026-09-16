<x-guest-layout>
    <div class="auth-card-header">
        <h2 class="auth-card-header-title">
            <i class="bi bi-mortarboard-fill"></i> Student Portal
        </h2>
        <p class="auth-card-header-subtitle">Create your account</p>
    </div>

    <div class="px-4 pb-4 pt-2">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-person"></i></span>
                    <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Enter name" required autofocus autocomplete="name">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-envelope"></i></span>
                    <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter email" required autocomplete="username">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-lock"></i></span>
                    <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" required autocomplete="new-password">
                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password', this)" tabindex="-1" aria-label="Show password">
                        <i class="bi bi-eye"></i>
                    </button>
                    @error('password') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-lock"></i></span>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm password" required autocomplete="new-password">
                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password_confirmation', this)" tabindex="-1" aria-label="Show password">
                        <i class="bi bi-eye"></i>
                    </button>
                    @error('password_confirmation') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>

            <div class="text-center small">
                <a href="{{ route('login') }}" class="text-decoration-underline text-muted">Back to Login</a>
            </div>
        </form>
    </div>
</x-guest-layout>