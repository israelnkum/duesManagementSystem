
var paymentLogTable;
var stdTable;
var reverseTable;

$(document).ready(function() {
    paymentLogTable= $("#paymentLogTable").DataTable({
        autoFill: true,
        "ajax": "../../../validation/superAdmin/students/selectAllPaymentLog.php",
        "order":[],
        dom: 'Bfrtip',
        buttons: [
            // 'print',
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [1,2,3,4,5,6,7,8]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [1,2,3,4,5,6,7,8]
                }
            },
            'colvis'
        ],
    });

    stdTable= $("#stdTable").DataTable({

        "ajax": "../../../validation/superAdmin/students/retrieveAllStudents.php",
        "order":[],
        dom: 'Bfrtip',
        buttons: [
            // 'print',
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [1,2,3,4,6,7]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 5 ]
                }
            },
            'colvis'
        ],
    });



    reverseTable= $("#reverseTable").DataTable({
        autoFill: true,
        "ajax": "../../../validation/superAdmin/students/individualPayment.php",
        "order":[],
        dom: 'Bfrtip',
        buttons: [
            // 'print',
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [1,2,3,4]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [1,2,3,4]
                }
            },
            'colvis'
        ],
    });

    $("#addNewStudentBtn").on('click',function () {
        //reset the form
        $("#addNewStudentForm")[0].reset();
        $("#addNewStudentForm").removeClass();



        $("#addNewStudentForm").unbind('submit').bind('submit',function () {
            var form = $(this);
            //validation
            var stdFirstName = $("#stdFirstName").val();
            var stdLastName = $("#stdLastName").val();
            var stdIndexNumber = $("#stdIndexNumber").val();
            var stdClass = $("#stdClass").val();
            var stdPhoneNumber = $("#stdPhoneNumber").val();

            if (stdFirstName   && stdLastName  && stdIndexNumber && stdClass && stdPhoneNumber){
                //submit the form to server

                $.ajax({
                    url :form.attr('action'),
                    type : form.attr('method'),
                    data : form.serialize(),
                    dataType : 'json',

                    success:function (response) {
                        if(response.success === true){
                            // $("#addNewUserModal").hide();
                            stdTable.ajax.reload(false);
                            swal({
                                title: "Success",
                                text: "Student Added Successfully",
                                icon: "success",
                                button:true
                            });
                            $("#addNewStudentForm")[0].reset();
                            $("#addNewStudentForm").removeClass();


                        }else{
                            swal({
                                title: "Error",
                                text: "Student Already Exit",
                                icon: "warning",
                                button:true
                            });
                        }//else
                    }//success,
                });//ajax submit
            }// if


            return false;
        });// new user form
    });// add new user button
});//document .ready function



/*
*Update Voting information
 */
function updateStdInfo(id) {
    if(id){

        // fetch Data for the hophonesteler with the current selected id
        $.ajax({
            url:'../../../validation/superAdmin/students/getStd_id.php',
            type : 'post',
            data :{std_iD :id},
            dataType : 'json',
            success:function (response) {

                $("#stds_id").val(response.std_id);
                $("#editStdFirstName").val(response.firstName);
                $("#editStdLastName").val(response.lastName);
                $("#editStdOtherName").val(response.otherName);
                $("#editStdIndexNumber").val(response.index_number);
                $("#editStdPhoneNumber").val(response.phone);
                $("#std").val(response.std_class);


                // Update Data
                $("#editStdForm").unbind('submit').bind('submit',function () {
                    var form = $(this);

                    //validation

                    var editStdFirstName = $("#editStdFirstName").val();
                    var editStdLastName = $("#editStdLastName").val();
                    var editStdOtherName = $("#editStdOtherName").val();
                    var editStdIndexNumber = $("#editStdIndexNumber").val();
                    var editStdClass = $("#editStdClass").val();
                    var editStdPhoneNumber = $("#editStdPhoneNumber").val();

                    if (editStdFirstName && editStdLastName && editStdOtherName && editStdIndexNumber
                        && editStdClass && editStdPhoneNumber) {
                        //submit the form to server
                        $.ajax({
                            url :form.attr('action'),
                            type : form.attr('method'),
                            data : form.serialize(),
                            dataType : 'json',
                            success:function (response) {
                                //     $(".invalid-feedback").removeClass('has-error');
                                if(response.success === true){
                                    //close the modal after deleting
                                    $("#studentModal").modal('hide');
                                    stdTable.ajax.reload(false);
                                    swal({
                                        title: "Success",
                                        text: "Information Successfully Updated",
                                        icon: "success",
                                        button:true
                                    });

                                    $('body').removeClass('modal-open');
                                    $('.modal-backdrop').remove();



                                }else{
                                    swal({
                                        title: "Error",
                                        text: "Please Try Again in a Minute",
                                        icon: "warning",
                                        button:true
                                    });

                                }//else
                            }//success
                        });//ajax submit
                    }
                    return false;
                })
            }// success
        });// fetch selected hosteler's data
    }else{
        alert("Error: Please Refresh This Page");
    }
}// update Student information -->Function



/*
*Make Payment
 */
function makePayment(id) {
    $("#makePaymentForm").removeClass();
    $("#makePaymentForm")[0].reset();

    if(id){

        // fetch Data for the hophonesteler with the current selected id
        $.ajax({
            url:'../../../validation/superAdmin/students/getStd_id.php',
            type : 'get',
            data :{std_iD :id},
            dataType : 'json',
            success:function (response) {

                $("#std_id").val(response.std_id);


                // Update Data
                $("#makePaymentForm").unbind('submit').bind('submit',function () {
                    var form = $(this);

                    //validation

                    var std_id = $("#std_id").val();
                    var amtPaying = $("#amtPaying").val();
                    var amtInWords = $("#amtInWords").val();


                    if (std_id && amtInWords && amtPaying >0) {
                        //submit the form to server
                        $.ajax({
                            url :form.attr('action'),
                            type : form.attr('method'),
                            data : form.serialize(),
                            dataType : 'json',
                            success:function (response) {

                                if(response.success === true){

                                    //close the modal after deleting
                                 $("#makePaymentModal").modal('hide');
                                    stdTable.ajax.reload(false);
                                    swal({
                                        title: "Success",
                                        text: "Payment Successful",
                                        icon: "success",
                                        button:true
                                    });


                                }else{
                                    swal({
                                        title: "Error",
                                        text: "Please Try Again in a Minute",
                                        icon: "warning",
                                        button:true
                                    });

                                }//else
                            }//success
                        });//ajax submit
                    }
                    return false;
                })
            }// success
        });// fetch selected hosteler's data
    }else{
        alert("Error: Please Refresh This Page");
    }
}// Make Payment -->Function


/*
* Delete hostelers
 */
function deleteStudent(id) {
    if(id){
        //click on delete button
        $("#deleteStdBtn").unbind('click').bind('click',function () {
            $.ajax({
                url:'../../../validation/superAdmin/students/deleteStd.php',
                type :'post',
                data :{stds_id :id},
                dataType : 'json',
                success:function (response) {
                    if (response.success === true){

                        //close the modal after deleting
                        $("#deleteStdModal").modal('hide');

                        swal({
                            title: "Success",
                            text: "Student Deleted Successfully",
                            icon: "success",
                            button:true
                        });
                        stdTable.ajax.reload(false);
                        // refresh table after deleting



                    }else {
                        //close the modal after deleting
                        $("#deleteStdModal").modal('hide');
                        swal({
                            title: "Error",
                            text: "Error While Deleting Student",
                            icon: "warning",
                            button:true
                        });
                    }//else
                }//success
            });//ajax submit
        });//click on delete button
    }//if
}// delete user Function





function reversePayment(id) {


    if(id){

        // fetch Data for the hophonesteler with the current selected id
        $.ajax({
          url:'../../../validation/superAdmin/students/getPaymentLog_id.php',
          type :'post',
          data :{payment_id :id},
          dataType : 'json',
            success:function (response) {

                $("#amtPaid").val(response.amount_paid);
                $("#std_id").val(response.std_id);
                  $("#amt_words").val(response.amtInWord);

                // Update Data
                $("#reversePaymentForm").unbind('submit').bind('submit',function () {
                    var form = $(this);

                    //validation

                    var amtPaid = $("#amtPaid").val();
                    var std_id = $("#std_id").val();
                    var amt_words = $("#amt_words").val();


                    if (amtPaid && std_id && amt_words) {
                        //submit the form to server
                        $.ajax({
                            url :form.attr('action'),
                            type : form.attr('method'),
                            data : form.serialize(),
                            dataType : 'json',
                            success:function (response) {

                                if(response.success === true){

                                    $("#reversePayment").modal('hide');

                                    swal({
                                        title: "Success",
                                        text: "Amount Successfully Reversed",
                                        icon: "success",
                                        button:true
                                    });



                                    reverseTable.ajax.reload(false);

                                }else{
                                    swal({
                                        title: "Error",
                                        text: "Please Try Again in a Minute",
                                        icon: "warning",
                                        button:true
                                    });

                                }//else
                            }//success
                        });//ajax submit
                    }
                    return false;
                })
            }// success
        });// fetch selected hosteler's data
    }else{
        alert("Error: Please Refresh This Page");
    }
}// update user information -->Function


// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
