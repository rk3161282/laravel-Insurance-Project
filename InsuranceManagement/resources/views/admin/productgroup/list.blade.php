<!-- extend the default layout  -->
@extends('layout')
@section('title', 'Product Group')
@section('styles')
    @parent
    <!-- choices css -->
    <link href="{{ URL::asset('assets/libs/choices.js/public/assets/styles/choices.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('header')
    @parent
@endsection
@section('sidebar')
    @parent
@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product Group</h4>
                        <p class="card-title-desc"></p>
                    </div>
                
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#maingroup" role="tab" aria-selected="true">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Main Group</span>    
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#subgroup" role="tab" aria-selected="false">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Sub Group</span>    
                                </a>
                            </li>
                          
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="maingroup" role="tabpanel">

                                <div class="row">
                                    <div class="col-lg-6">
                                    <input class="form-control" type="hidden" value="" id="main_group_id">
                                        <div>
                                            <div class="form-check form-check-inline mb-3">
                                                <input class="form-check-input" type="radio" name="group_type" id="group_type" checked value="LIFE">
                                                <label class="form-check-label" for="group_type">
                                                    LIFE
                                                </label>
                                            </div>
                                           
                                            <div class="form-check form-check-inline mb-3">
                                                <input class="form-check-input" type="radio" name="group_type" id="group_type" value="NON LIFE">
                                                <label class="form-check-label" for="group_type">
                                                    NON LIFE
                                                </label>
                                            </div>
                                           
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Group Name <span class="error">*</span></label>
                                                <input class="form-control" type="text" value="" id="group_name">
                                            </div>
                                            <div class="mb-3 submitData" style="text-align:center;">
                                                <button class="btn btn-primary" type="button" id="submitData" style="width:100px;">Save</button>
                                                <button class="btn btn-info cancelData" type="button" style="width:100px;">Cancel</button>
                                            </div>
                                            <div class="mb-3 updateData" style="text-align:center;display:none;">
                                                <button class="btn btn-success" type="button" id="updateData" style="width:100px;">Update</button>
                                                <button class="btn btn-info cancelData" type="button" style="width:100px;">Cancel</button>
                                            </div>
                                            
                                        </div>
                                    </div>

                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Main Group List</h4>
                                        <p class="card-title-desc">
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Group Name</th>
                                                        <th>Group Type</th>
                                                        <th>Status</th>
                                                        <th colspan="2">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="main_group_table">
                                                   
                                                </tbody>
                                            </table>
                                            <ul id="divPager" class="pagination" style="display: none;"></ul>
                                            <input type="hidden" id="TotalItems" name="TotalItems"/>
                                            <input type="hidden" id="PageIndex" name="PageIndex"/>
                                            <input type="hidden" id="PageSize" name="PageSize"/>
                                            <input type="hidden" id="TotalPages" name="TotalPages"/>
                                            <input type="hidden" id="start_page" name="start_page"/>
                                            <input type="hidden" id="end_page" name="end_page"/>
                                        </div>

                                    </div>
                                    <!-- end card body -->
                                </div>
                            </div>
                            <div class="tab-pane" id="subgroup" role="tabpanel">
                                 <div class="row">
                                    <div class="col-lg-6">
                                    
                                             <input class="form-control" type="hidden" value="" id="sub_group_id">
                                            <div class="mb-3">
                                                <label for="choices-single-default" class="form-label font-size-13 text-muted">Group Name <span class="error">*</span></label>
                                                <select class="form-control single-select" name="group_id" id="single-select" placeholder="search placeholder">

                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Sub Group Name <span class="error">*</span></label>
                                                <input class="form-control" type="text" value="" id="sub_group_name">
                                            </div>
                                            <div class="mb-3 submitData1" style="text-align:center;">
                                                <button class="btn btn-primary" type="button" id="submitData1" style="width:100px;">Save</button>
                                                <button class="btn btn-info cancelData1" type="button" style="width:100px;">Cancel</button>
                                            </div>
                                            <div class="mb-3 updateData1" style="text-align:center;display:none;">
                                                <button class="btn btn-success" type="button" id="updateData1" style="width:100px;">Update</button>
                                                <button class="btn btn-info cancelData1" type="button" style="width:100px;">Cancel</button>
                                            </div>
                                            
                                    </div>
                                 </div>
                                 <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Sub Group List</h4>
                                        <p class="card-title-desc">
                                        </p>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Group Name</th>
                                                        <th>Sub Group Name</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="sub_group_table">
                                                    
                                                </tbody>
                                            </table>
                                            <ul id="divPager1" class="pagination" style="display: none;"></ul>
                                            <input type="hidden" id="TotalItems1" name="TotalItems"/>
                                            <input type="hidden" id="PageIndex1" name="PageIndex"/>
                                            <input type="hidden" id="PageSize1" name="PageSize"/>
                                            <input type="hidden" id="TotalPages1" name="TotalPages"/>
                                            <input type="hidden" id="start_page1" name="start_page"/>
                                            <input type="hidden" id="end_page1" name="end_page"/>
                                        </div>

                                    </div>
                                    <!-- end card body -->
                                </div>
                                </div>
                                
                            </div>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
           
            <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>


@endsection
@section('footer')
    @parent
@endsection
@section('rightsidebar')
    @parent
@endsection
@section('scripts')
    @parent
<script src="{{ URL::asset('assets/js/pages/product_group.js') }}"></script>


@endsection