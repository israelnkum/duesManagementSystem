
var onlineUsersTable;
var usersTable;
$(document).ready(function() {

    usersTable= $("#usersTable").DataTable({
        "ajax": "../../../validation/superAdmin/users/retrieiveAllUsers.php",
        "order":[],
        dom: 'Bfrtip',
        buttons: [
            // 'print',
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [1,2,3,4,5,6]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [1, 2,3,4,6, 5 ]
                }
            },
            'colvis'
        ],

    });

    onlineUsersTable= $("#onlineUsersTable").DataTable({
        "ajax": "../../../validation/superAdmin/users/retrieiveOnlineUsers.php",
        "order":[],
        dom: 'Bfrtip',
        buttons: [
            // 'print',
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [1,2,3,4,5]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [1,2,3,4,5]
                }
            },
            'colvis'
        ],

    });



    $("#addNewUserButton").on('click',function () {
        //reset the form
        $("#addNewUserForm")[0].reset();
        $("#addNewUserForm").removeClass();



        $("#addNewUserForm").unbind('submit').bind('submit',function () {
            var form = $(this);
            //validation
            var userName = $("#userName").val();
            var userMail = $("#userMail").val();
            var firstName = $("#firstName").val();
            var lastName = $("#lastName").val();
            var secQuestion = $("#secQuestion").val();
            var secAnswer = $("#secAnswer").val();
            var userType = $("#userType").val();
            var phoneNumber = $("#phoneNumber").val();

            if (userName && userMail && firstName && lastName && secQuestion && secAnswer && userType && phoneNumber){
                //submit the form to server

                $.ajax({
                    url :form.attr('action'),
                    type : form.attr('method'),
                    data : form.serialize(),
                    dataType : 'json',

                    success:function (response) {
                        if(response.success === true){
                           // $("#addNewUserModal").hide();


                            swal({
                                title: "Success",
                                text: "New User Added Successfully",
                                icon: "success",
                                button:true
                            });

                            $("#addNewUserForm")[0].reset();
                            $("#addNewUserForm").removeClass();
                            //window.location.assign("http://localhost/myAdmin/pages/admin/users/allUsers.php");

                            usersTable.ajax.reload(false);


                        }else{
                            swal({
                                title: "Error",
                                text: "Username or Email already Exist",
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
*Update User information
 */
function update_UserInformation(id) {

    $("#editUserForm").removeClass();
    if(id){

        // fetch Data for the hosteler with the current selected id
        $.ajax({
            url:'../../../validation/superAdmin/users/getUser_id.php',
            type : 'post',
            data :{users_id :id},
            dataType : 'json',
            success:function (response) {
                $("#u_id").val(response.user_id);
                $("#editUsername").val(response.username);
                $("#editUserMail").val(response.email);
                $("#editFirstName").val(response.firstName);
                $("#editLastName").val(response.lastName);
                $("#editUserType").val(response.user_type);
                $("#editPhoneNumber").val(response.phone);


                // Update Data
                $("#editUserForm").unbind('submit').bind('submit',function () {
                    var form = $(this);

                    //validation
                    var editUsername = $("#editUsername").val();
                    var editUserMail = $("#editUserMail").val();
                    var editFirstName = $("#editFirstName").val();
                    var editLastName = $("#editLastName").val();
                    var editUserType = $("#editUserType").val();
                    var editPhoneNumber = $("#editPhoneNumber").val();



                    if (editFirstName && editLastName && editUsername && editUserMail && editPhoneNumber && editUserType ) {
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
                                    $("#exampleModal").modal('hide');

                                    swal({
                                        title: "Success",
                                        text: "Information Update Successfully",
                                        icon: "success",
                                        button:true
                                    });


                                    /* reload the database after the submission to
                                    * update the table
                                    * this is a built in function of database
                                    */
                                    usersTable.ajax.reload(false);

                                }else{
                                    swal({
                                        title: "warning",
                                        text: "Error! Please try again",
                                        icon: "success",
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



/*
* Delete hostelers
 */
function deleteUser(id) {
    if(id){
        //click on delete button
        $("#deleteUsrBtn").unbind('click').bind('click',function () {
            $.ajax({
                url:'../../../validation/superAdmin/users/deleteUser.php',
                type :'post',
                data :{users_id :id},
                dataType : 'json',
                success:function (response) {
                    if (response.success === true){

                        //close the modal after deleting
                        $("#deleteUserModal").modal('hide');

                        swal({
                            title: "Success",
                            text: "Deleted Successfully",
                            icon: "success",
                            button:true
                        });
                        // refresh table after deleting
                        usersTable.ajax.reload(false);


                    }else {
                        //close the modal after deleting
                        $("#deleteUserModal").modal('hide');


                        swal({
                            title: "warning",
                            text: "Error! Please try again",
                            icon: "success",
                            button:true
                        });
                    }//else
                }//success
            });//ajax submit
        });//click on delete button
    }//if
}// delete user Function



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
