<x-guest-layout>
    <div class="auth-card-header">
        <h2 class="auth-card-header-title">
            <i class="bi bi-shield-lock-fill"></i> Reset Password
        </h2>
        <p class="auth-card-header-subtitle">Choose a new password</p>
    </div>

    <div class="px-4 pb-4 pt-3">
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-envelope"></i></span>
                    <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $request->email) }}" placeholder="Enter email" required autofocus autocomplete="username">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-lock"></i></span>
                    <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter new password" required autocomplete="new-password">
                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password', this)" tabindex="-1" aria-label="Show password">
                        <i class="bi bi-eye"></i>
                    </button>
                    @error('password') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-white"><i class="bi bi-lock"></i></span>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm new password" required autocomplete="new-password">
                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password_confirmation', this)" tabindex="-1" aria-label="Show password">
                        <i class="bi bi-eye"></i>
                    </button>
                    @error('password_confirmation') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Reset Password</button>
            </div>
        </form>
    </div>
</x-guest-layout>