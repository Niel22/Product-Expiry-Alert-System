<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Product Close to Expiry</h3>

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
                                <table class="table table-hover align-middle mb-0 nowrap" style="width: 100%;"
                                    role="grid">
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
                                                <td tabindex="0" class="sorting_1">
                                                    <strong>{{ $loop->iteration }}</strong></td>
                                                <td>{{ $alert->name }}</td>
                                                <td><span class="badge p-2 bg-success">{{ $alert->batch_no }}</span>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($alert->expiry_date)->format('M d, Y') }}
                                                </td>
                                                <td>{{ $alert->stock }}</td>
                                                <td>
                                                    @if (
                                                        \Carbon\Carbon::now()->diffInDays($alert->expiry_date) <= 30 &&
                                                            \Carbon\Carbon::now()->diffInDays($alert->expiry_date) > 0)
                                                        <span class="badge bg-warning p-2">
                                                            {{ \Carbon\Carbon::parse($alert->expiry_date)->diffForHumans() }}
                                                        </span>
                                                    @elseif(\Carbon\Carbon::now()->isPast($alert->expiry_date))
                                                        <span class="badge bg-danger p-2">
                                                            Expired
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>{{ $alert->created_at->format('M d, Y') }}</td>

                                                <td class=" dt-body-right">
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic outlined example">
                                                        <a href="{{ route('products.detail', $alert->batch_no) }}"
                                                            class="btn btn-outline-secondary"><i
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
                </div>
            </div>
        </div>
    </div>
</div>
