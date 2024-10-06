<div class="container-xxl">

    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Add User </h3>
                <a href="{{ route('products.list') }}" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Back to users</a>
            </div>
        </div>
    </div> <!-- Row end  -->

    <div class="row g-3 mb-3">

        <div class="col-xl-12 col-lg-12">
            <div class="card mb-3">
                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                    <h6 class="mb-0 fw-bold ">Basic information</h6>
                </div>
                <div class="card-body">
                    <form wire:submit="create">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input wire:model="name" type="text" class="form-control" placeholder="Enter user name" required>
                                @error('name')
                                <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input wire:model="email" type="email" class="form-control" required>
                                @error('email')
                                <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Role</label>
                                <select wire:model="role" class="form-control">
                                    <option value="" selected>Select user role</option>
                                    <option value="inventory manager">Inventory Manager</option>
                                    <option value="admin">Admin</option>
                                </select>
                                @error('role')
                                <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Password</label>
                                <input type="password" wire:model="password" class="form-control" placeholder="Enter password" min="0" required>
                                @error('password')
                                <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Save</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div><!-- Row end  -->

</div>
