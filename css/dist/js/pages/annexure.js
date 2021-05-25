/*
 * Author: Muthu
 * Date: 12 May 2021
 * Description:
 *      This is a  file used only for the customers (customers.html)
 **/

/* global moment:false, Chart:false, Sparkline:false */

$(function() {
    var csrf_token = $("input[name='_token']").val();

    $("#annexureList").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('#quotationId').select2({
        theme: 'bootstrap4'
    })

    $("#quotationId").change(function() {

        var quotationId = $('#quotationId').val();

        url = baseurl + "/getquotationdetails.html";
        $.ajax({
            url: url,
            type: "POST",
            data: { "_token": csrf_token, "quotationId": quotationId },
            success: function(response) {
                responseData = $.parseJSON(response);
                $("#ctsYear").val(responseData[0].ctsYear)
                $("#ctsDate").val(responseData[0].ctsDate);
                $("#ctsRef").val(responseData[0].ctsRef);
                $("#payment").val('100% PAYMENT WITHIN 15 DAYS');
                $("#pfCharges").val('NIL');
            }
        });
    })


    $('#addcustomer').validate({
        rules: {
            name: {
                required: true,

            },
            address: {
                required: true,

            },
            phone: {
                required: true,

            },
            email: {
                required: true,
                email: true,
            },
            cstNo: {
                required: true,

            }
        },
        messages: {
            name: {
                required: "Please enter the Name",


            },
            address: {
                required: "Please enter the Address",


            },
            phone: {
                required: "Please enter the Phone",


            },
            email: {
                required: "Please enter a email address",
                email: "Please enter a vaild email address"
            },
            cstNo: {
                required: "Please enter a email GST No",


            }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

    $('.openBtn').on('click', function() {
        let id = this.id;
        $("#delteTrue").attr("href", "deletecustomer.html/" + id)
        $('#modal-danger').modal({ show: true });
    });

});