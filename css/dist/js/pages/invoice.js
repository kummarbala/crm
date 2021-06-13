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
    $('#challanNo').select2({
        theme: 'bootstrap4'
    })
    $('#invoiceDate').datetimepicker({
        format: 'L'
    });



    $("#challanNo").change(function() {
        var challanNo = $('#challanNo').val();
        url = baseurl + "/getdcdetailsbychallan.html";
        $.ajax({
            url: url,
            type: "POST",
            data: { "_token": csrf_token, "challanNo": challanNo },
            success: function(response) {

                const responseData = $.parseJSON(response);
                console.log("response", responseData)
                $("#customerName").val(responseData[0]['name']);
                $("#customerId").val(responseData[0]['customerId'])
                $("#orderAckNo").val(responseData[0]['orderAckNo']);
                $("#modeDespatch").val(responseData[0]['modeDespatch']);
                $("#ctsYear").val(responseData[0]['ctsYear'])
                $("#vendorCode").val(responseData[0]['customerCode'])
                $("#poNo").val(responseData[0]['poNo'])
                $("#gstNo").val(responseData[0]['gstNo'])
                $("#invoiceNo").val(responseData[0]['challanNo'])
                $("#contactPerson").val(responseData[0]['contactPerson'])

                const products = responseData['products'];
                let totalAmt = 0;


                if (products.length > 0) {
                    if ($('#noData').length) {
                        $('#noData').remove();
                    }
                    $("#productItem").html('')
                    $.each(products, function(index, value) {
                        $("#productItem").append('<tr class="editable"><td>' + value.description + '<input type="hidden" class="description" name="description[]" value="' + value.description + '"></td><td>' + value.drawingNo + '<input type="hidden" class="drawingNo" name="drawingNo[]" value="' + value.drawingNo + '"></td><td>' + value.material + '<input type="hidden" class="material" name="material[]" value="' + value.material + '"></td></div></td><td>' + value.quantity + '<input type="hidden" class="quantity" name="quantity[]" value="' + value.quantity + '"></td><td>' + value.rate + '<input type="hidden" class="rate" name="rate[]" value="' + value.rate + '"><td>' + value.unit + '<input type="hidden" class="unit" name="unit[]" value="' + value.unit + '"></td></td><td>' + value.total + '<input type="hidden" class="total" name="total[]" value="' + value.total + '"></td></tr>');
                        totalAmt = parseInt(totalAmt) + parseInt(value.total);
                    })

                    $("#invoiceAmtData").append('<tr><td class="amt-label">Amount</td><td class="extra-charges"></td><td class="amt-data">' + parseFloat(totalAmt).toFixed(2) + '<input type="hidden" name="totalAmt" id="totalAmt" value="' + parseFloat(totalAmt).toFixed(2) + '"></td></tr><tr><td class="amt-label">PF Charges</td><td class="extra-charges"><input type="text" class="form-control" name="pfCharges" id="pfCharges" value="" placeholder="NIL" style="width:111px;float: left;margin-right: 10px;" >&nbsp;<input type="text" class="form-control" name="otherpf" id="otherpf" value="" placeholder="NIL" style="display:none;width:111px;float: left;margin-right: 10px;"><input type="hidden" name="pfChargesamt" id="pfChargesamt" value="0.00"></td><td width="20%" class="amt-data" id="pfChargesamtTxt">' + parseFloat(0).toFixed(2) + '</td></tr><tr><td class="amt-label">Frieght Details</td><td class="extra-charges"><input type="text" class="form-control" name="friDetails" id="friDetails" value="" style="width:111px;float: left;margin-right: 10px;" >&nbsp;<input type="text" class="form-control" name="otherFd" id="otherFd" value=""  style="display:none;width:111px;float: left;margin-right: 10px;"><input type="hidden" name="friDetailsAmt" id="friDetailsAmt"  value="0.00"></td><td width="20%" class="amt-data" id="friDetailsAmtTxt">' + parseFloat(0).toFixed(2) + '</td></tr><tr><td class="amt-label">TPI Charges</td><td class="extra-charges"><input type="text" class="form-control" name="tpiCharges" id="tpiCharges" value="" style="width:111px;float: left;margin-right: 10px;" >&nbsp;<input type="text" class="form-control" name="othertpi" id="othertpi" value=""  style="display:none;width:111px;float: left;margin-right: 10px;"><input type="hidden" name="tpiChargesamt" id="tpiChargesamt" value="0.00"></td><td width="20%" class="amt-data" id="tpiChargesamtTxt">' + parseFloat(0).toFixed(2) + '</td></tr><tr><td class="amt-label">CGST Tax</td><td class="extra-charges"><select name="cgsttax" id="cgsttax" class="form-control"><option value="0">0</option><option value="9" selected>9%</option></select><input type="hidden" name="ctaxamt" id="ctaxamt" value="0.00"></td><td width="20%" class="amt-data" id="ctaxamttxt">' + parseFloat(0).toFixed(2) + '</td></tr><tr><td class="amt-label">SGST Tax</td><td class="extra-charges"><select name="sgsttax" id="sgsttax" class="form-control"><option value="0">0</option><option value="9" selected>9%</option></select><input type="hidden" name="staxamt" id="staxamt" value="0.00"></td><td width="20%" class="amt-data" id="staxamttxt">' + parseFloat(0).toFixed(2) + '</td></tr><tr><td class="amt-label">IGST Tax</td><td class="extra-charges"><select name="igsttax" id="igsttax" class="form-control"><option value="0" selected>0</option><option value="18">18%</option></select><input type="hidden" name="itaxamt" id="itaxamt" value="0.00"></td><td width="20%" class="amt-data" id="itaxamttxt">' + parseFloat(0).toFixed(2) + '</td></tr><tr><td class="amt-label">Total Amount</td><td class="extra-charges"><input type="hidden" class="form-control" name="totalAmtWithTax" id="totalAmtWithTax" value=""></td><td width="20%" class="amt-data" id="totalAmtWithTaxTxt">' + parseFloat(0).toFixed(2) + '</td></tr><tr><td colspan="3" class="amt-data" id="priceInWords" style="float: left;width: 100%;text-align: left;"></td></tr>');

                    callTax()


                }

            }
        });
    });

    $(document.body).on('change', '#totalAmtWithTax', function() {

        let amountWithTax = parseFloat($('#totalAmt').val()) + parseFloat($('#pfChargesamt').val()) + parseFloat($('#friDetailsAmt').val()) + parseFloat($('#tpiChargesamt').val()) + parseFloat($('#ctaxamt').val()) + parseFloat($('#staxamt').val()) + parseFloat($('#itaxamt').val());
        $('#totalAmtWithTax').val(parseFloat(amountWithTax).toFixed(2));
        $('#totalAmtWithTaxTxt').html(parseFloat(amountWithTax).toFixed(2));

        url = baseurl + "/currencystring.html";
        let withTax = $('#totalAmtWithTax').val();
        $.ajax({
            url: url,
            type: "POST",
            data: { "_token": csrf_token, "withTax": withTax },
            success: function(response) {
                $('#priceInWords').html(response)
            }
        })

    })

    function callTax() {
        $('#cgsttax').trigger('change');
        $('#sgsttax').trigger('change');
        $('#igsttax').trigger('change');
    }

    $(document.body).on('change', '#pfCharges', function() {
        let pfCharges = $('#pfCharges').val();
        $('#pfCharges').val(pfCharges + "%")
        $('#pfChargesamt').val('0.00');
        $('#pfChargesamtTxt').html('0.00');
        if (pfCharges === '0') {
            $('#otherpf').css('display', "block");
            $('#otherpf').focus();
        } else {
            $('#otherpf').css('display', "none");
            $('#otherpf').val('');
            $('#pfChargesamt').val(parseFloat($('#totalAmt').val() * (pfCharges / 100)).toFixed(2));
            $('#pfChargesamtTxt').html(parseFloat($('#totalAmt').val() * (pfCharges / 100)).toFixed(2));
            callTax()
        }
    });

    $(document.body).on('change', '#otherpf', function() {
        $('#pfChargesamt').val();
        $('#pfChargesamtTxt').val();
        $('#pfChargesamt').val(parseFloat($('#otherpf').val()).toFixed(2));
        $('#pfChargesamtTxt').html(parseFloat($('#otherpf').val()).toFixed(2));
        callTax()
    })

    $(document.body).on('change', '#friDetails', function() {
        let friDetails = $('#friDetails').val();
        $('#friDetails').val(friDetails + "%")
        $('#friDetailsAmt').val('0.00');
        $('#friDetailsAmtTxt').html('0.00');
        if (friDetails === '0') {
            $('#otherFd').css('display', "block");
            $('#otherFd').focus();
        } else {
            $('#otherFd').css('display', "none");
            $('#otherFd').val('');
            $('#friDetailsAmt').val(parseFloat($('#totalAmt').val() * (friDetails / 100)).toFixed(2));
            $('#friDetailsAmtTxt').html(parseFloat($('#totalAmt').val() * (friDetails / 100)).toFixed(2));
            callTax()
        }
    });

    $(document.body).on('change', '#otherFd', function() {
        $('#friDetailsAmt').val();
        $('#friDetailsAmtTxt').val();
        $('#friDetailsAmt').val(parseFloat($('#otherFd').val()).toFixed(2));
        $('#friDetailsAmtTxt').html(parseFloat($('#otherFd').val()).toFixed(2));
        callTax()
    })

    $(document.body).on('change', '#tpiCharges', function() {
        let tpiCharges = $('#tpiCharges').val();
        $('#tpiCharges').val(tpiCharges + "%")
        $('#tpiChargesamt').val('0.00');
        $('#tpiChargesamtTxt').html('0.00');
        if (tpiCharges === '0') {
            $('#othertpi').css('display', "block");
            $('#othertpi').focus();
        } else {
            $('#othertpi').css('display', "none");
            $('#othertpi').val('');
            $('#tpiChargesamt').val(parseFloat($('#totalAmt').val() * (tpiCharges / 100)).toFixed(2));
            $('#tpiChargesamtTxt').html(parseFloat($('#totalAmt').val() * (tpiCharges / 100)).toFixed(2));
            callTax()
        }
    });

    $(document.body).on('change', '#othertpi', function() {
        $('#tpiChargesamt').val();
        $('#tpiChargesamtTxt').val();
        $('#tpiChargesamt').val(parseFloat($('#othertpi').val()).toFixed(2));
        $('#tpiChargesamtTxt').html(parseFloat($('#othertpi').val()).toFixed(2));
        callTax()
    })







    $(document.body).on('change', '#cgsttax', function() {
        let cgsttax = $('#cgsttax').val();

        let amountWithoutTax = parseFloat($('#totalAmt').val()) + parseFloat($('#pfChargesamt').val()) + parseFloat($('#friDetailsAmt').val()) + parseFloat($('#tpiChargesamt').val());
        $('#ctaxamt').val((amountWithoutTax * (parseInt(cgsttax) / 100)).toFixed(2));
        $('#ctaxamttxt').html((amountWithoutTax * (parseInt(cgsttax) / 100)).toFixed(2));
        $('#totalAmtWithTax').trigger('change');
    })


    $(document.body).on('change', '#sgsttax', function() {
        let sgsttax = $('#sgsttax').val();

        let amountWithoutTax = parseFloat($('#totalAmt').val()) + parseFloat($('#pfChargesamt').val()) + parseFloat($('#friDetailsAmt').val()) + parseFloat($('#tpiChargesamt').val());
        $('#staxamt').val((amountWithoutTax * (parseInt(sgsttax) / 100)).toFixed(2));
        $('#staxamttxt').html((amountWithoutTax * (parseInt(sgsttax) / 100)).toFixed(2));
        $('#totalAmtWithTax').trigger('change');

    })

    $(document.body).on('change', '#igsttax', function() {
        let igsttax = $('#igsttax').val();

        let amountWithoutTax = parseFloat($('#totalAmt').val()) + parseFloat($('#pfChargesamt').val()) + parseFloat($('#friDetailsAmt').val()) + parseFloat($('#tpiChargesamt').val());

        $('#itaxamt').val((amountWithoutTax * (parseInt(igsttax) / 100)).toFixed(2));
        $('#itaxamttxt').html((amountWithoutTax * (parseInt(igsttax) / 100)).toFixed(2));
        $('#totalAmtWithTax').trigger('change');

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