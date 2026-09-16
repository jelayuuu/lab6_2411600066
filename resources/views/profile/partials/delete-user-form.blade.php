<section>
    <header class="mb-4">
        <h2 class="h4 fw-bold text-danger">Delete Account</h2>
        <p class="text-muted small mb-0">Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
    </header>

    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
        Delete Account
    </button>

    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmUserDeletionLabel">Are you sure you want to delete your account?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <p class="small text-muted">Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.</p>

                        <div class="mb-2">
                            <label for="delete_account_password" class="form-label visually-hidden">Password</label>
                            <div class="position-relative">
                                <input id="delete_account_password" name="password" type="password" class="form-control pe-5 @error('password', 'userDeletion') is-invalid @enderror" placeholder="Password">
                                <button type="button" class="btn btn-link position-absolute top-50 end-0 translate-middle-y text-muted pe-3 text-decoration-none" onclick="togglePassword('delete_account_password', this)" tabindex="-1" aria-label="Show password">
                                    <i class="bi bi-eye"></i>
                                </button>
                                @error('password', 'userDeletion') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>