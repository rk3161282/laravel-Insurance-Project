<!-- extend the default layout  -->
@extends('layout')
@section('title', 'Service Tax / GST')
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
                        <h4 class="card-title">Create Service Tax / GST</h4>
                    </div>
                    <div class="card-body p-4">
                            <input type="hidden" name="service_tax_id" id="service_tax_id"/>
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <label class="form-check-label" for="tax_type">Tax Type </label>
                                        <div class="form-check form-check-inline mb-3">
                                            <input class="form-check-input" type="checkbox" name="tax_type" id="tax_type" checked value="LIFE">
                                            <label class="form-check-label" for="tax_type">
                                                LIFE
                                            </label>
                                        </div>
                                        
                                        <div class="form-check form-check-inline mb-3">
                                            <input class="form-check-input" type="checkbox" name="tax_type" id="tax_type" value="NON LIFE">
                                            <label class="form-check-label" for="tax_type">
                                                NON LIFE
                                            </label>
                                        </div>
                                    <div>
                                    <div class="mb-3">
                                        <label for="tax_name" class="form-label">Tax Name <span class="error">*</span></label>
                                        <input class="form-control" type="text" value="" id="tax_name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tax_percentage" class="form-label">Tax % <span class="error">*</span></label>
                                        <input class="form-control" type="number" value="" id="tax_percentage">
                                    </div>
                                    <div class="mb-3">
                                        <label for="choices-single-default" class="form-label">Tax Description </label>
                                        <input class="form-control" type="text" value="" id="tax_description">
                                    </div>
                                    <div>
                                        <label class="form-check-label" for="tax_type">Status </label>
                                        <div class="form-check form-check-inline mb-3">
                                            <input class="form-check-input" type="radio" name="active" id="active" checked value="1">
                                            <label class="form-check-label" for="active">
                                                Active
                                            </label>
                                        </div>
                                        
                                        <div class="form-check form-check-inline mb-3">
                                            <input class="form-check-input" type="radio" name="active" id="active" value="0">
                                            <label class="form-check-label" for="status">
                                                Non Active
                                            </label>
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
                        <h4 class="card-title">Service Tax / GST List</h4>
                        <div class="row">
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="search_tax_name" placeholder="Tax Name">
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control single-select" name="search_status" id="search_status" placeholder="search placeholder">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Non Active</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control single-select" name="search_tax_type" id="search_tax_type" placeholder="search placeholder">
                                <option value="">Select Tax Type</option>
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
                                        <th>Tax Name</th>
                                        <th>Tax Percent</th>
                                        <th>Tax Type Life</th>
                                        <th>Tax Type NonLife</th>
                                        <th>Description</th>
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
<script src="{{ URL::asset('assets/js/pages/service_tax_gst.js') }}"></script>
<script>
    let digitValidate = function(ele){
                    console.log(ele.value);
                    ele.value = ele.value.replace(/[^0-9]/g,'');
                }
</script>

@endsection