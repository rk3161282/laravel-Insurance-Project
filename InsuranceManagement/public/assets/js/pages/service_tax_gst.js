
$(document).ready(function () {   
    // document.getElementById("txtFromDate").value = GetCurrentDate();
    // document.getElementById("txtToDate").value = GetCurrentDate();

    loadData(Constant.DefaultPageIndex, Constant.DefaultPageSize, SiteUrl.SericeTaxGstList, PageType.Pending, Constant.countQuery);
    
    // $('#txtFromDate').datetimepicker({
    //     format: 'Y-m-d',
    //     maxDate: 0,
    //     timepicker: false,
    //     step: 1,
    // });

    // $('#txtToDate').datetimepicker({
    //     onShow: function (ct) {
    //         this.setOptions({
    //             minDate: $('#txtFromDate').val(),
    //             // maxDate: getlastDate($('#txtFromDate').val()),
    //         })
    //     },
    //     format: 'Y-m-d',
    //     timepicker: false,
    //     step: 1,
    // });

    // $("#txtFromDate").on('change', function (e) {
    //     var from = $('#txtFromDate').val();
    //     $('#txtToDate').val(from);
    // });
    
});
function getlastDate(from) {
    var tyd = new Date();
    var mma;
    var reload_dt = new Date(from);
    var lastDay = new Date(reload_dt.getFullYear(), reload_dt.getMonth() + 1, 0);
    if (lastDay.getTime() > tyd.getTime()) {
        mma = tyd;
    } else {
        mma = lastDay;
    }

    return mma;
}

$('#btnsearch').click(function () {
    loadData(Constant.DefaultPageIndex, Constant.DefaultPageSize, SiteUrl.SericeTaxGstList, PageType.All, Constant.countQuery);
});
//Complain Check
function ComplianCheck(txn_id, status) {
   
        $('#compliants').modal('show');
        $('#accountt').html(txn_id);
        $('#ticket_id').val(txn_id);
        var ticket_id = txn_id;
        var user_id = 1;
        var searchModel = { ticket_id : ticket_id};
          $.ajax({
            url: base_url+""+SiteUrl.GetParticularTicketDetails,
            type: Constant.Post,
            contentType: Constant.ContentType,
            data: JSON.stringify(searchModel),
            dataType: Constant.Json,
            success: function (result) {
                if (result.status == 200)
                {          
                    var div;
                    $("#chat").empty();
                    var chat_content;
                    var list = result.data;        
                    
                    if (list != null && list != undefined && list.length >0) {
                        $.each(list, function (index, item) {
                            var name = item.first_name+" "+item.last_name;
                            var dateStringWithTime = moment(item.created_at).format('YYYY-MM-DD HH:MM:SS');
                            debugger
                            if(item.entry_by == user_id){
                                //me
                                chat_content = '<li class="me"><div class="entete"><h3 style="padding-right: 10px;">'+dateStringWithTime+'</h3><h2> Admin</h2><span class="status blue"></span></div><div class="triangle"></div><div class="message">'+item.message+'</div></li>';
                                
                            }else{
                                //you
                                chat_content = '<li class="you"><div class="entete"><span class="status green"></span><h2>'+name+'</h2><h3 style="padding-left: 10px;">'+dateStringWithTime+'</h3></div><div class="triangle"></div><div class="message">'+item.message+'</div></li>';
                            }
                        

                            $("#chat").append(chat_content);
                        });
                    }
                    else
                    {
                        
                        div.append('<p valign="top" colspan="15" class="centerCss BoldCss">Oops! Data Not Found</p>');                                 
                        $('#chat').append(div);
                    }   
                }
                else {
                    ShowNotification('error', 'Error', result.message);                    
                }
            },
            error: function (errormessage) {
                ShowNotification('error', 'Error', 'Error..');                
            }
        });

}

function generateSupport(){
    var message = $("#message").val();
    var ticket_status = $("#ticket_status").val();
    debugger
   var ticket_id = $("#ticket_id").val();
   var user_id = $("#user_id").val();
    
    var searchModel = { message: message,ticket_id : ticket_id,user_id:user_id,ticket_status:ticket_status };

        $.ajax({
            url: base_url+""+SiteUrl.generateSupportDetailsadmin,
            type: Constant.Post,
            contentType: Constant.ContentType,
            data: JSON.stringify(searchModel),
            dataType: Constant.Json,
            success: function (result) {
                if (result.status == 200)
                {                    
                    $("#message").val("");
                    ShowNotification('success', 'Success', result.message);     
                    window.location.href = base_url+"/admin/AdminsupportTicketList";
                    $('#compliants').modal('hide');
                }
                else {
                    ShowNotification('error', 'Error', result.message);                    
                }
            },
            error: function (errormessage) {
                ShowNotification('error', 'Error', 'Error..');                
            }
        });
    }

$('#ComSubmit').click(function () {
    $('#compliants').modal('hide');
    debugger
    var CompType = $('#ctype option:selected').val();
    var ComplainRemark = $('#compremark option:selected').val();
    var TransId = $('#txn_id').val();  
    var RightAccountNo = $('#RightAccountNo').val();
    var user_id = $('#user_id').val();
    var searchModel = { '_token': $('meta[name="_token"]').attr('content'),TransId: TransId, CompType: CompType, CompRemark: ComplainRemark, RightAccountNo: RightAccountNo,user_id:user_id };
   
        $.ajax({
            url: base_url+""+SiteUrl.GetAccountStatementInfo,
            type: Constant.Post,
            contentType: Constant.ContentType,
            data: JSON.stringify(searchModel),
            dataType: Constant.Json,
            success: function (result) {
                if (result.Status)
                {                    
                    ShowNotification('success', 'Success', 'Status ' + result.Message);
                    $('#compremark').val('Recharge Not Success');
                    $('#accountt').html('');                   
                    $('#txn_id').val(0);
                    $('#RightAccountNo').val('');
                    $('#ctype').val('Customer Balance Not Received');
                }
                else {
                    ShowNotification('error', 'Error', result.Message);                    
                }
            },
            error: function (errormessage) {
                ShowNotification('error', 'Error', 'Error..');                
            }
        });

});
function Pagination(pageIndex, pageSize, UrlType)
{
    if (UrlType == PageType.Pending) {
        loadData(pageIndex, pageSize, SiteUrl.SericeTaxGstList, PageType.Pending, Constant.countQuery = false);
    }
    else
    {
        loadData(pageIndex, pageSize, SiteUrl.SericeTaxGstList, PageType.All, Constant.countQuery = false);
    }
}


//Load Data function
function loadData(pageIndex, pageSize,RequestUrl,UrlType, countQuery) {
    // var SearchByValue = $('#txtsearchbyvalue').val();
    

    var PageIndex = pageIndex;
    var PageSize = pageSize;

    var PageIndex = pageIndex;
    var PageSize = pageSize;
    var countQuery = countQuery;
    var TotalItems = $('#TotalItems').val();
    var TotalPages = $('#TotalPages').val();
    var start_page = $('#start_page').val();
    var end_page = $('#end_page').val();

    var search_tax_name = $("#search_tax_name").val();
    var search_tax_type = $("#search_tax_type").val();
    var search_status = $("#search_status").val();

    var searchModel = {  '_token': $('meta[name="_token"]').attr('content'),PageIndex: PageIndex, PageSize: PageSize, countQuery:countQuery, TotalItems : TotalItems, TotalPages : TotalPages, start_page : start_page, end_page : end_page,  SearchParams: {search_tax_name:search_tax_name,search_tax_type:search_tax_type,search_status:search_status } };
    debugger
    $.ajax({
        url: base_url+""+RequestUrl,
        type: Constant.Post,
        contentType: Constant.ContentType,
        data: JSON.stringify(searchModel),
        dataType: Constant.Json,
        success: function (result) {
            var tr;
            $("tbody").empty();
            
            var list = result.Pager.Items;  
            $('#TotalItems').val(result.Pager.TotalItems);
            $('#TotalPages').val(result.Pager.TotalPages);
            $('#start_page').val(result.Pager.StartPage);
            $('#end_page').val(result.Pager.EndPage);
            $('#PageIndex').val(result.Pager.CurrentPage);
            $('#PageSize').val(result.Pager.PageSize);      
            debugger    
            if (list != null && list != undefined && list.length >0) {
                var i = 1;
                $.each(list, function (index, item) {
                    
                    tr = $('<tr/>');
                    tr.append('<td>' + (i) + '</td>');    
                    tr.append('<td>' + (item.tax_name) + '</td>');    
                    tr.append('<td>' + item.tax_percentage + '</td>');
                    tr.append('<td>' + GetStatus(item.LIFE_tax_type) + '</td>');    
                    tr.append('<td>' + GetStatus(item.NONLIFE_tax_type) + '</td>');
                    tr.append('<td>' + item.tax_description + '</td>');
                    tr.append('<td>' + GetStatus(item.status) + '</td>');
                    tr.append('<td onclick="editData(\'' + item.id + '\',\'' + item.tax_name + '\',\'' + item.tax_percentage + '\',\'' + item.LIFE_tax_type + '\',\'' + item.NONLIFE_tax_type + '\',\'' + item.tax_description + '\',\'' + item.status + '\')" ><i class="fa fa-edit" style="font-size:16px;cursor:pointer;"></i></td>');
                    tr.append('<td onclick="deleteData(\'' + item.id + '\')" ><i class="fa fa-trash" style="font-size:16px;color:red;cursor:pointer;"></i></td>');
                    $('tbody').append(tr);
                    i++;
                });
            }
            else
            {
                tr = $('<tr/>');
                tr.append('<td valign="top" colspan="13" class="centerCss BoldCss">Oops! Data Not Found</td>');                                 
                $('tbody').append(tr);
            }
            BindPager(result.Pager,UrlType);
        },
        error: function (errormessage) {
            alert(errormessage.responseText);
        }
    });
}



function GetStatus(status)
{
    var statusmessage
    if (status == TransStatus.Closed) {
        statusmessage = '<span class="badge rounded-pill bg-danger" style="font-size: 11px !important;">Closed</span>';
    }
    else if (status == TransStatus.Open) {
        statusmessage = '<span class="badge rounded-pill bg-info" style="font-size: 11px !important;">Open</span>';
    }
    else if (status == TransStatus.Success) {
        statusmessage = '<span class="badge rounded-pill bg-success" style="font-size: 11px !important;">Success</span>';
    }
    else if (status == TransStatus.Approved) {
        statusmessage = '<span class="badge rounded-pill bg-success" style="font-size: 11px !important;">Approved</span>';
    }
    else if (status == TransStatus.Refunded) {
        statusmessage = '<span class="badge rounded-pill bg-danger" style="font-size: 11px; !important">Refunded</span>';
    }
    else if (status == TransStatus.Cancelled) {
        statusmessage = '<span class="badge rounded-pill bg-danger" style="font-size: 11px; !important">Cancelled</span>';
    }
    else if (status == TransStatus.Rejected) {
        statusmessage = '<span class="badge rounded-pill bg-danger" style="font-size: 11px; !important">Rejected</span>';
    }
    else if (status == TransStatus.InProccess) {
        statusmessage = '<span class="badge rounded-pill bg-warning" style="font-size: 11px; !important">InProccess</span>';
    }
    else if (status == TransStatus.Pending) {
        statusmessage = '<span class="badge rounded-pill bg-warning" style="font-size: 11px; !important">Pending</span>';
    }
    else if (status == '1') {
        statusmessage = '<span class="badge rounded-pill bg-success" style="font-size: 11px !important;">Active</span>';
    }
    else if (status == '0') {
        statusmessage = '<span class="badge rounded-pill bg-danger" style="font-size: 11px !important;">In Active</span>';
    }
    return statusmessage;
}

function deleteData(id)
{
    var result = confirm("Want to delete?");
    if (result) {
        var searchModel = { id: id };
   
    $.ajax({
        url: base_url+""+SiteUrl.DeleteSericeTaxGst,
        type: Constant.Post,
        contentType: Constant.ContentType,
        data: JSON.stringify(searchModel),
        dataType: Constant.Json,
        success: function (result) {
            if (result.Status)
            {                    
                ShowNotification('success', 'Success', 'Status ' + result.Message);
                loadData(Constant.DefaultPageIndex, Constant.DefaultPageSize, SiteUrl.SericeTaxGstList, PageType.Pending, Constant.countQuery);
            }
            else {
                ShowNotification('error', 'Error', result.Message);                    
            }
        },
        error: function (errormessage) {
            ShowNotification('error', 'Error', 'Error..');                
        }
    });
    }
    
}

$('#submitData').click(function () {
 
    
    var tax_type = new Array();
    $("input[name='tax_type']:checked").each(function() {
        tax_type.push($(this).val());
    });
    var tax_name = $('#tax_name').val();  
    var tax_percentage = $('#tax_percentage').val();  
    var tax_description = $('#tax_description').val();
    var active = $('#active:checked').val();

    var searchModel = { tax_type: tax_type, tax_name: tax_name,tax_percentage:tax_percentage,tax_description:tax_description,active:active};
    debugger
        $.ajax({
            url: base_url+""+SiteUrl.AddSericeTaxGst,
            type: Constant.Post,
            contentType: Constant.ContentType,
            data: JSON.stringify(searchModel),
            dataType: Constant.Json,
            success: function (result) {
                if (result.Status == 200)
                {  
                    $('#tax_name').val("");     
                    $('#tax_percentage').val("");
                    $('#tax_description').val("");             
                    $("input[name=tax_type][value='LIFE']").prop('checked', false);
                    $("input[name=tax_type][value='NON LIFE']").prop('checked', false);   
                    ShowNotification('success', 'Success',  result.Message);
                    
                    loadData(Constant.DefaultPageIndex, Constant.DefaultPageSize, SiteUrl.SericeTaxGstList, PageType.Pending, Constant.countQuery);
                }
                else {
                    ShowNotification('error', 'Error', result.Message);                    
                }
            },
            error: function (errormessage) {
                ShowNotification('error', 'Error', 'Error..');                
            }
        });

});

function editData(id,tax_name,tax_percentage,LIFE_tax_type,NONLIFE_tax_type,tax_description,status){
    debugger
   
    $("#service_tax_id").val(id);
    $("#tax_name").val(tax_name);
    $("#tax_percentage").val(tax_percentage);
    $("#tax_description").val(tax_description);
    if(LIFE_tax_type == 1){
        $("input[name=tax_type][value='LIFE']").prop('checked', true);
    }
    if(NONLIFE_tax_type == 1){
        $("input[name=tax_type][value='NON LIFE']").prop('checked', true);
    }
    
    
    $(".submitData").hide();
    $(".updateData").show();
}

$('.cancelData').click(function () {
    $('#tax_name').val("");     
    $('#tax_percentage').val("");
    $('#tax_description').val("");  
    $("input[name=tax_type][value='LIFE']").prop('checked', false);
    $("input[name=tax_type][value='NON LIFE']").prop('checked', false);  
    $(".submitData").show();
    $(".updateData").hide();
});

$('#updateData').click(function () {
 
    var tax_type = new Array();
    $("input[name='tax_type']:checked").each(function() {
        tax_type.push($(this).val());
    });
    var tax_name = $('#tax_name').val();  
    var tax_percentage = $('#tax_percentage').val();  
    var tax_description = $('#tax_description').val();
    var active = $('#active:checked').val();
    var service_tax_id = $('#service_tax_id').val();
    var searchModel = { tax_type: tax_type, tax_name: tax_name,tax_percentage:tax_percentage,tax_description:tax_description,active:active,service_tax_id:service_tax_id};
    debugger
  
        $.ajax({
            url: base_url+""+SiteUrl.UpdateSericeTaxGst,
            type: Constant.Post,
            contentType: Constant.ContentType,
            data: JSON.stringify(searchModel),
            dataType: Constant.Json,
            success: function (result) {
                if (result.Status == 200)
                {                    
                    $('#tax_name').val("");     
                    $('#tax_percentage').val("");
                    $('#tax_description').val("") ;       
                    $('#service_tax_id').val("") ;  
                    $("input[name=tax_type][value='LIFE']").prop('checked', false);
                    $("input[name=tax_type][value='NON LIFE']").prop('checked', false);     
                    $(".submitData").show();
                    $(".updateData").hide();   
                    ShowNotification('success', 'Success',  result.Message);
                    loadData(Constant.DefaultPageIndex, Constant.DefaultPageSize, SiteUrl.SericeTaxGstList, PageType.Pending, Constant.countQuery);
                }
                else {
                    ShowNotification('error', 'Error', result.Message);                    
                }
            },
            error: function (errormessage) {
                ShowNotification('error', 'Error', 'Error..');                
            }
        });

});

