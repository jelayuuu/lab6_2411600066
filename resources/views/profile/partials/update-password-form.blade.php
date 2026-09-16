<section>
    <header class="mb-4">
        <h2 class="h4 fw-bold">Update Password</h2>
        <p class="text-muted small mb-0">Ensure your account is using a long, random password to stay secure.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">Current Password</label>
            <div class="position-relative">
                <input id="update_password_current_password" name="current_password" type="password" class="form-control pe-5 @error('current_password', 'updatePassword') is-invalid @enderror" autocomplete="current-password">
                <button type="button" class="btn btn-link position-absolute top-50 end-0 translate-middle-y text-muted pe-3 text-decoration-none" onclick="togglePassword('update_password_current_password', this)" tabindex="-1" aria-label="Show password">
                    <i class="bi bi-eye"></i>
                </button>
                @error('current_password', 'updatePassword') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">New Password</label>
            <div class="position-relative">
                <input id="update_password_password" name="password" type="password" class="form-control pe-5 @error('password', 'updatePassword') is-invalid @enderror" autocomplete="new-password">
                <button type="button" class="btn btn-link position-absolute top-50 end-0 translate-middle-y text-muted pe-3 text-decoration-none" onclick="togglePassword('update_password_password', this)" tabindex="-1" aria-label="Show password">
                    <i class="bi bi-eye"></i>
                </button>
                @error('password', 'updatePassword') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">Confirm Password</label>
            <div class="position-relative">
                <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control pe-5 @error('password_confirmation', 'updatePassword') is-invalid @enderror" autocomplete="new-password">
                <button type="button" class="btn btn-link position-absolute top-50 end-0 translate-middle-y text-muted pe-3 text-decoration-none" onclick="togglePassword('update_password_password_confirmation', this)" tabindex="-1" aria-label="Show password">
                    <i class="bi bi-eye"></i>
                </button>
                @error('password_confirmation', 'updatePassword') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">Save</button>

            @if (session('status') === 'password-updated')
                <span class="text-muted small">Saved.</span>
            @endif
        </div>
    </form>
</section>