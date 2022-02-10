
var Constant = {
    DefaultPageIndex : 1,
    DefaultPageSize: 3,
    Post: "POST",
    Get: "GET",
    ContentType: "application/json;charset=utf-8",
    Json: "json",
    countQuery : true
}
var PageType = {
    Pending: 1,
    All: 2  
}

var TransStatus = {
    Pending: 'Pending',
    Approved: 'Approved',
    Cancelled: 'Cancelled',
    Rejected: 'Rejected',
    Received: 'Received',
    Failed: 'Failed',
    Success: 'Success',
    Refunded: 'Refunded',
    InProccess: 'InProccess',
    Open: 'Open',
    Close: 'Close',
    Closed: 'Closed'
}
var WalletTopUpStatus = {
    Pending: 0,
    Rejected: 1,
    Approved: 2,
    Reversed: 3,
    Inprocess: 4,
    PayOutCreated: 5
}
var TransType = {
    AddStock: 1,
    Stock: 2,
    StockRevert: 3,
    StockToBank: 4,
    Purchase: 5,
    Sales: 6,
    RefundPurchase: 7,
    PlanActive: 8,
    RefundSales: 9,
    StockRedeemCharged:10,
    ValidationCharged: 11,
    PlanActiveUserCredit: 12,
    StockTOBankReversed: 13,
    FailPurchase: 15,
    FailSales: 16,
    PurchaseMargin : 17
}
var base_url="http://localhost:8000";
var SiteUrl = {
    //--------------------Admin--------------
    //product group
    AddProductGroup : '/api/v1/AddProductGroup',
    ProductGroupList : '/api/v1/ProductGroupList',
    UpdateProductGroup : '/api/v1/UpdateProductGroup',
    DeleteProductGroup : '/api/v1/DeleteProductGroup',
    productGroupName : '/api/v1/productGroupName',

    AddProductSubGroup : '/api/v1/AddProductSubGroup',
    ProductSubGroupList : '/api/v1/ProductSubGroupList',
    UpdateProductSubGroup : '/api/v1/UpdateProductSubGroup',
    DeleteProductSubGroup : '/api/v1/DeleteProductSubGroup',
   
}
function BindPagerOne(Pager) {
    debugger
    if (Pager.EndPage > 1) {
        $("#divPager").empty();

        if (Pager.CurrentPage > 1) {
            $('#divPager').append('<li><a onclick="Pagination(1,' + Pager.PageSize + ');">First</a></li>');
            $('#divPager').append('<li><a onclick="Pagination(' + (Pager.CurrentPage - 1) + ',' + Pager.PageSize + ');">Previous</a></li>');
        }

        for (var page = Pager.StartPage; page <= Pager.EndPage; page++) {
            var css = (page == Pager.CurrentPage ? "active" : "");
            $('#divPager').append('<li class=' + css + '><a onclick="Pagination(' + page + ',' + Pager.PageSize + ');">' + page + '</a></li>');
        }

        if (Pager.CurrentPage < Pager.TotalPages) {
            $('#divPager').append('<li><a onclick="Pagination(' + (Pager.CurrentPage + 1) + ',' + Pager.PageSize +');">Next</a></li>');
            $('#divPager').append('<li><a onclick="Pagination(' + Pager.TotalPages + ',' + Pager.PageSize + ');">Last</a></li>');
        }
        $('#divPager').removeAttr("style");
    }
    else {
        $('#divPager').css('display', 'none');
    }
}
function BindPager(Pager, UrlType) {
    debugger
    if (Pager.EndPage > 1) {
        $("#divPager").empty();

        if (Pager.CurrentPage > 1) {
            $('#divPager').append('<li><a onclick="Pagination(1,' + Pager.PageSize + ',' + UrlType + ');">First</a></li>');
            $('#divPager').append('<li><a onclick="Pagination(' + (Pager.CurrentPage - 1) + ',' + Pager.PageSize + ',' + UrlType + ');">Previous</a></li>');
        }

        for (var page = Pager.StartPage; page <= Pager.EndPage; page++) {
            var css = (page == Pager.CurrentPage ? "active" : "");
            $('#divPager').append('<li class=' + css + '><a onclick="Pagination(' + page + ',' + Pager.PageSize + ',' + UrlType + ');">' + page + '</a></li>');
        }

        if (Pager.CurrentPage < Pager.TotalPages) {
            $('#divPager').append('<li><a onclick="Pagination(' + (Pager.CurrentPage + 1) + ',' + Pager.PageSize + ',' + UrlType + ');">Next</a></li>');
            $('#divPager').append('<li><a onclick="Pagination(' + Pager.TotalPages + ',' + Pager.PageSize + ',' + UrlType + ');">Last</a></li>');
        }
        $('#divPager').removeAttr("style");
    }
    else {
        $('#divPager').css('display', 'none');
    }
}

function BindPager1(Pager, UrlType) {
    debugger
    if (Pager.EndPage > 1) {
        $("#divPager1").empty();

        if (Pager.CurrentPage > 1) {
            $('#divPager1').append('<li><a onclick="Pagination1(1,' + Pager.PageSize + ',' + UrlType + ');">First</a></li>');
            $('#divPager1').append('<li><a onclick="Pagination1(' + (Pager.CurrentPage - 1) + ',' + Pager.PageSize + ',' + UrlType + ');">Previous</a></li>');
        }

        for (var page = Pager.StartPage; page <= Pager.EndPage; page++) {
            var css = (page == Pager.CurrentPage ? "active" : "");
            $('#divPager1').append('<li class=' + css + '><a onclick="Pagination1(' + page + ',' + Pager.PageSize + ',' + UrlType + ');">' + page + '</a></li>');
        }

        if (Pager.CurrentPage < Pager.TotalPages) {
            $('#divPager1').append('<li><a onclick="Pagination1(' + (Pager.CurrentPage + 1) + ',' + Pager.PageSize + ',' + UrlType + ');">Next</a></li>');
            $('#divPager1').append('<li><a onclick="Pagination1(' + Pager.TotalPages + ',' + Pager.PageSize + ',' + UrlType + ');">Last</a></li>');
        }
        $('#divPager1').removeAttr("style");
    }
    else {
        $('#divPager1').css('display', 'none');
    }
}

var resizefunc = [];

function ShowNotification(type, Title, Message) {
    Command: toastr[type](Message, Title)
    toastr.options = {
        "closeButton": false,
        "debug": true,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
};

//Get Current Date 
function GetCurrentDate() {
    var todaydate = new Date();
    var dd = todaydate.getDate();
    var mm = todaydate.getMonth() + 1; //January is 0!
    var yyyy = todaydate.getFullYear();

    if (dd < 10) {
        dd = '0' + dd
    }

    if (mm < 10) {
        mm = '0' + mm
    }

    todaydate = yyyy + '-' + mm + '-' + dd;
    return todaydate;   
}

