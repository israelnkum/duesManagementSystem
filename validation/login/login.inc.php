<?php
session_start();
require_once ('../db_Connection.php');
if (isset($_POST['btn_login'])){
    //Retrieve the field values from our registration form.

    $userName = !empty($_POST['userName']) ? trim($_POST['userName']) : null;
    $userPassword = !empty($_POST['usrPassword']) ? trim($_POST['usrPassword']) : null;

    //Construct the SQL statement and prepare it.

    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $connection->prepare($sql);
    //Bind value.
    $stmt->bindValue(':username', $userName);
    //Execute.
    $stmt->execute();
    //Fetch row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //If $row is FALSE.
    if($row === false){
        //Could not find a user with that username!

        header("Location: ../../index.php?err=".urlencode("Oops! Username does Not Match any Record!"));
    } else{
        //Compare the passwords.
        $validPassword = password_verify($userPassword, $row['user_password']);

        //If $validPassword is TRUE, the login has been successful.
        if($validPassword){
            if ($row['updated'] == '0'){
                //Provide the user with a login session.
                $_SESSION['u_id'] = $row['user_id'];
                $_SESSION['u_name'] = $row['username'];
                $_SESSION['user_type'] =$row['user_type'];
                $_SESSION['u_mail'] = $row['email'];
                $_SESSION['logged_in_time'] = date('h:i a');
                $_SESSION['loggedin'] = true;


                header('Location: ../../pages/firstLogin/update_password.php?password_update');
                exit;

            }else{

                if ($row['user_type'] == 'Super Admin'){
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_name'] = $row['username'];
                    $_SESSION['user_type'] =$row['user_type'];
                    $_SESSION['u_mail'] = $row['email'];
                    $_SESSION['logged_in_time'] = date('h:i a');
                    $_SESSION['loggedin'] = true;

                    header("Location: ../../pages/superAdmin/dashboard/dashboard.superAdmin.php?loginSuccess=".urlencode("Welcome"));
                    exit();
                }else{
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_name'] = $row['username'];
                    $_SESSION['user_type'] =$row['user_type'];
                    $_SESSION['u_mail'] = $row['email'];
                    $_SESSION['logged_in_time'] = date('h:i:s a');
                    $_SESSION['loggedin'] = true;

                    header("Location: ../../pages/superAdmin/dashboard/dashboard.superAdmin.php?loginSuccess=".urlencode("login_success"));
                    exit();
                }
                //Provide the user with a login session.
            }

        } else{
            //$validPassword was FALSE. Passwords do not match.
            header("Location: ../../index.php?err=".urlencode("Incorrect Username or Password Combination!"));
            exit();
        }
    }

}
