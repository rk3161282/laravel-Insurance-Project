<!-- extend the default layout  -->
@extends('layout')

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Pricing</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">Pricing</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Start your creative project right plans</h4>
                        <div class="flex-shrink-0 align-self-end">
                            <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link px-3 rounded monthly active" id="monthly" data-bs-toggle="pill" href="#month" role="tab" aria-controls="month" aria-selected="true">Monthly</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-3 rounded yearly" id="yearly" data-bs-toggle="pill" href="#year" role="tab" aria-controls="year" aria-selected="false">Yearly</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="month" role="tabpanel" aria-labelledby="monthly">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-6">
                                        <div class="card mb-xl-0">
                                            <div class="card-body">
                                                <div class="p-2">
                                                    <h5 class="font-size-16">Starter</h5>
                                                    <h1 class="mt-3">$29 <span class="text-muted font-size-16 fw-medium">/ Month</span></h1>
                                                    <p class="text-muted mt-3 font-size-15">For small teams trying out Minia for an unlimited 
                                                        period of time</p>
                                                    <div class="mt-4 pt-2 text-muted">
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Verifide
                                                            work and
                                                            reviews</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                            Ac managers</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                            proposals</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Project
                                                            tracking
                                                        </p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                            Ac managers</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                            proposals</p>
                                                    </div>
        
                                                    <div class="mt-4 pt-2">
                                                        <a href="" class="btn btn-outline-primary w-100">Choose Plan</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!-- end col -->

                                    <div class="col-xl-3 col-sm-6">
                                        <div class="card mb-xl-0">
                                            <div class="card-body">
                                                <div class="p-2">
                                                    <h5 class="font-size-16">Professional</h5>
                                                    <h1 class="mt-3">$49 <span class="text-muted font-size-16 fw-medium">/ Month</span></h1>
                                                    <p class="text-muted mt-3 font-size-15">For larger businesses or those with onal administration needs</p>
                                                    <div class="mt-4 pt-2 text-muted">
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Verifide
                                                            work and
                                                            reviews</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                            Ac managers</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                            proposals</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Project
                                                            tracking
                                                        </p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                            Ac managers</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                            proposals</p>
                                                    </div>
        
                                                    <div class="mt-4 pt-2">
                                                        <a href="" class="btn btn-outline-primary w-100">Choose Plan</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!-- end col -->

                                    <div class="col-xl-3 col-sm-6">
                                        <div class="card bg-primary mb-xl-0">
                                            <div class="card-body">
                                                <div class="p-2">
                                                    <div class="pricing-badge">
                                                        <span class="badge">Featured</span>
                                                    </div>
                                                    <h5 class="font-size-16 text-white">Enterprise</h5>
                                                    <h1 class="mt-3 text-white">$79 <span class="text-white font-size-16 fw-medium">/ Month</span></h1>
                                                    <p class="text-white-50 mt-3 font-size-15">For extra large businesses or those in regulated industries</p>
                                                    <div class="mt-4 pt-2 text-white">
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Verifide
                                                            work and
                                                            reviews</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Dedicated
                                                            Ac managers</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Unlimited
                                                            proposals</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Project
                                                            tracking
                                                        </p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Dedicated
                                                            Ac managers</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Unlimited
                                                            proposals</p>
                                                    </div>
        
                                                    <div class="mt-4 pt-2">
                                                        <a href="" class="btn btn-light w-100">Choose Plan</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!-- end col -->

                                    <div class="col-xl-3 col-sm-6">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div class="p-2">
                                                    <h5 class="font-size-16">Unlimited</h5>
                                                    <h1 class="mt-3">$99 <span class="text-muted font-size-16 fw-medium">/ Month</span></h1>
                                                    <p class="text-muted mt-3 font-size-15">For small teams trying out Minia for an unlimited 
                                                        period of time</p>
                                                    <div class="mt-4 pt-2 text-muted">
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Verifide
                                                            work and
                                                            reviews</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                            Ac managers</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                            proposals</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Project
                                                            tracking
                                                        </p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                            Ac managers</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                            proposals</p>
                                                    </div>
        
                                                    <div class="mt-4 pt-2">
                                                        <a href="" class="btn btn-outline-primary w-100">Choose Plan</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- end tab pane -->
                            <div class="tab-pane fade" id="year" role="tabpanel" aria-labelledby="yearly">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div class="p-2">
                                                    <h5 class="font-size-16">Starter</h5>
                                                    <h1 class="mt-3">$129 <span class="text-muted font-size-16 fw-medium">/ Yearly</span></h1>
                                                    <p class="text-muted mt-3 font-size-15">For small teams trying out Minia for an unlimited 
                                                        period of time</p>
                                                    <div class="mt-4 pt-2 text-muted">
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Verifide
                                                            work and
                                                            reviews</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                            Ac managers</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                            proposals</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Project
                                                            tracking
                                                        </p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                            Ac managers</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                            proposals</p>
                                                    </div>
        
                                                    <div class="mt-4 pt-2">
                                                        <a href="" class="btn btn-outline-primary w-100">Choose Plan</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-3">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div class="p-2">
                                                    <h5 class="font-size-16">Professional</h5>
                                                    <h1 class="mt-3">$149 <span class="text-muted font-size-16 fw-medium">/ Yearly</span></h1>
                                                    <p class="text-muted mt-3 font-size-15">For larger businesses or those with onal administration needs</p>
                                                    <div class="mt-4 pt-2 text-muted">
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Verifide
                                                            work and
                                                            reviews</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                            Ac managers</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                            proposals</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Project
                                                            tracking
                                                        </p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                            Ac managers</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                            proposals</p>
                                                    </div>
        
                                                    <div class="mt-4 pt-2">
                                                        <a href="" class="btn btn-outline-primary w-100">Choose Plan</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-3">
                                        <div class="card bg-primary mb-0">
                                            <div class="card-body">
                                                <div class="p-2">
                                                    <div class="pricing-badge">
                                                        <span class="badge">Featured</span>
                                                    </div>
                                                    <h5 class="font-size-16 text-white">Enterprise</h5>
                                                    <h1 class="mt-3 text-white">$179 <span class="text-white font-size-16 fw-medium">/ Yearly</span></h1>
                                                    <p class="text-white-50 mt-3 font-size-15">For extra large businesses or those in regulated industries</p>
                                                    <div class="mt-4 pt-2 text-white">
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Verifide
                                                            work and
                                                            reviews</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Dedicated
                                                            Ac managers</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Unlimited
                                                            proposals</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Project
                                                            tracking
                                                        </p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Dedicated
                                                            Ac managers</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-light font-size-18 me-2"></i>Unlimited
                                                            proposals</p>
                                                    </div>
        
                                                    <div class="mt-4 pt-2">
                                                        <a href="" class="btn btn-light w-100">Choose Plan</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-3">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <div class="p-2">
                                                    <h5 class="font-size-16">Unlimited</h5>
                                                    <h1 class="mt-3">$199 <span class="text-muted font-size-16 fw-medium">/ Yearly</span></h1>
                                                    <p class="text-muted mt-3 font-size-15">For small teams trying out Minia for an unlimited 
                                                        period of time</p>
                                                    <div class="mt-4 pt-2 text-muted">
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Verifide
                                                            work and
                                                            reviews</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                            Ac managers</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                            proposals</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Project
                                                            tracking
                                                        </p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Dedicated
                                                            Ac managers</p>
                                                        <p class="mb-3 font-size-15"><i class="mdi mdi-check-circle text-secondary font-size-18 me-2"></i>Unlimited
                                                            proposals</p>
                                                    </div>
        
                                                    <div class="mt-4 pt-2">
                                                        <a href="" class="btn btn-outline-primary w-100">Choose Plan</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!-- end col -->
                                </div>
                            </div>
                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Project Plans</h4>
                        <p class="card-title-desc">Call to action pricing table is really crucial to your for your business website. 
                            Make your bids stand-out with amazing options.
                        </p>
                    </div>
                    <!-- end card header -->

                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3">
                                <div class="nav flex-column nav-pills pricing-tab-box" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link mb-3 active" id="v-pills-tab-one" data-bs-toggle="pill" href="#v-price-one" role="tab" aria-controls="v-price-one" aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <i class="bx bx-check-circle h3 mb-0 me-4"></i>
                                            <div class="flex-1">
                                                <h2 class="fw-medium">$29 <span class="text-muted font-size-15">/ Month Plans</span></h2>
                                                <p class="fw-normal mb-0 text-muted">For small teams trying out Minia for an unlimited period of time</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="nav-link mb-3" id="v-pills-tab-two" data-bs-toggle="pill" href="#v-price-two" role="tab" aria-controls="v-price-two" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <i class="bx bx-check-circle h3 mb-0 me-4"></i>
                                            <div class="flex-1">
                                                <h2 class="fw-medium">$79 <span class="text-muted font-size-15">/ Month Plans</span></h2>
                                                <p class="fw-normal mb-0 text-muted">For larger businesses or those with onal administration needs</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="nav-link" id="v-pills-tab-three" data-bs-toggle="pill" href="#v-price-three" role="tab" aria-controls="v-price-three" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <i class="bx bx-check-circle h3 mb-0 me-4"></i>
                                            <div class="flex-1">
                                                <h2 class="fw-medium">$99 <span class="text-muted font-size-15">/ Month Plans</span></h2>
                                                <p class="fw-normal mb-0 text-muted">For extra large businesses or those in regulated industries</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-xl-9">
                                <div class="tab-content text-muted mt-4 mt-xl-0" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-price-one" role="tabpanel" aria-labelledby="v-pills-tab-one">
                                        <div class="table-responsive text-center">
                                            <table class="table table-bordered mb-0 table-centered">
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td style="width: 20%;">
                                                            <div class="py-3">
                                                                <h5 class="font-size-16 mb-0">1 Month</h5>
                                                            </div>
                                                        </td>
                                                        <td style="width: 20%;">
                                                            <div class="py-3">
                                                                <h5 class="font-size-16 mb-0">3 Month</h5>
                                                            </div>
                                                        </td>
                                                        <td style="width: 20%;">
                                                            <div class="py-3">
                                                                <h5 class="font-size-16 mb-0">6 Month</h5>
                                                            </div>
                                                        </td>
                                                        <td style="width: 20%;">
                                                            <div class="py-3">
                                                                <h5 class="font-size-16 mb-0">1 Year</h5>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Users</th>
                                                        <td>1</td>
                                                        <td>3</td>
                                                        <td>5</td>
                                                        <td>7</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Storage</th>
                                                        <td>1 GB</td>
                                                        <td>10 GB</td>
                                                        <td>20 GB</td>
                                                        <td>40 GB</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Domain</th>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-close-circle text-danger font-size-20"></i>
                                                            </div>
                                                        </td>
                                                        <td>1</td>
                                                        <td>2</td>
                                                        <td>4</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Hidden Fees</th>
                                                        <td>Yes</td>
                                                        <td>Yes</td>
                                                        <td>No</td>
                                                        <td>No</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Support</th>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-close-circle text-danger font-size-20"></i>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-check-circle text-success font-size-20"></i>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-check-circle text-success font-size-20"></i>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-check-circle text-success font-size-20"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Update</th>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-close-circle text-danger font-size-20"></i>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-close-circle text-danger font-size-20"></i>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-check-circle text-success font-size-20"></i>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-check-circle text-success font-size-20"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="v-price-two" role="tabpanel" aria-labelledby="v-pills-tab-two">
                                        <div class="table-responsive text-center">
                                            <table class="table table-bordered mb-0 table-centered">
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td style="width: 20%;">
                                                            <div class="py-3">
                                                                <h5 class="font-size-16 mb-0">1 Month</h5>
                                                            </div>
                                                        </td>
                                                        <td style="width: 20%;">
                                                            <div class="py-3">
                                                                <h5 class="font-size-16 mb-0">3 Month</h5>
                                                            </div>
                                                        </td>
                                                        <td style="width: 20%;">
                                                            <div class="py-3">
                                                                <h5 class="font-size-16 mb-0">6 Month</h5>
                                                            </div>
                                                        </td>
                                                        <td style="width: 20%;">
                                                            <div class="py-3">
                                                                <h5 class="font-size-16 mb-0">1 Year</h5>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Users</th>
                                                        <td>1</td>
                                                        <td>3</td>
                                                        <td>5</td>
                                                        <td>7</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Storage</th>
                                                        <td>5 GB</td>
                                                        <td>15 GB</td>
                                                        <td>25 GB</td>
                                                        <td>50 GB</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Domain</th>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-close-circle text-danger font-size-20"></i>
                                                            </div>
                                                        </td>
                                                        <td>3</td>
                                                        <td>4</td>
                                                        <td>8</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Hidden Fees</th>
                                                        <td>Yes</td>
                                                        <td>No</td>
                                                        <td>No</td>
                                                        <td>No</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Support</th>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-check-circle text-success font-size-20"></i>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-check-circle text-success font-size-20"></i>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-check-circle text-success font-size-20"></i>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-check-circle text-success font-size-20"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Update</th>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-close-circle text-danger font-size-20"></i>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-check-circle text-success font-size-20"></i>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-check-circle text-success font-size-20"></i>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-check-circle text-success font-size-20"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="v-price-three" role="tabpanel" aria-labelledby="v-pills-tab-three">
                                        <div class="table-responsive text-center">
                                            <table class="table table-bordered mb-0 table-centered align-middle">
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td style="width: 20%;">
                                                            <div class="py-3">
                                                                <h5 class="font-size-16 mb-0">1 Month</h5>
                                                            </div>
                                                        </td>
                                                        <td style="width: 20%;">
                                                            <div class="py-3">
                                                                <h5 class="font-size-16 mb-0">3 Month</h5>
                                                            </div>
                                                        </td>
                                                        <td style="width: 20%;">
                                                            <div class="py-3">
                                                                <h5 class="font-size-16 mb-0">6 Month</h5>
                                                            </div>
                                                        </td>
                                                        <td style="width: 20%;">
                                                            <div class="py-3">
                                                                <h5 class="font-size-16 mb-0">1 Year</h5>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Users</th>
                                                        <td>1</td>
                                                        <td>3</td>
                                                        <td>5</td>
                                                        <td>7</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Storage</th>
                                                        <td>5 GB</td>
                                                        <td>30 GB</td>
                                                        <td>50 GB</td>
                                                        <td>100 GB</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Domain</th>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-check-circle text-success font-size-20"></i>
                                                            </div>
                                                        </td>
                                                        <td>3</td>
                                                        <td>5</td>
                                                        <td>10</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Hidden Fees</th>
                                                        <td>No</td>
                                                        <td>No</td>
                                                        <td>No</td>
                                                        <td>No</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Support</th>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-check-circle text-success font-size-20"></i>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-check-circle text-success font-size-20"></i>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-check-circle text-success font-size-20"></i>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-check-circle text-success font-size-20"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Update</th>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-check-circle text-success font-size-20"></i>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-check-circle text-success font-size-20"></i>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-check-circle text-success font-size-20"></i>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <i class="mdi mdi-check-circle text-success font-size-20"></i>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
        
    </div> <!-- container-fluid -->
</div>

@endsection