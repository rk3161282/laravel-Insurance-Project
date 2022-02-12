<!-- extend the default layout  -->
@extends('layout')
@section('title', 'Product')
@section('styles')
    @parent
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Product</h4>
                    </div>
                    <div class="card-body p-4">
                            <input type="hidden" name="product_id" id="product_id"/>
                        <div class="row">
                            <div class="col-lg-12">
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
                                <div>
                                    <div class="mb-3">
                                        <label for="product_name" class="form-label">Name of the Product <span class="error">*</span></label>
                                        <input class="form-control" type="text" value="" id="product_name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="product_code" class="form-label">Product Code <span class="error">*</span></label>
                                        <input class="form-control" type="search" value="" id="product_code">
                                    </div>
                                    <div class="mb-3">
                                        <label for="choices-single-default" class="form-label">Group Name <span class="error">*</span></label>
                                        <select class="form-control single-select" name="group_id" id="single-select" placeholder="search placeholder">

                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="choices-single-default" class="form-label">Sub Group Name </label>
                                        <select class="form-control single-select" name="group_id" id="sub-single-select" placeholder="search placeholder">

                                        </select>
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
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product List</h4>
                        <div class="row">
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="search_product_name" placeholder="Product Name">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="search_product_code" placeholder="Product Code">
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control single-select" name="group_id" id="search_single_select" placeholder="search placeholder">

                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control single-select" name="group_id" id="search_sub_single_select" placeholder="search placeholder">

                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control single-select" name="group_id" id="product_type" placeholder="search placeholder">
                                <option value="">Select Product Type</option>
                                <option value="LIFE">LIFE</option>
                                <option value="NON LIFE">NON LIFE</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                             <button class="btn btn-success" type="button" id="btnsearch" style="width:100px;">Search</button>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Product Code</th>
                                        <th>Product Group</th>
                                        <th>Product SubGroup</th>
                                        <th>Product Type</th>
                                        <th>Status</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    
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
                <!-- end card -->
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
<script src="{{ URL::asset('assets/js/pages/product.js') }}"></script>


@endsection