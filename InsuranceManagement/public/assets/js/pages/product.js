
$(document).ready(function () {   
    // document.getElementById("txtFromDate").value = GetCurrentDate();
    // document.getElementById("txtToDate").value = GetCurrentDate();

    loadData(Constant.DefaultPageIndex, Constant.DefaultPageSize, SiteUrl.ProductList, PageType.Pending, Constant.countQuery);
    
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
    loadData(Constant.DefaultPageIndex, Constant.DefaultPageSize, SiteUrl.ProductList, PageType.All, Constant.countQuery);
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
        loadData(pageIndex, pageSize, SiteUrl.ProductList, PageType.Pending, Constant.countQuery = false);
    }
    else
    {
        loadData(pageIndex, pageSize, SiteUrl.ProductList, PageType.All, Constant.countQuery = false);
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

    var search_product_name = $("#search_product_name").val();
    var search_product_code = $("#search_product_code").val();
    var search_single_select = $('#search_single_select option:selected').val();
    var search_sub_single_select = $('#search_sub_single_select option:selected').val();
    var product_type = $("#product_type").val();
    debugger
    var searchModel = {  '_token': $('meta[name="_token"]').attr('content'),PageIndex: PageIndex, PageSize: PageSize, countQuery:countQuery, TotalItems : TotalItems, TotalPages : TotalPages, start_page : start_page, end_page : end_page,  SearchParams: {search_product_name:search_product_name,search_product_code:search_product_code,search_single_select:search_single_select,search_sub_single_select:search_sub_single_select,product_type:product_type } };
    
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
                    tr.append('<td>' + (item.product_name) + '</td>');    
                    tr.append('<td>' + item.product_code + '</td>');
                    tr.append('<td>' + (item.main_group) + '</td>');    
                    tr.append('<td>' + (item.sub_group_name != null ? item.sub_group_name : "NONE") + '</td>');
                    tr.append('<td>' + item.product_type + '</td>');
                    tr.append('<td>' + GetStatus(item.status) + '</td>');
                    tr.append('<td onclick="editData(\'' + item.id + '\',\'' + item.product_name + '\',\'' + item.product_code + '\',\'' + item.main_group_id + '\',\'' + item.sub_group_id + '\',\'' + item.product_type + '\')" ><i class="fa fa-edit" style="font-size:16px;cursor:pointer;"></i></td>');
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
        url: base_url+""+SiteUrl.DeleteProduct,
        type: Constant.Post,
        contentType: Constant.ContentType,
        data: JSON.stringify(searchModel),
        dataType: Constant.Json,
        success: function (result) {
            if (result.Status)
            {                    
                ShowNotification('success', 'Success', 'Status ' + result.Message);
                loadData(Constant.DefaultPageIndex, Constant.DefaultPageSize, SiteUrl.ProductList, PageType.Pending, Constant.countQuery);
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
 
    var group_type = $('#group_type:checked').val();
    var product_name = $('#product_name').val();  
    var product_code = $('#product_code').val();  
    var main_group_id = $('#single-select option:selected').val();
    var sub_group_id = $('#sub-single-select option:selected').val();

    var searchModel = { group_type: group_type, product_name: product_name,product_code:product_code,main_group_id:main_group_id,sub_group_id:sub_group_id};
    debugger
        $.ajax({
            url: base_url+""+SiteUrl.AddProduct,
            type: Constant.Post,
            contentType: Constant.ContentType,
            data: JSON.stringify(searchModel),
            dataType: Constant.Json,
            success: function (result) {
                if (result.Status == 200)
                {  
                    $('#product_name').val("");     
                    $('#product_code').val("");
                    $('#single-select').val(null).trigger('change');
                    $('#sub-single-select').val(null).trigger('change');                
                    ShowNotification('success', 'Success',  result.Message);
                    getGroupName();
                    loadData(Constant.DefaultPageIndex, Constant.DefaultPageSize, SiteUrl.ProductList, PageType.Pending, Constant.countQuery);
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

function editData(id,product_name,product_code,main_group_id,sub_group_id,product_type){
    debugger
    var searchModel = {parent_group_id:main_group_id};
    $("#sub-single-select").html("");
    $.ajax({
        url: base_url+""+SiteUrl.productSubGroupName,
        type: Constant.Post,
        contentType: Constant.ContentType,
        data: JSON.stringify(searchModel),
        dataType: Constant.Json,
        success: function (result) {
            if (result.Status == 200)
            {           
                $("#sub-single-select").append('<option value="">Select Sub Group</option>');       
                for (i = 0; i < result.data.length; i++) {
                    $("#sub-single-select").append('<option value="'+result.data[i].id+'">'+result.data[i].sub_group_name+'</option>');
                }
                $("#sub-single-select").select2("val", sub_group_id);
                debugger          
            }
            else {
                ShowNotification('error', 'Error', result.Message);                    
            }
        },
        error: function (errormessage) {
            ShowNotification('error', 'Error', 'Error..');                
        }
    });
    $("#product_id").val(id);
    $("#product_name").val(product_name);
    $("#product_code").val(product_code);
    $("#single-select").select2("val", main_group_id);
   
    $("input[name=group_type][value='" + product_type + "']").prop('checked', true);
    $(".submitData").hide();
    $(".updateData").show();
}

$('.cancelData').click(function () {
    $('#product_name').val("");     
    $('#product_code').val("");
    $('#single-select').val(null).trigger('change');
    $('#sub-single-select').val(null).trigger('change');  
    $("input[name=group_type][value='LIFE']").prop('checked', true);
    $(".submitData").show();
    $(".updateData").hide();
});

$('#updateData').click(function () {
 
    var group_type = $('#group_type:checked').val();
    var product_name = $('#product_name').val();  
    var product_code = $('#product_code').val();  
    var main_group_id = $('#single-select option:selected').val();
    var sub_group_id = $('#sub-single-select option:selected').val();
    var product_id = $('#product_id').val();
    var searchModel = { group_type: group_type, product_name: product_name,product_code:product_code,main_group_id:main_group_id,sub_group_id:sub_group_id,product_id:product_id};
    debugger
  
        $.ajax({
            url: base_url+""+SiteUrl.UpdateProduct,
            type: Constant.Post,
            contentType: Constant.ContentType,
            data: JSON.stringify(searchModel),
            dataType: Constant.Json,
            success: function (result) {
                if (result.Status == 200)
                {                    
                    $('#product_name').val("");     
                    $('#product_code').val("");
                    $('#single-select').val(null).trigger('change');
                    $('#sub-single-select').val(null).trigger('change');      
                    $(".submitData").show();
                    $(".updateData").hide();        
                    ShowNotification('success', 'Success',  result.Message);
                    loadData(Constant.DefaultPageIndex, Constant.DefaultPageSize, SiteUrl.ProductList, PageType.Pending, Constant.countQuery);
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

function getGroupName(){
    debugger
    $("#single-select").html("");
    $("#search_single_select").html("");
    $.ajax({
        url: base_url+""+SiteUrl.productGroupName,
        type: Constant.Post,
        contentType: Constant.ContentType,
        // data: JSON.stringify(searchModel),
        dataType: Constant.Json,
        success: function (result) {
            if (result.Status == 200)
            {           
                $("#single-select").append('<option value="">Select Group Name</option>'); 
                $("#search_single_select").append('<option value="">Select Group Name</option>'); 
                for (i = 0; i < result.data.length; i++) {
                    $("#single-select").append('<option value="'+result.data[i].id+'">'+result.data[i].main_group+'</option>');
                    $("#search_single_select").append('<option value="'+result.data[i].id+'">'+result.data[i].main_group+'</option>');
                }
                
    
                debugger          
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

getGroupName();
$('#single-select').on('change', function() {
    
    var searchModel = {parent_group_id:this.value};
    $("#sub-single-select").html("");
    $("#search_sub_single_select").html("");
    $.ajax({
        url: base_url+""+SiteUrl.productSubGroupName,
        type: Constant.Post,
        contentType: Constant.ContentType,
        data: JSON.stringify(searchModel),
        dataType: Constant.Json,
        success: function (result) {
            if (result.Status == 200)
            {           
                $("#sub-single-select").append('<option value="">Select Sub Group</option>');    
                $("#search-sub-single-select").append('<option value="">Select Sub Group</option>');       
                for (i = 0; i < result.data.length; i++) {
                    $("#sub-single-select").append('<option value="'+result.data[i].id+'">'+result.data[i].sub_group_name+'</option>');
                    $("#search_sub_single_select").append('<option value="'+result.data[i].id+'">'+result.data[i].sub_group_name+'</option>');
                }
    
                debugger          
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
$('#search_single_select').on('change', function() {
    
    var searchModel = {parent_group_id:this.value};
   
    $("#search-sub-single-select").html("");
    $.ajax({
        url: base_url+""+SiteUrl.productSubGroupName,
        type: Constant.Post,
        contentType: Constant.ContentType,
        data: JSON.stringify(searchModel),
        dataType: Constant.Json,
        success: function (result) {
            if (result.Status == 200)
            {           
               
                $("#search_sub_single_select").append('<option value="">Select Sub Group</option>');       
                for (i = 0; i < result.data.length; i++) {
                    
                    $("#search_sub_single_select").append('<option value="'+result.data[i].id+'">'+result.data[i].sub_group_name+'</option>');
                }
    
                debugger          
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
