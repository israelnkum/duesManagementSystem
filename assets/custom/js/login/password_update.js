
$(document).ready(function() {

    $("#btn_FirstUpdate").on('click',function () {


        // remove error
        $(".form-group").removeClass('has-error').removeClass('has-success');
        $('.text-danger').remove();

        $("#updatePassowrdForm").unbind('submit').bind('submit',function () {
            $('.text-danger').remove();
            var form = $(this);
            //validation
            var new_password = $("#new_password").val();
            var confirm_password = $("#confirm_password").val();



            if (new_password.length < 8){
                $("#new_password").closest('.form-group').addClass('has-error');
                $("#new_password").after('<p class="text-danger">Password at least 8</p>');
            }else{
                $("#new_password").closest('.form-group').removeClass('has-error');
                $("#new_password").closest('.form-group').addClass('has-success');


                if (new_password && confirm_password){
                    //submit the form to server

                    $.ajax({
                        url :form.attr('action'),
                        type : form.attr('method'),
                        data : form.serialize(),
                        dataType : 'json',
                        success:function (response) {
                            //     $(".invalid-feedback").removeClass('has-error');
                            if(response.success === true){
                                window.location.assign("http://localhost/projectAhonFinal/pages/dashboard.php");

                                $(".form-group").removeClass('has-error').removeClass('has-success');


                            }else{
                                window.location.assign("http://localhost/projectAhonFinal/pages/users/dashboard.users.php");
                                $.notify({
                                    message: "Password Changed Successfully"
                                },{
                                    type: 'danger',
                                    timer: 10
                                });
                            }//else
                        }//success
                    });//ajax submit
                }// if
            }


            return false;
        });// new user form
    });// add new user button
});//document .ready function


// Checking the password Strength
var pass = document.getElementById("new_password");
pass.addEventListener('keyup',function () {
    checkPassword(pass.value);
});
function checkPassword(new_password){
    var strengthBar = document.getElementById("strength");
    var strength =0;

    if (new_password.length >= 8) {
        strength +=2;
    }
    if (new_password.match(/[A-Z]+/)) {
        strength +=1;
    }
    if (new_password.match(/[a-z0-9]+/)) {
        strength +=1;
    }
    if (new_password.match(/[!@#$%^&*()_+~<>?]+/)) {
        strength +=1;
    }

    switch(strength){
        case 0:
            strengthBar.value=0;
            break;
        case 2:
            strengthBar.value=50;
            break;
        case 3:
            strengthBar.value=70;
            break;
        case 4:
            strengthBar.value=80;
            strengthBar.backgroundColor('red');
            break;
        case 5:
            strengthBar.value=100;
            break;

    }

}
