<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Product Details</h3>
                <div>
                    <a href="{{ route('products.list') }}"
                        class="btn btn-primary btn-sm btn-set-task py-2 px-5 text-white text-uppercase">Back to products</a>
                    <a href="{{ route('products.edit', $product->batch_no) }}"
                        class="btn btn-info btn-sm btn-set-task py-2 px-5 text-white text-uppercase">Edit</a>
                    <button wire:click="delete('{{ $product->id }}')"
                        class="btn btn-danger btn-sm btn-set-task py-2 px-5 text-white text-uppercase">Delete</button>
                </div>
            </div>
        </div>
    </div> <!-- Row end  -->

    <div class="row g-3 mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row clearfix g-3">

                        <!-- Product Details Section -->
                        <div class="col-lg-8 col-md-12">
                            <h2 class="fw-bold mb-2">Product Name: <span class="fw-normal">{{ $product->name }}</span>
                            </h2>

                            <!-- Product Rating -->
                            <div class="d-flex align-items-center mb-3">
                                <span class="me-2">Rating: </span>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-half text-warning"></i>
                                <small class="text-muted ms-2">(1,032 ratings)</small>
                            </div>

                            <!-- Product Stock -->
                            <p class="text-success">Current Stock Level: {{ $product->stock }}</p>
                            @php
                                $expiryDate = \Carbon\Carbon::parse($product->expiry_date);
                                $diffInMonths = \Carbon\Carbon::now()->diffInMonths($expiryDate, false);
                            @endphp

                            <p
                                class="{{ $diffInMonths > 2 ? 'text-success' : ($diffInMonths <= 2 && $diffInMonths > 1 ? 'text-warning' : 'text-danger') }}">
                                Expiry Alert: {{ $expiryDate->diffForHumans() }} before expiration
                            </p>


                            <!-- Category and Batch -->
                            <p><strong>Category:</strong> {{ $product->category->name }}</p>
                            <p><strong>Batch Number:</strong> {{ $product->batch_no }}</p>
                            <p><strong>Expiry Date:</strong>
                                {{ \Carbon\Carbon::parse($product->expiry_date)->format('M d, Y') }}</p>

                        </div>

                        <!-- Additional Information (Collapsible or Detail Section) -->
                        <div class="col-lg-12 col-md-12 mt-4">
                            <h5 class="fw-bold">Additional Information</h5>
                            <div class="accordion" id="productDetailsAccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Details
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#productDetailsAccordion">
                                        <div class="accordion-body">
                                            <ul>
                                                <li><strong>Manufacturing Date:</strong>
                                                    {{ $product->manufactured_date }}</li>
                                                <li><strong>Supplier:</strong> {{ $product->supplier }}</li>
                                                <li><strong>Date Added:</strong>
                                                    {{ $product->created_at->format('M d, Y') }}</li>
                                                <li><strong>Last Updated:</strong>
                                                    {{ $product->updated_at->format('M d, Y') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- Row End -->
                </div>
            </div>
        </div>
    </div><!-- Row end  -->
</div>
