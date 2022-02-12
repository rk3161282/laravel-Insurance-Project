<!-- extend the default layout  -->
@extends('layout')
@section('title', 'Insurance Branch')
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
                        <h4 class="card-title">Create New Insurance Branch</h4>
                    </div>
                    <div class="card-body p-4">
                            <input type="hidden" name="insurance_branch_id" id="insurance_branch_id"/>
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
                                    </div>
                            </div>
                                <div class="col-md-6">
                                   <label for="insurance_company_id" class="form-label">Name of Insurer <span class="error">*</span></label>
                                    <select class="form-control single-select" name="insurance_company_id" id="insurance_company_id" placeholder="search placeholder">

                                    </select>
                                </div>
                            <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="insurer_office_name" class="form-label">Insurer's Office Name </label>
                                        <input class="form-control" type="text" value="" id="insurer_office_name" placeholder="Insurer's Office Name">
                                    </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="insurer_office_code" class="form-label">Insurer's Office Code </label>
                                        <input class="form-control" type="text" value="" id="insurer_office_code" placeholder="Insurer's Office Code">
                                    </div>
                            </div>
                                  
                                   
                            <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address <span class="error">*</span></label>
                                        <input class="form-control" type="text" value="" id="address" placeholder="Address">
                                    </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="city" class="form-label">City <span class="error">*</span></label>
                                        <input class="form-control" type="text" value="" id="city" placeholder="City">
                                    </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="state" class="form-label">State <span class="error">*</span></label>
                                        <input class="form-control" type="text" value="" id="state" placeholder="State">
                                    </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="country" class="form-label">Country <span class="error">*</span></label>
                                        <input class="form-control" type="text" value="India" id="country" placeholder="Country">
                                    </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="zip_code" class="form-label">Zip Code <span class="error">*</span></label>
                                        <input class="form-control" type="text" value="" oninput='digitValidate(this)'  minlength="6" maxlength="6" id="zip_code" placeholder="Zip Code">
                                    </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="gst_no" class="form-label">Gst No </label>
                                        <input class="form-control" type="text" value="" id="gst_no" placeholder="GST Number">
                                    </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="fax_number" class="form-label">Fax Number </label>
                                        <input class="form-control" type="text" value="" id="fax_number" placeholder="Fax Number">
                                    </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="mobile_number" class="form-label">Mobile Number </label>
                                        <input class="form-control" type="text" value="" oninput='digitValidate(this)'  minlength="10" maxlength="10" id="mobile_number" placeholder="Mobile Number">
                                    </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="phone_number" class="form-label">Phone Number </label>
                                        <input class="form-control" type="text" value="" oninput='digitValidate(this)'  minlength="10" maxlength="10" id="phone_number" placeholder="Phone Number">
                                    </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email </label>
                                        <input class="form-control" type="text" value="" id="email" placeholder="Email">
                                    </div>
                            </div>
                            <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="comment" class="form-label">Comment (if Any) </label>
                                        <textarea class="form-control" id="comment" placeholder="Comment"></textarea>
                                    </div>
                            </div>
                            
                                   
                            <div class="col-md-12">
                                   
                                   
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
                        <h4 class="card-title">Insurance Branch List</h4>
                        <div class="row">
                        <div class="col-sm-2">
                            <input type="text" class="form-control" id="search_insurer_name" placeholder="Insurer Name">
                        </div>
                       
                        <div class="col-sm-2">
                            <select class="form-control single-select" name="search_insurance_type" id="search_insurance_type" placeholder="search placeholder">
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
                                        <th>Insurer Name</th>
                                        <th>Product Type</th>
                                        <th>InsurerOfficeName</th>
                                        <th>InsurerOfficeCode</th>
                                        <th>GSTNO</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Country</th>
                                        <th>ZipCode</th>
                                        <th>FaxNumber</th>
                                        <th>MobileNumber</th>
                                        <th>PhoneNumber</th>
                                        <th>Email</th>
                                        <th>Comment</th>
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
<script src="{{ URL::asset('assets/js/pages/insurance_branch.js') }}"></script>
<script>
    let digitValidate = function(ele){
                    console.log(ele.value);
                    ele.value = ele.value.replace(/[^0-9]/g,'');
                }
</script>

@endsection