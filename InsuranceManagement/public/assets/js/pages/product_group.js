
$(document).ready(function () {   
    // document.getElementById("txtFromDate").value = GetCurrentDate();
    // document.getElementById("txtToDate").value = GetCurrentDate();

    loadData(Constant.DefaultPageIndex, Constant.DefaultPageSize, SiteUrl.ProductGroupList, PageType.Pending, Constant.countQuery);
    
    loadData1(Constant.DefaultPageIndex, Constant.DefaultPageSize, SiteUrl.ProductSubGroupList, PageType.Pending, Constant.countQuery);

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
    loadData(Constant.DefaultPageIndex, Constant.DefaultPageSize, SiteUrl.ProductGroupList, PageType.All, Constant.countQuery);
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
        loadData(pageIndex, pageSize, SiteUrl.ProductGroupList, PageType.Pending, Constant.countQuery = false);
    }
    else
    {
        loadData(pageIndex, pageSize, SiteUrl.ProductGroupList, PageType.All, Constant.countQuery = false);
    }
}

function Pagination1(pageIndex, pageSize, UrlType)
{
    if (UrlType == PageType.Pending) {
        loadData1(pageIndex, pageSize, SiteUrl.ProductSubGroupList, PageType.Pending, Constant.countQuery = false);
    }
    else
    {
        loadData1(pageIndex, pageSize, SiteUrl.ProductSubGroupList, PageType.All, Constant.countQuery = false);
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

    var searchModel = {  '_token': $('meta[name="_token"]').attr('content'),PageIndex: PageIndex, PageSize: PageSize, countQuery:countQuery, TotalItems : TotalItems, TotalPages : TotalPages, start_page : start_page, end_page : end_page,  SearchParams: { } };
    debugger
    $.ajax({
        url: base_url+""+RequestUrl,
        type: Constant.Post,
        contentType: Constant.ContentType,
        data: JSON.stringify(searchModel),
        dataType: Constant.Json,
        success: function (result) {
            var tr;
            $("#main_group_table").empty();
            
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
                    tr.append('<td>' + (item.main_group) + '</td>');    
                    tr.append('<td>' + item.group_type + '</td>');
                    tr.append('<td>' + GetStatus(item.status) + '</td>');
                    tr.append('<td onclick="editData(\'' + item.id + '\',\'' + item.main_group + '\',\'' + item.group_type + '\')" ><i class="fa fa-edit" style="font-size:16px;cursor:pointer;"></i></td>');
                    tr.append('<td onclick="deleteData(\'' + item.id + '\')" ><i class="fa fa-trash" style="font-size:16px;color:red;cursor:pointer;"></i></td>');
                    $('#main_group_table').append(tr);
                    i++;
                });
            }
            else
            {
                tr = $('<tr/>');
                tr.append('<td valign="top" colspan="13" class="centerCss BoldCss">Oops! Data Not Found</td>');                                 
                $('#main_group_table').append(tr);
            }
            BindPager(result.Pager,UrlType);
        },
        error: function (errormessage) {
            alert(errormessage.responseText);
        }
    });
}

function loadData1(pageIndex, pageSize,RequestUrl,UrlType, countQuery) {
    // var SearchByValue = $('#txtsearchbyvalue').val();
 
    var PageIndex = pageIndex;
    var PageSize = pageSize;

    var PageIndex = pageIndex;
    var PageSize = pageSize;
    var countQuery = countQuery;
    var TotalItems = $('#TotalItems1').val();
    var TotalPages = $('#TotalPages1').val();
    var start_page = $('#start_page1').val();
    var end_page = $('#end_page1').val();

    var searchModel = {  '_token': $('meta[name="_token"]').attr('content'),PageIndex: PageIndex, PageSize: PageSize, countQuery:countQuery, TotalItems : TotalItems, TotalPages : TotalPages, start_page : start_page, end_page : end_page,  SearchParams: { } };
    debugger
    $.ajax({
        url: base_url+""+RequestUrl,
        type: Constant.Post,
        contentType: Constant.ContentType,
        data: JSON.stringify(searchModel),
        dataType: Constant.Json,
        success: function (result) {
            var tr;
            $("#sub_group_table").empty();
            
            var list = result.Pager.Items;  
            $('#TotalItems1').val(result.Pager.TotalItems);
            $('#TotalPages1').val(result.Pager.TotalPages);
            $('#start_page1').val(result.Pager.StartPage);
            $('#end_page1').val(result.Pager.EndPage);
            $('#PageIndex1').val(result.Pager.CurrentPage);
            $('#PageSize1').val(result.Pager.PageSize);      
            debugger    
            if (list != null && list != undefined && list.length >0) {
                var i = 1;
                $.each(list, function (index, item) {
                    
                    tr = $('<tr/>');
                    tr.append('<td>' + (i) + '</td>');    
                    tr.append('<td>' + (item.main_group) + '</td>');    
                    tr.append('<td>' + item.sub_group_name + '</td>');
                    tr.append('<td>' + GetStatus(item.status) + '</td>');
                    tr.append('<td onclick="editData1(\'' + item.id + '\',\'' + item.parent_group_id + '\',\'' + item.sub_group_name + '\')" ><i class="fa fa-edit" style="font-size:16px;cursor:pointer;"></i></td>');
                    tr.append('<td onclick="deleteData1(\'' + item.id + '\')" ><i class="fa fa-trash" style="font-size:16px;color:red;cursor:pointer;"></i></td>');
                    $('#sub_group_table').append(tr);
                    i++;
                });
            }
            else
            {
                tr = $('<tr/>');
                tr.append('<td valign="top" colspan="13" class="centerCss BoldCss">Oops! Data Not Found</td>');                                 
                $('#sub_group_table').append(tr);
            }
            BindPager1(result.Pager,UrlType);
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
        url: base_url+""+SiteUrl.DeleteProductGroup,
        type: Constant.Post,
        contentType: Constant.ContentType,
        data: JSON.stringify(searchModel),
        dataType: Constant.Json,
        success: function (result) {
            if (result.Status)
            {                    
                ShowNotification('success', 'Success', 'Status ' + result.Message);
                getGroupName();
                loadData(Constant.DefaultPageIndex, Constant.DefaultPageSize, SiteUrl.ProductGroupList, PageType.Pending, Constant.countQuery);
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
    var group_name = $('#group_name').val();  
    var searchModel = { group_type: group_type, main_group: group_name};
    debugger
        $.ajax({
            url: base_url+""+SiteUrl.AddProductGroup,
            type: Constant.Post,
            contentType: Constant.ContentType,
            data: JSON.stringify(searchModel),
            dataType: Constant.Json,
            success: function (result) {
                if (result.Status == 200)
                {  
                    $('#group_name').val("");                  
                    ShowNotification('success', 'Success',  result.Message);
                    getGroupName();
                    loadData(Constant.DefaultPageIndex, Constant.DefaultPageSize, SiteUrl.ProductGroupList, PageType.Pending, Constant.countQuery);
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

function editData(id,main_group,group_type){
    debugger
    $("#main_group_id").val(id);
    $("#group_name").val(main_group);
    // $("[name=group_type]").val(group_type);
    $("input[name=group_type][value='" + group_type + "']").prop('checked', true);
    $(".submitData").hide();
    $(".updateData").show();
}

$('.cancelData').click(function () {
    $("#main_group_id").val("");
    $("#group_name").val("");
    $("input[name=group_type][value='LIFE']").prop('checked', true);
    $(".submitData").show();
    $(".updateData").hide();
});

$('#updateData').click(function () {
 
    // var CompType = $('#ctype option:selected').val();
    var group_type = $('#group_type:checked').val();
    var group_name = $('#group_name').val();  
    var main_group_id = $('#main_group_id').val();  
    var searchModel = { group_type: group_type, main_group: group_name,main_group_id:main_group_id};
  
        $.ajax({
            url: base_url+""+SiteUrl.UpdateProductGroup,
            type: Constant.Post,
            contentType: Constant.ContentType,
            data: JSON.stringify(searchModel),
            dataType: Constant.Json,
            success: function (result) {
                if (result.Status == 200)
                {                    
                    $('#group_name').val("");       
                    ShowNotification('success', 'Success',  result.Message);
                    getGroupName();
                    loadData(Constant.DefaultPageIndex, Constant.DefaultPageSize, SiteUrl.ProductGroupList, PageType.Pending, Constant.countQuery);
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
    $.ajax({
        url: base_url+""+SiteUrl.productGroupName,
        type: Constant.Post,
        contentType: Constant.ContentType,
        // data: JSON.stringify(searchModel),
        dataType: Constant.Json,
        success: function (result) {
            if (result.Status == 200)
            {           
                         
                for (i = 0; i < result.data.length; i++) {
                    $("#single-select").append('<option value="'+result.data[i].id+'">'+result.data[i].main_group+'</option>');
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

$('#submitData1').click(function () {
 
    var parent_group_id = $('#single-select option:selected').val();
    var sub_group_name = $('#sub_group_name').val();  
    var searchModel = { parent_group_id: parent_group_id, sub_group_name: sub_group_name};
    debugger
        $.ajax({
            url: base_url+""+SiteUrl.AddProductSubGroup,
            type: Constant.Post,
            contentType: Constant.ContentType,
            data: JSON.stringify(searchModel),
            dataType: Constant.Json,
            success: function (result) {
                if (result.Status == 200)
                {  
                    $('#sub_group_name').val("");   
                    $('#single-select').val("");            
                    ShowNotification('success', 'Success',  result.Message);
                    loadData1(Constant.DefaultPageIndex, Constant.DefaultPageSize, SiteUrl.ProductSubGroupList, PageType.Pending, Constant.countQuery);
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

function editData1(id,parent_group_id,sub_group_name){
    debugger
    $("#sub_group_id").val(id);
    $("#sub_group_name").val(sub_group_name);
    $("#single-select").select2("val", parent_group_id);
    $(".submitData1").hide();
    $(".updateData1").show();
}

$('.cancelData1').click(function () {
    $("#sub_group_id").val("");
    $("#sub_group_name").val("");
    $("#single-select").select2("val", "");
    $(".submitData1").show();
    $(".updateData1").hide();
});

$('#updateData1').click(function () {
 
    // var CompType = $('#ctype option:selected').val();
    var parent_group_id = $('#single-select option:selected').val();
    var sub_group_name = $('#sub_group_name').val();  
    var sub_group_id = $('#sub_group_id').val();  
    var searchModel = { parent_group_id: parent_group_id, sub_group_name: sub_group_name,sub_group_id:sub_group_id};
  
        $.ajax({
            url: base_url+""+SiteUrl.UpdateProductSubGroup,
            type: Constant.Post,
            contentType: Constant.ContentType,
            data: JSON.stringify(searchModel),
            dataType: Constant.Json,
            success: function (result) {
                if (result.Status == 200)
                {                    
                    $('#sub_group_name').val("");   
                    $('#single-select').val("");            
                    ShowNotification('success', 'Success',  result.Message);
                   
                    loadData1(Constant.DefaultPageIndex, Constant.DefaultPageSize, SiteUrl.ProductSubGroupList, PageType.Pending, Constant.countQuery);
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

function deleteData1(id)
{
    var result = confirm("Want to delete?");
    if (result) {
        var searchModel = { id: id };
   
    $.ajax({
        url: base_url+""+SiteUrl.DeleteProductSubGroup,
        type: Constant.Post,
        contentType: Constant.ContentType,
        data: JSON.stringify(searchModel),
        dataType: Constant.Json,
        success: function (result) {
            if (result.Status)
            {                    
                ShowNotification('success', 'Success', 'Status ' + result.Message);
                loadData1(Constant.DefaultPageIndex, Constant.DefaultPageSize, SiteUrl.ProductSubGroupList, PageType.Pending, Constant.countQuery);
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