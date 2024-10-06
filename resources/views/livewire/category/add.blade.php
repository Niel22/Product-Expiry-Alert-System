<div class="container-xxl">

    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Add Category </h3>
                <a href="{{ route('products.list') }}" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Back to Categories</a>
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
                            <div class="col-md-12">
                                <label class="form-label">Category Name</label>
                                <input wire:model="name" type="text" class="form-control" placeholder="Enter product name" required>
                                @error('name')
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