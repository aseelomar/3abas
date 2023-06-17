
var Shipment = function () {

    var view_tbl;
    var view_url = 'shipment';
    var list_url = 'shipment/getShipment';
    var order_url ='shippingcp/shipment/getShipmentOrder';
    /////////////////// View //////////////////
    ///////////////////////////////////////////
    var viewTable = function () {
        var link = list_url;
        var columns = [
            {"data": "index", "title": "#", "orderable": false, "searchable": false},
            {"data": "name", "orderable": true, "searchable": true},
            {"data": "country_id", "orderable": true, "searchable": true},
            {"data": "mobile", "orderable": true, "searchable": false},
            {"data": "wallet", "orderable": true, "searchable": false},
            {"data": "created_at", "orderable": true, "searchable": false},
             {"data": "active", "orderable": true, "searchable": true},
             {"data": "actions", "orderable": false, "searchable": false},

        ];
        var perPage = 25;
        var order = [[5, 'desc']];


        var ajaxFilter = function (d) {
            d.companyName = $('#generalSearch').val();
            d.active=$('#status').val();
        };

        view_tbl = DataTable.init($('#table_shipment'), link, columns, order, ajaxFilter, perPage);
    };
    /////////////////// ADD ///////////////////
    ///////////////////////////////////////////

    var add = function() {

        $('#add-new-shipment').submit(function(e) {
            e.preventDefault();
            var link = $(this).attr('action');
            var formData = $(this).serialize();
            var method = $(this).attr('method');
            Forms.doAction(link, formData, method, null, addCallBack);

        });
    }


    function display_error_messages(type, msg) {

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-bottom-left",
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
        };
        if (type == 'error') {
            toastr.error(msg);
        } else {
            toastr.success(msg);
        }

    }
///////////////////////////////////////////////
    var updateStatus = function () {
        $(document).on('click', '.change-status', function (e) {
            e.preventDefault()

            var id = $(this).closest('tr').attr('id');

            var href = $( this ).attr('href');
            var link = href +'?id='+id;

            Forms.doAction(link, "", "", view_tbl, updateStatusCallBack);
        });
    }

    var  updateStatusCallBack = function (resp) {
        display_error_messages('success', resp.message)
        view_tbl.draw(false);
    }


    var addCallBack = function (resp) {
        display_error_messages('success', resp.message)
        document.querySelector('#reset-coupon').click();
        $(".save").removeClass("m-loader m-loader--light m-loader--left").html('Save').removeAttr("disabled");
    };
    /////////////////// EDIT //////////////////
    ///////////////////////////////////////////


    var updateShipment=function () {
        $('#edit').click(function (e){
            e.preventDefault();
            let form = document.getElementById('edit-shipment');
            var formData = new FormData(form);
            let method = form.getAttribute('method');
            let link = form.getAttribute('action');
            Forms.doAction(link, formData, method, null,editCallBack );

        });
    }

    var editCallBack = function (req) {

        $(".save").removeClass("m-loader m-loader--light m-loader--left").html('Save').removeAttr("disabled");
        localStorage.setItem("Status",'Success')
        window.location = req.path;
        // display_error_messages()
        // window.location = req.path;

    };

    //////////////// DELETE ///////////////////
    ///////////////////////////////////////////
    //

    var editItem = function () {
        $(document).on('click', '.wallet', function (e) {
            e.preventDefault()
            var id = $(this).closest('tr').attr('id');
            var href = $( this ).attr('href');
            var link = href +'?id='+id;

            window.open(link);
        });
    }
    var showOrder = function () {
        $(document).on('click', '.order_btn', function (e) {
            e.preventDefault()

            var id = $(this).closest('tr').attr('id');
            var href = $( this ).attr('href');

            var link = href +'?id='+id;

            window.open(link);
        });
    }

    //////////////// Search ///////////////////
    ///////////////////////////////////////////


    var search = function () {

        $('#generalSearch').on('input', function (e) {
            e.preventDefault();
            view_tbl.search($(this).val()).draw();
        });

        $('#status').on('change', function (e) {
            e.preventDefault();
            view_tbl.search($(this).val()).draw();
        })


        $('.search').on('click', function (e) {
            e.preventDefault();
            view_tbl.draw(false);
        });

        $('form input').keydown(function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();

                view_tbl.draw(false);
            }
        });

        $('.btn-clear').on('click', function (e) {
            e.preventDefault();
            $('.clear').val('');
            $('.clear').selectpicker("refresh");
        });
    };

    var checkResponse = function(){
        if(localStorage.getItem("Status"))
        {
            display_error_messages('success', 'Edit successfully')
            localStorage.clear();
        }
    }
    /////////////////// View order shipment //////////////////
    ///////////////////////////////////////////
    var shipmentOrderTable = function () {
     //   var id =   document.getElementById('shipmentId').value
       var id = $('#shipmentId').val();

        var link = order_url+'?id='+id;

        var columns = [
            {"data": "index", "title": "#", "orderable": false, "searchable": false},
            {"data": "number_order", "orderable": true, "searchable": true},
            {"data": "client_id", "orderable": true, "searchable": true},
            {"data": "phone", "orderable": true, "searchable": true},
            {"data": "country", "orderable": true, "searchable": true},
            {"data": "product_id", "orderable": true, "searchable": false},
            {"data": "payment_method_id", "orderable": true, "searchable": true},
            {"data": "created_at", "orderable": true, "searchable": false},
            {"data": "status_id", "orderable": true, "searchable": true},
            {"data": "actions", "orderable": false, "searchable": false},
            //{"data": "", "orderable": false, "searchable": false}
        ];
        var perPage = 25;
        var order = [[7, 'desc']];


        var ajaxFilter = function (d) {
            d.number = $('#generalSearchOrder').val();
            d.active=$('#statusOrder').val();
        };

        view_tbl_2 = DataTable.init($('#table_shipment_order'), link, columns, order, ajaxFilter, perPage);
    };
    /////////////////// update status order shipment //////////////////
    ///////////////////////////////////////////
    var updateStatusOrder = function () {
        $(document).on('click', '.change-status-order', function (e) {
            e.preventDefault()
            var id = $(this).closest('tr').attr('id');
            var href = $( this ).attr('href');
            var link = href +'?id='+id;
            var setStatus =$(this).attr('data-value');
            // var dataSta= $('#setStatus').val(setStatus);
            link =link+'&status='+setStatus;

            Forms.doAction(link, "", "", view_tbl_2, updateStatusCallBack);
        });
    }

    //var editDeliveryStatues=function () {
    //    $('.deliverOrder').on('click',function (e){
    //        console.log('aseel');
    //        e.preventDefault();
    //        let form = document.getElementById('up-delivery-order');
    //        var formData = new FormData(form);
    //        let method = form.getAttribute('method');
    //        let link = form.getAttribute('action');
    //        Forms.doAction(link, formData, method, null,editCallBack );
    //
    //    });
    //}

    var uploadInvoiceImage = function () {
        $('.deliverOrder').click(function (e) {
            e.preventDefault();
            var form = document.getElementById('up_delivery_order2');
            var url = form.getAttribute('action');
            var data = new FormData(form)

            $.ajax({
                       url: url,
                       method: 'POST',
                       data: data,
                       dataType: 'JSON',
                       contentType: false,
                       cache: false,
                       processData: false,
                       success:function(response)
                       {
                           $('#modalForDelivery .close').click();
                           form.reset();
                           $( '.modal-backdrop').remove();
                           display_error_messages('success', 'Saved Successfully')
                           view_tbl_2.draw(false)
                           //location.reload();
                       },
                       error: function(response) {
                           //console.log('Failed')
                           //console.log(response)

                           //$('.error').remove();
                           $.each(response.responseJSON.errors, function(k, v) {
                               display_error_messages('error', v[0])
                           });
                       }
                   });
        });
    }


    //////////////// Search ///////////////////
    ///////////////////////////////////////////


    var searchShipmentOrder = function () {

        $('#generalSearchOrder').on('input', function (e) {
            e.preventDefault();
            view_tbl_2.search($(this).val()).draw();
        });

        $('#statusOrder').on('change', function (e) {
            e.preventDefault();
            view_tbl_2.search($(this).val()).draw();
        })


        $('.search').on('click', function (e) {
            e.preventDefault();
            view_tbl_2.draw(false);
        });

        $('form input').keydown(function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();

                view_tbl_2.draw(false);
            }
        });

        $('.btn-clear').on('click', function (e) {
            e.preventDefault();
            $('.clear').val('');
            $('.clear').selectpicker("refresh");
        });
    };


    ///////////////// INITIALIZE //////////////
    ///////////////////////////////////////////
    return {
        init: function () {
            add();
            // edit();
            viewTable();
            search();
            updateStatus();
            updateShipment();
            checkResponse();
            editItem();
            showOrder();
            shipmentOrderTable();
            updateStatusOrder();
            uploadInvoiceImage();
            searchShipmentOrder();
        }
    }
}();
