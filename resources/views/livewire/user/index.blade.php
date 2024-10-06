<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Users List</h3>
                <a href="{{ route('users.add') }}" class="btn btn-primary py-2 px-5 btn-set-task w-sm-100"><i
                        class="icofont-plus-circle me-2 fs-6"></i> Add User</a>
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
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Date Added</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $index => $user)
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1"><strong>{{ $loop->iteration }}</strong></td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="text-capitalize">{{ $user->role }}</td>
                                            <td>{{ $user->created_at->format('d M Y') }}</td>
                                            <td class=" dt-body-right">
                                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                    @if($user->role == 'inventory manager')
                                                    <a href="javascript:void(0)" class="btn btn-outline-secondary"><i class="icofont-edit text-success"></i></a>
                                                    <button type="button" class="btn btn-outline-secondary deleterow"><i class="icofont-ui-delete text-danger"></i></button>
                                                    @endif
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
