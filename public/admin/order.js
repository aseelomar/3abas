var Order = function () {

    var view_tbl;
    var view_url = 'orders';
    var list_url = 'orders/getOrder';
    /////////////////// View //////////////////
    ///////////////////////////////////////////
    var viewTable = function () {
        var link = list_url;
        var columns = [
            {"data": "index", "title": "#", "orderable": false, "searchable": false},
            {"data": "number_order", "orderable": true, "searchable": true},
            {"data": "client_id", "orderable": true, "searchable": true},
            {"data": "phone", "orderable": true, "searchable": true},
            {"data": "country", "orderable": true, "searchable": true},
            {"data": "product_id", "orderable": true, "searchable": true},
            {"data": "payment_method_id", "orderable": true, "searchable": true},
            {"data": "transfer_at", "orderable": true, "searchable": false},
            {"data": "created_at", "orderable": true, "searchable": false},
            {"data": "shipment_id", "orderable": true, "searchable": true},
            {"data": "status_id", "orderable": true, "searchable": true},
             {"data": "actions", "orderable": false, "searchable": false},
            //{"data": "", "orderable": false, "searchable": false}
        ];
        var perPage = 25;
        var order = [[8, 'desc']];


        var ajaxFilter = function (d) {
            d.number = $('#generalSearch').val();
            d.shipment_id = $('#searchShipment').val();
            d.active=$('#status').val();
        };

        view_tbl = DataTable.init($('#table_order'), link, columns, order, ajaxFilter, perPage);
    };
    ///////////////////////////////////////////////
    var updateStatus = function () {
        $(document).on('click', '.change-status', function (e) {
            e.preventDefault()
            var id = $(this).closest('tr').attr('id');
            var href = $( this ).attr('href');
            var link = href +'?id='+id;
            var setStatus =$(this).attr('data-value');
           // var dataSta= $('#setStatus').val(setStatus);
             link =link+'&status='+setStatus;

            Forms.doAction(link, "", "", view_tbl, updateStatusCallBack);
        });
    }

    var  updateStatusCallBack = function (resp) {
        display_error_messages('success', resp.message)
        view_tbl.draw(0);
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

    /////////////////////////////////////////////////////////////////////////////////////

    var search = function () {

        $('#generalSearch').on('input', function (e) {
            e.preventDefault();
            view_tbl.search($(this).val()).draw();
        });

        $('#status').on('change', function (e) {
            e.preventDefault();
            view_tbl.search($(this).val()).draw();
        })
        ////
        //$('#searchShipmentInput').on('click', function (e) {
        //    e.preventDefault();
        //    view_tbl.search($(this).val()).draw();
        //})

        $('#searchShipment').on('click', function (e) {
            e.preventDefault();
            view_tbl.search($(this).val()).draw();
        });
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
    // //////////////////////////////////////
    var massegeReject = function () {
        $('.rejectOrder').click(function (e) {
            e.preventDefault();
            var form = document.getElementById('up_reject_order2');
            var url = form.getAttribute('action');
            var data = new FormData(form)
            $('.rejectOrder').attr('disabled', true);

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
                           $('#modalForReject .close').click();
                           form.reset();
                           $( '.modal-backdrop').remove();
                           display_error_messages('success', 'Saved Successfully')
                           $('.rejectOrder').attr('disabled', false);

                           view_tbl.draw(false)
                       },
                       error: function(response) {
                           //console.log('Failed')
                           //console.log(response)

                           //$('.error').remove();
                           $.each(response.responseJSON.errors, function(k, v) {
                               display_error_messages('error', v[0])
                               $('.rejectOrder').attr('disabled', false);

                           });
                       }
                   });
        });
    }
    var chooseShiomentCampany = function () {
        $('.setShippingOrder').click(function (e) {
            e.preventDefault();
            var form = document.getElementById('choose-shipping-company');
            var url = $('.set-shipping-company').attr('action');
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
                           $('#modalChooseShipping .close').click();
                           form.reset();
                           $('.modal-backdrop').remove();
                           display_error_messages('success', 'Saved Successfully')
                           view_tbl.draw(false)
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

    // //////////////////////////////

    return {
        init: function () {

            viewTable();
            search();
            checkResponse();
            updateStatus();
            massegeReject();

            chooseShiomentCampany();

        }
    }
}();
