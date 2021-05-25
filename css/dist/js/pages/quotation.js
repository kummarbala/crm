/*
 * Author: Muthu
 * Date: 12 May 2021
 * Description:
 *      This is a  file used only for the customers (customers.html)
 **/

/* global moment:false, Chart:false, Sparkline:false */

$(function() {
    var csrf_token = $("input[name='_token']").val();

    // Modal form validation Starts
    $('#addQuotation').validate({
        ignore: [],
        rules: {
            customerId: {
                required: true,

            },
            ctsRef: {
                required: true,

            },
            productcount: {
                required: true,

            },

        },
        messages: {
            customerId: {
                required: "Please select a customer Name",
            },
            ctsRef: {
                required: "Please enter the CTS Ref",
            },
            productcount: {
                required: "Please Add one product",
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

    // Modal form validation Starts
    $('#addProductForm').validate({
        rules: {
            description: {
                required: true,

            },
            drawingNo: {
                required: true,

            },
            material: {
                required: true,

            },
            quantity: {
                required: true,
                number: true
            },
            rate: {
                required: true,
                number: true
            }
        },
        messages: {
            description: {
                required: "Please enter the Description",
            },
            drawingNo: {
                required: "Please enter the HSN No",
            },
            material: {
                required: "Please enter the material",
            },
            quantity: {
                required: "Please enter the Quantity",
                number: "Please enter only number"
            },
            rate: {
                required: "Please enter the rate",
                number: "Please enter only number"

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

    // Modal form validation Ends

    // Quations list table datatable starts
    $("#quotations").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    // Quations list table datatable Ends

    // QuationsProduct list table datatable starts
    $("#quotationprds").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    // QuationsProduct list table datatable Ends

    // Select2 && datepicker configration starts
    $('.customername').select2({
        theme: 'bootstrap4'
    })


    $('#ctsDate').datetimepicker({
        format: 'L'
    });
    $('#enquiryDate').datetimepicker({
        format: 'L'
    });
    $('#dueDate').datetimepicker({
        format: 'L'
    });
    // Select2 && datepicker configration ends



    $("#customerId").change(function() {
        var customerId = $('#customerId').val();
        if (customerId !== '0') {
            $("#addProductBut").prop('disabled', false)
        } else {
            $("#addProductBut").attr('disabled', 'disabled')
        }
        url = baseurl + "/getcustomerdetails.html";
        $.ajax({
            url: url,
            type: "POST",
            data: { "_token": csrf_token, "customerId": customerId },
            success: function(response) {
                let result = response.split("~");
                console.log(result)
                $("#ctsRef").val(result[0]);
                $("#referenceNo").val(result[1]);
            }
        });
    })

    // Autocomplete in modal starts
    $("#description").autocomplete({
        source: function(request, response) {
            url = baseurl + "/getproductdescriptiondata.html";
            let customerId = $("#customerId").val();
            $.ajax({
                url: url,
                type: "POST",
                dataType: "json",
                data: { "_token": csrf_token, "customerId": customerId, term: request.term },
                success: function(data) {
                    response(data);
                },
                error: function(message) {
                    response([{ 'label': 'Not found!' }]);
                }
            });
        },
        minLength: 2,
        max: 10,
        scroll: true
    });

    $("#description").autocomplete("option", "appendTo", ".addProductForm");
    // Autocomplete in modal Ends

    // Rate calculation starts
    $(document).on('blur', '#rate', function(e) {
        let quantity = $("#quantity").val();
        let rate = $("#rate").val();
        let total = (parseFloat(quantity) * parseFloat(rate)).toFixed(2);
        if (!isNaN(total)) {
            document.getElementById('rate').value = parseFloat(rate).toFixed(2);
            document.getElementById('total').value = total;
        }
    })

    $(document).on('blur', '#quantity', function(e) {
            let quantity = $("#quantity").val();
            let rate = $("#rate").val();
            let total = (parseFloat(quantity) * parseFloat(rate)).toFixed(2);
            if (!isNaN(total)) {
                document.getElementById('rate').value = parseFloat(rate).toFixed(2);
                document.getElementById('total').value = total;
            }
        })
        // Rate calculation Ends

    // $(".editable").dblclick(function() {
    $(document).on('dblclick', '.editable', function(e) {
        let description = $(".description").val();
        let drawingNo = $('.drawingNo').val()
        let material = $('.material').val()
        let quantity = $('.quantity').val()
        let unit = $('.unit').val()
        let rate = $('.rate').val()
        let total = $('.total').val()

        if (unit === 'Number') {
            options = '<option value="Number" selected> Number</option><option value="KG"> KG</option><option value="Set">Set</option><option value="Meter"> Meter</option>'
        } else if (unit === 'KG') {
            options = '<option value="Number" > Number</option><option value="KG" selected> KG</option><option value="Set">Set</option><option value="Meter"> Meter</option>'
        } else if (unit === 'Meter') {
            options = '<option value="Number" > Number</option><option value="KG" > KG</option><option value="Set">Set</option><option value="Meter" selected> Meter</option>'
        } else if (unit === 'Set') {
            options = '<option value="Number" > Number</option><option value="KG" > KG</option><option value="Set" selected>Set</option><option value="Meter"> Meter</option>'
        }
        $(this).closest("tr").html('<td><input type="text" class="form-control editabletxt" id="description" name="description" value="' + description + '" /></td><td><input type="text" class="form-control editabletxt" id="drawingNo" name="drawingNo" value="' + drawingNo + '" /></td><td><input type="text" class="form-control editabletxt" id="material" name="material" value="' + material + '" /></td><td><input type="text" class="form-control editabletxt" id="quantity" name="quantity" value="' + quantity + '" /></td><td><select class="form-control select editabletxt" style="width: 100%;" id="unit" name="unit">' + options + '</select></td><td><input type="text" class="form-control editabletxt" id="rate" name="rate" value="' + rate + '" /></td><td><input type="text" class="form-control editabletxt" id="total" name="total" value="' + total + '" /></td><td><span><a href="javascript:void(0)" class="saveProduct"><i class="fa fa-save actionbuttonsize saveProduct"></i></a></span></td>');
    })

    $(document).on('click', '.saveProduct', function(e) {
        let description = $('#description').val()
        let drawingNo = $('#drawingNo').val()
        let material = $('#material').val()
        let quantity = $('#quantity').val()
        let unit = $('#unit').val()
        let rate = $('#rate').val()
        let total = $('#total').val()
        $(this).closest("tr").html('<td>' + description + '<input type="hidden" class="description" name="description[]" value="' + description + '"></td><td>' + drawingNo + '<input type="hidden" class="drawingNo" name="drawingNo[]" value="' + drawingNo + '"></td><td>' + material + '<input type="hidden" class="material" name="material[]" value="' + material + '"></td><td>' + quantity + '<input type="hidden" class="quantity" name="quantity[]" value="' + quantity + '"></td><td>' + unit + '<input type="hidden" class="unit" name="unit[]" value="' + unit + '"></td><td>' + rate + '<input type="hidden" class="rate" name="rate[]" value="' + rate + '"></td><td>' + total + '<input type="hidden" class="total" name="total[]" value="' + total + '"></td><td><span><a href="javascript:void(0)" class="remove"><i class="fa fa-times actionbuttonsize removeIcon"></i></a></span></td>')
    })


    // Modal window Close starts
    $(document).on('click', '#productAdd', function(e) {

        if ($('#addProductForm').valid()) {
            if ($('#noData').length) {
                $('#productcount').val("yes")
                $('#noData').remove();
            }
            description = $('#description').val()
            drawingNo = $('#drawingNo').val()
            material = $('#material').val()
            quantity = $('#quantity').val()
            unit = $('#unit').val()
            rate = $('#rate').val()
            total = $('#total').val()

            $("#productItem").append('<tr class="editable"><td>' + description + '<input type="hidden" class="description" name="description[]" value="' + description + '"></td><td>' + drawingNo + '<input type="hidden" class="drawingNo" name="drawingNo[]" value="' + drawingNo + '"></td><td>' + material + '<input type="hidden" class="material" name="material[]" value="' + material + '"></td><td>' + quantity + '<input type="hidden" class="quantity" name="quantity[]" value="' + quantity + '"></td><td>' + unit + '<input type="hidden" class="unit" name="unit[]" value="' + unit + '"></td><td>' + rate + '<input type="hidden" class="rate" name="rate[]" value="' + rate + '"></td><td>' + total + '<input type="hidden" class="total" name="total[]" value="' + total + '"></td><td><span><a href="javascript:void(0)" class="remove"><i class="fa fa-times actionbuttonsize removeIcon"></i></a></span></td></tr>');
            total = $('#total').val()
            $('#description').val("")
            $('#drawingNo').val("")
            $('#material').val("")
            $('#quantity').val("")

            $('#rate').val("")
            $('#total').val("")

            $('#addProductModal').modal('toggle');
        }
    });
    // Modal window Close Ends

    // Remove Products Close starts
    $(document).on('click', '.remove', function(e) {
            (this).closest("tr").remove();
            const rowCount = $('#productItem tr').length;
            if (rowCount === 0) {
                $("#productItem").append('<tr><td>No Data Found</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>');
                $('#productcount').val("")
            }
        })
        // Remove Products Close Ends



});