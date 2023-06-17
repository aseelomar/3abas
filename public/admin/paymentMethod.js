
var PaymentMethod = function () {

    var view_tbl;
    var view_url = 'payments-method';
    var list_url = 'payments-method/getPayment';
    /////////////////// View //////////////////
    ///////////////////////////////////////////
    var viewTable = function () {
        var link = list_url;
        var columns = [
            {"data": "index", "title": "#", "orderable": false, "searchable": false},
            {"data": "title_ar", "orderable": true, "searchable": true},
            {"data": "title_en", "orderable": true, "searchable": false},
            {"data": "value", "orderable": true, "searchable": false},
            {"data": "rank", "orderable": true, "searchable": false},
            {"data": "created_at", "orderable": true, "searchable": true},
            {"data": "visible", "orderable": true, "searchable": true},
            {"data": "actions", "orderable": false, "searchable": false}
        ];
        var perPage = 25;
        var order = [[5, 'desc']];


        var ajaxFilter = function (d) {
            d.title = $('#generalSearch').val();
            // d.active=$('#status').val();
            d.deleted=0;
        };

        view_tbl = DataTable.init($('#payment_table'), link, columns, order, ajaxFilter, perPage);
    };
    /////////////////// ADD ///////////////////
    ///////////////////////////////////////////

    var add = function() {

        $('#payment_method_form').submit(function(e) {
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
        view_tbl.draw(0);
    }


    var addCallBack = function (resp) {
        display_error_messages('success', resp.message)
        document.querySelector('#reset-coupon').click();
        $(".save").removeClass("m-loader m-loader--light m-loader--left").html('Save').removeAttr("disabled");
    };
    /////////////////// EDIT //////////////////
    ///////////////////////////////////////////


    var updateCoupon=function () {
        $('#edit-payment-method').click(function (e){
            e.preventDefault();
            let form = document.getElementById('edit_pay');
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
    var deleteItem = function () {
        $(document).on('click', '.delete_btn', function (e) {
            e.preventDefault()
            var id = $(this).closest('tr').attr('id');
            var href = $( this ).attr('href');
            var link = href +'?id='+id;

            Forms.doAction(link, "", "", view_tbl, updateStatusCallBack);
        });
    }
    var editItem = function () {
        $(document).on('click', '.update_btn', function (e) {
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

        // $('#status').on('change', function (e) {
        //     e.preventDefault();
        //     view_tbl.search($(this).val()).draw();
        // })


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




    ///////////////// INITIALIZE //////////////
    ///////////////////////////////////////////
    return {
        init: function () {
            add();
            // edit();
            viewTable();
            search();
            deleteItem();
            updateStatus();
            updateCoupon()
            checkResponse();
            editItem();

        }
    }
}();
