/*
 * Author: Muthu
 * Date: 12 May 2021
 * Description:
 *      This is a  file used only for the customers (customers.html)
 **/

/* global moment:false, Chart:false, Sparkline:false */

$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,

    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    // $.validator.setDefaults({
    //     submitHandler: function() {
    //         alert("Form successful submitted!");
    //     }
    // });
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
                // email: "Please enter a vaild email address"
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