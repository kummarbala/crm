/*
 * Author: Muthu
 * Date: 12 May 2021
 * Description:
 *      This is a  file used only for the customers (customers.html)
 **/

/* global moment:false, Chart:false, Sparkline:false */

$(function() {
    var csrf_token = $("input[name='_token']").val();

    $("#despatchadvicetable").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    // Select2 && datepicker configration starts
    $('#orderAckNo').select2({
        theme: 'bootstrap4'
    })
    $('#dcDate').datetimepicker({
        format: 'L'
    });

    $('.dueDate').datetimepicker({
        format: 'L'
    });

    $("#orderAckNo").change(function() {
        var orderAckNo = $('#orderAckNo').val();
        url = baseurl + "/getorderdetailsbyackno.html";
        $.ajax({
            url: url,
            type: "POST",
            data: { "_token": csrf_token, "orderAckNo": orderAckNo },
            success: function(response) {

                const responseData = $.parseJSON(response);
                console.log("response", responseData)
                $("#customerName").val(responseData[0]['name']);
                $("#customerId").val(responseData[0]['customerId'])
                $("#ctsYear").val(responseData[0]['ctsYear'])
                $("#vendorCode").val(responseData[0]['customerCode'])
                $("#poNo").val(responseData[0]['poNo'])
                $("#gstNo").val(responseData[0]['gstNo'])
                const products = responseData['products'];


                if (products.length > 0) {
                    if ($('#noData').length) {
                        $('#noData').remove();
                    }
                    $("#productItem").html('')
                    $.each(products, function(index, value) {
                        $("#productItem").append('<tr class="editable"><td>' + value.description + '<input type="hidden" class="description" name="description[]" value="' + value.description + '"></td><td>' + value.drawingNo + '<input type="hidden" class="drawingNo" name="drawingNo[]" value="' + value.drawingNo + '"></td><td>' + value.material + '<input type="hidden" class="material" name="material[]" value="' + value.material + '"></td></div></td><td>' + value.quantity + '<input type="hidden" class="quantity" name="quantity[]" value="' + value.quantity + '"></td><td>' + value.rate + '<input type="hidden" class="rate" name="rate[]" value="' + value.rate + '"><td>' + value.unit + '<input type="hidden" class="unit" name="unit[]" value="' + value.unit + '"></td></td><td>' + value.total + '<input type="hidden" class="total" name="total[]" value="' + value.total + '"></td><td><div class="input-group " id="remarks"     data-target-input="nearest"><input type="text" class="form-control"  name="remarks[]" value=""></div></tr>');
                    })
                }

            }
        });
    })


    // $.validator.setDefaults({
    //     submitHandler: function() {
    //         alert("Form successful submitted!");
    //     }
    // });
    $('#addorderacknowledgement').validate({
        rules: {
            quotationId: {
                required: true,

            },
            customerName: {
                required: true,

            },

        },
        messages: {
            quotationId: {
                required: "Please select the Quotation",


            },
            customerName: {
                required: "Please enter the Custor Name",


            },

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