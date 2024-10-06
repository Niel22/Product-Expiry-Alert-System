<div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
    <div class="w-100 p-3 p-md-5 card border-0 shadow-sm" style="max-width: 32rem;">
        <!-- Form -->
        <form wire:submit="login" class="row g-1 p-3 p-md-4">
            <div class="col-12 text-center mb-5">
                <h1>Sign in</h1>
                <span>Product Expiry Dashboard.</span>
            </div>
            <div class="col-12">
                <div class="mb-2">
                    <label class="form-label">Email address</label>
                    <input type="email" wire:model="email" class="form-control form-control-lg" placeholder="name@example.com">
                    @error('email')
                    <span class="text-sm text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="mb-2">
                    <div class="form-label">
                        <span class="d-flex justify-content-between align-items-center">
                            Password
                        </span>
                    </div>
                    <input type="password" wire:model="password" class="form-control form-control-lg" placeholder="***************">
                    @error('password')
                    <span class="text-sm text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-lg btn-block btn-light lift text-uppercase" atl="signin">SIGN IN</button>
            </div>
        </form>
        <!-- End Form -->

    </div>
</div>
