<!-- extend the default layout  -->
@extends('layout')
@section('title', 'Insurance Company')
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
                        <h4 class="card-title">Create New Insurance Company</h4>
                    </div>
                    <div class="card-body p-4">
                            <input type="hidden" name="insurance_id" id="insurance_id"/>
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
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="insurer_name" class="form-label">Name of Insurer <span class="error">*</span></label>
                                        <input class="form-control" type="text" value="" id="insurer_name" placeholder="Name of Insurer">
                                    </div>
                                </div>
                            <div class="col-md-6">
                                    <div class="mb-3 brokeragelife_firstyear_show">
                                        <label for="brokeragelife_firstyear" class="form-label">First Year <span class="error">*</span></label>
                                        <input class="form-control" min="0" type="number" value="" id="brokeragelife_firstyear" placeholder="First Year">
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="mb-3 brokeragelife_secondyear_show">
                                        <label for="brokeragelife_secondyear" class="form-label">Second Year <span class="error">*</span></label>
                                        <input class="form-control" type="number" min="0"  value="" id="brokeragelife_secondyear" placeholder="Second Year">
                                    </div>
                            </div>
                                  
                                   
                            <div class="col-md-3">
                                    <div class="mb-3 brokeragenonlife_BP_show" style="display:none;">
                                        <label for="brokeragenonlife_BP" class="form-label">Brokerage on BP <span class="error">*</span></label>
                                        <input class="form-control" type="number" min="0"  value="" id="brokeragenonlife_BP" placeholder="Brokerage on BP">
                                    </div>
                            </div>
                                  
                                   
                            <div class="col-md-3">
                                    <div class="mb-3 brokeragenonlife_TP_show" style="display:none;">
                                        <label for="brokeragenonlife_TP" class="form-label">Brokerage on TP <span class="error">*</span></label>
                                        <input class="form-control" type="number" min="0"  value="" id="brokeragenonlife_TP" placeholder="Brokerage on TP">
                                    </div>
                            </div>
                                  
                                   
                            <div class="col-md-6">
                                    <div class="mb-3 brokeragenonlife_rewards_show" style="display:none;">
                                        <label for="brokeragenonlife_rewards" class="form-label">Rewards </label>
                                        <input class="form-control" type="text" value="" id="brokeragenonlife_rewards" placeholder="Rewards">
                                    </div>
                            </div>
                                  
                                   
                            <div class="col-md-6">

                                    <div class="mb-3 brokeragenonlife_terrorism_show" style="display:none;">
                                        <label for="brokeragenonlife_terrorism" class="form-label">Torrorism </label>
                                        <input class="form-control" type="text" value="" id="brokeragenonlife_terrorism" placeholder="Torrorism">
                                    </div>
                            </div>
                                  
                                   
                            <div class="col-md-6">

                                    <div class="mb-3 other_show" style="display:none;">
                                        <label for="other" class="form-label">Other </label>
                                        <input class="form-control" type="text" value="" id="other" placeholder="Other">
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
                        <h4 class="card-title">Insurance Company List</h4>
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
                                        <th>BrokerageLifeFirstYaer</th>
                                        <th>BrokerageLifeSecondYaer</th>
                                        <th>BrokerageNonLifeBP</th>
                                        <th>BrokerageNonLifeTP</th>
                                        <th>BrokerageNonLifeReward</th>
                                        <th>BrokerageNonLifeTorrorism</th>
                                        <th>Other</th>
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
<script src="{{ URL::asset('assets/js/pages/insurance_company.js') }}"></script>
<script>
    let digitValidate = function(ele){
                    console.log(ele.value);
                    ele.value = ele.value.replace(/[^0-9]/g,'');
                }
</script>

@endsection