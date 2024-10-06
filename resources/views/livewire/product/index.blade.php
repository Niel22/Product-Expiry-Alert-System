<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Products List</h3>
                <a href="{{ route('products.add') }}" class="btn btn-primary py-2 px-5 btn-set-task w-sm-100"><i
                        class="icofont-plus-circle me-2 fs-6"></i> Add Product</a>
            </div>
        </div>
    </div> <!-- Row end  -->
    <div class="row g-3 mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div id="myDataTable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="myDataTable_length"><label>Show <select
                                            name="myDataTable_length" aria-controls="myDataTable"
                                            class="form-select form-select-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div id="myDataTable_filter" class="dataTables_filter"><label>Search:<input
                                            type="search" class="form-control form-control-sm" placeholder=""
                                            aria-controls="myDataTable"></label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table
                                    class="table table-hover align-middle mb-0 nowrap"
                                    style="width: 100%;" role="grid">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Batch Number</th>
                                            <th>Expiry Date</th>
                                            <th>Current Stock Level</th>
                                            <th>Expiry Alert</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $index => $product)
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1"><strong>{{ $loop->iteration }}</strong></td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->batch_no }}</td>
                                            <td>{{ \Carbon\Carbon::parse($product->expiry_date)->format('d M, Y') }}</td>
                                            <td>{{ $product->stock }}</td>
                                            <td>
                                                @php
                                                    $expiryDate = \Carbon\Carbon::parse($product->expiry_date);
                                                    $diffInDays = \Carbon\Carbon::now()->diffInDays($expiryDate, false);
                                                @endphp

                                                @if ($diffInDays > 30)
                                                    <span class="badge bg-success p-2">{{ $expiryDate->diffForHumans() }}</span>
                                                @elseif ($diffInDays <= 30 && $diffInDays > 0)
                                                    <span class="badge bg-warning p-2">{{ $expiryDate->diffForHumans() }}</span>
                                                @elseif ($diffInDays <= 0)
                                                    <span class="badge bg-danger p-2">Expired</span>
                                                @endif
                                            </td>

                                            <td class=" dt-body-right">
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    <a href="{{ route('products.detail', $product->batch_no) }}" class="btn btn-outline-secondary"><i class="icofont-eye text-info"></i></a>
                                                    <a href="product-edit.html" class="btn btn-outline-secondary"><i class="icofont-edit text-success"></i></a>
                                                    <button type="button" wire:click="delete('{{ $product->id }}')" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
