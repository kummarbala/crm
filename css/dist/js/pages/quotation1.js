/*
 * Author: Muthu
 * Date: 12 May 2021
 * Description:
 *      This is a  file used only for the customers (customers.html)
 **/

/* global moment:false, Chart:false, Sparkline:false */
var csrf_token = $("input[name='_token']").val();

$(function() {
    $("#quotations").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $("#quotationprds").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


    // $.ajax({url: url,
    //     type: "POST",
    //     data: {"_token": csrf_token,"customerEnquiryId": customerEnqId},
    //     success: function(response) {
    //         //console.log("response",response)
    //         $("#GAEnquiryRefNo2").val($("#GAEnquiryRefNo").val());
    //         $("#GAEnquiryRefDate2").val($("#GAEnquiryRefDate").val());
    //         $("#customerEnquiryRefNo1").val($("#customerEnquiryRefNo").val());
    //         $("#customerName1").val($("#customerName").val());

    //         var customerEnquiryData = JSON.parse(response);
    //         var k=1;
    //         customerEnquiryData.forEach(custItemElement => {
    //             var customerEnquiryDataItems = custItemElement['items'];
    //             var rowItemId = customerEnquiryDataItems.ItemId;
    //             var itemGAItemCode = customerEnquiryDataItems.itemGAItemCode ;
    //             var itemNo = customerEnquiryDataItems.itemNo;
    //             var itemGAItemDescription =  customerEnquiryDataItems.itemGAItemDescription;
    //             var itemComments = customerEnquiryDataItems.itemComments;
    //             var ItemQuantity = customerEnquiryDataItems.ItemQuantity;
    //             var itemUOM = customerEnquiryDataItems.itemUOM;
    //             var customerenquiryItemsId = customerEnquiryDataItems.customerenquiryItemsId

    //             customerItemHtml +=  '<tr id="row_'+rowItemId+'"><td>'+k+'</td><td><span style="font-weight: bold;">GA Item Code:</span><span>'+ itemGAItemCode +'</span><br><span style="font-weight: bold;">Customer Item Code:</span><span>'+ itemNo+' </span></td><td><span style="font-weight: bold;">GA Item Description:</span><span>'+ itemGAItemDescription +'</span><br><span style="font-weight: bold;">Customer Item Description:</span><span>'+ itemComments+' </span></td><td></td><td></td><td></td><td>'+ ItemQuantity+'</td><td>'+ itemUOM+'</td><td></td><td></td><td></td><td></td><td></td><input type="hidden" class="form-control trid" id="trid_'+rowItemId+'" name="trid[]" value="'+rowItemId+'"><input type="hidden" class="form-control trno" id="trno_'+rowItemId+'" name="trno[]" value="'+k+'"><input type="hidden" class="form-control itemId" id="itemId_'+rowItemId+'" name="itemId[]" value="'+rowItemId+'"><input type="hidden" class="form-control supplierQuotationItemId" id="supplierQuotationItemId_'+rowItemId+'" name="supplierQuotationItemId[]" value=""> <input type="hidden" class="form-control GAitemCode" id="GAitemCode_'+rowItemId+'" name="GAitemCode[]" value="'+itemGAItemCode+'"><input type="hidden" class="form-control Customeritemcode" id="Customeritemcode_'+rowItemId+'" name="Customeritemcode[]" value="'+itemNo+'"><input type="hidden" class="form-control Gaitemdescription" id="Gaitemdescription_'+rowItemId+'" name="Gaitemdescription[]" value="'+itemGAItemDescription+'"><input type="hidden" class="form-control CustomerItemDescription" id="CustomerItemDescription_'+rowItemId+'" name="CustomerItemDescription[]" value="'+itemComments+'"><input type="hidden" class="form-control supplierId" id="supplierId_'+rowItemId+'" name="supplierId[]" value=""><input type="hidden" class="form-control supplierName" id="supplierName_'+rowItemId+'" name="supplierName[]" value=""><input type="hidden" class="form-control quantity" id="quantity_'+rowItemId+'" name="quantity[]" value="'+ItemQuantity+'"><input type="hidden" class="form-control UOM" id="UOM_'+rowItemId+'" name="UOM[]" value="'+itemUOM+'"><input type="hidden" class="form-control rateinQuoteCurrency" id="rateinQuoteCurrency_'+rowItemId+'" name="rateinQuoteCurrency[] " value=""><input type="hidden" class="form-control rateinBaseCurrency" id="rateinBaseCurrency_'+rowItemId+'" name="rateinBaseCurrency[]" value=""> <input type="hidden" class="form-control deliverySchedule" id="deliverySchedule_'+rowItemId+'" name="deliverySchedule[]" value=""><input type="hidden" class="form-control deliverDuration" id="deliverDuration_'+rowItemId+'" name="deliverDuration[]" value=""><input type="hidden" class="form-control additionalinformation" id="additionalinformation_'+rowItemId+'" name="additionalinformation[]" value=""><input type="hidden" class="form-control baseCurrency" id="baseCurrency_'+rowItemId+'" name="baseCurrency[]" value=""><input type="hidden" class="form-control alterItemcode" id="alterItemcode_'+rowItemId+'"  name="alterItemcode[]" value=""><input type="hidden" class="form-control alterItemDescription" id="alterItemDescription"  name="alterItemDescription[]" value=""><input type="hidden" class="form-control deliveryNotes" id="deliveryNotes_'+rowItemId+'"  name="deliveryNotes[]" value=""><input type="hidden" class="form-control discount" id="discount_'+rowItemId+'"  name="discount[]" value=""></tr>'
    //             k++;


    //         });
    //         $("#itemContainer").html(customerItemHtml);

    //     }
    // });

    // Autocomplete  Ends

    //Initialize Select2 Elements
    $('.customername').select2({
        theme: 'bootstrap4'
    })

    $('.selectUnit').select2({
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


    $('#addquotation').validate({
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