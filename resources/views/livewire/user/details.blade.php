<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Admin Profile</h3>
            </div>
        </div>
    </div> <!-- Row end  -->
    <div class="row g-3">
        <div class="col-xl-8 col-lg-8 col-md-12 m-auto">
            <div class="card profile-card flex-column mb-3">
                <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                    <h6 class="mb-0 fw-bold ">Profile</h6>
                </div>
                <div class="card-body d-flex profile-fulldeatil flex-column">
                    <div class="profile-block text-center w220 mx-auto">
                        <a href="#">
                            <img src="assets/images/lg/avatar4.svg" alt="" class="avatar xl rounded img-thumbnail shadow-sm">
                        </a>
                        <button class="btn btn-primary" style="position: absolute;top:15px;right: 15px;" data-bs-toggle="modal" data-bs-target="#editprofile"><i class="icofont-edit"></i></button>
                        <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                        </div>
                    </div>
                    <div class="profile-info w-100">
                        <h6 class="mb-0 mt-2  fw-bold d-block fs-6 text-center">{{ Auth::user()->name }}</h6>
                        <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted text-center mx-auto d-block">{{ Auth::user()->role }}</span>
                        <div class="row g-2 pt-2">
                            <div class="col-xl-12">
                                <div class="d-flex align-items-center">
                                    <i class="icofont-ui-touch-phone"></i>
                                    <span class="ms-2">8109414647 </span>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="d-flex align-items-center">
                                    <i class="icofont-email"></i>
                                    <span class="ms-2">{{ Auth::user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
