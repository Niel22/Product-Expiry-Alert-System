<div class="container-xxl">

    <div class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
        <div class="col">
            <div class="alert-success alert mb-0">
                <div class="d-flex align-items-center">
                    <div class="avatar rounded no-thumbnail bg-success text-light">
                        <i class="icofont-truck-loaded fs-5"></i> <!-- Icon for Total Products -->
                    </div>
                    <div class="flex-fill ms-3 text-truncate">
                        <div class="h6 mb-0">Total Products</div>
                        <span class="small">{{ $total_products }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="alert-danger alert mb-0">
                <div class="d-flex align-items-center">
                    <div class="avatar rounded no-thumbnail bg-warning text-light">
                        <i class="fa fa-exclamation-triangle fa-lg"></i> <!-- Icon for Products Expiring Soon -->
                    </div>
                    <div class="flex-fill ms-3 text-truncate">
                        <div class="h6 mb-0">Products Expiring Soon</div>
                        <span class="small">{{ $alerts->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="alert-warning alert mb-0">
                <div class="d-flex align-items-center">
                    <div class="avatar rounded no-thumbnail bg-danger text-light">
                        <i class="fa fa-times-circle fa-lg"></i> <!-- Icon for Expired Products -->
                    </div>
                    <div class="flex-fill ms-3 text-truncate">
                        <div class="h6 mb-0">Expired Products</div>
                        <span class="small">{{ $expired->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Row end -->


    <div class="row g-3 mb-3">
        <div class="col-md-12">
            <div class="card">
                <div
                    class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                    <h6 class="m-0 fw-bold">Products Expiring Soon</h6>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover align-middle mb-0 nowrap" style="width: 100%;" role="grid">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Batch Number</th>
                                <th>Expiry Date</th>
                                <th>Current Stock Level</th>
                                <th>Expiry Alert</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($alerts as $index => $alert)
                            <tr role="row" class="odd">
                                <td tabindex="0" class="sorting_1"><strong>{{ $loop->iteration }}</strong></td>
                                <td>{{ $alert->name }}</td>
                                <td><span class="badge p-2 bg-success">{{ $alert->batch_no }}</span></td>
                                <td>{{ \Carbon\Carbon::parse($alert->expiry_date)->format('M d, Y') }}</td>
                                <td>{{ $alert->stock }}</td>
                                <td><span class="badge bg-warning p-2">{{ \Carbon\Carbon::parse($alert->expiry_date)->diffForHumans() }}</span></td>
                                <td>{{ $alert->created_at->format('M d, Y') }}</td>
                                <td class=" dt-body-right">
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="{{ route('products.detail', $alert->batch_no) }}" class="btn btn-outline-secondary"><i
                                                class="icofont-eye text-info"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8">
                                    <div class="alert alert-info text-center">
                                        No Product is expiring in 30 days time
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div><!-- Row end  -->

    <div class="row g-3 mb-3">
        <div class="col-md-12">
            <div class="card">
                <div
                    class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                    <h6 class="m-0 fw-bold">Expired Products</h6>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover align-middle mb-0 nowrap" style="width: 100%;" role="grid">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Batch Number</th>
                                <th>Expiry Date</th>
                                <th>Current Stock Level</th>
                                <th>Expiry Alert</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($expired as $index => $product)
                            <tr role="row" class="odd">
                                <td tabindex="0" class="sorting_1"><strong>{{ $loop->iteration }}</strong></td>
                                <td>{{ $product->name }}</td>
                                <td><span class="badge p-2 bg-success">{{ $product->batch_no }}</span></td>
                                <td>{{ \Carbon\Carbon::parse($product->expiry_date)->format('M d, Y') }}</td>
                                <td>{{ $product->stock }}</td>
                                <td><span class="badge p-2 bg-danger">{{ \Carbon\Carbon::parse($product->expiry_date)->diffForHumans() }}</span></td>
                                <td>{{ $product->created_at->format('M d, Y') }}</td>
                                <td class=" dt-body-right">
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="{{ route('products.detail', $product->batch_no) }}" class="btn btn-outline-secondary"><i
                                                class="icofont-eye text-info"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8">
                                    <div class="alert alert-info text-center">
                                        No Expired Products
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div><!-- Row end  -->

    <div class="d-flex justify-content-center align-content-center p-2">
        <a href="{{ route('products.expiry') }}" class="btn btn-secondary w-full">View All Expiry Alerts</a>
    </div>

</div>
