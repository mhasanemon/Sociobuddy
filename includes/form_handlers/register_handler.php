<?php

require_once 'config/config.php';
/**
 * Created by PhpStorm.
 * User: emon
 * Date: 7/24/19
 * Time: 12:13 PM
 */
//Declaring variables to prevent error
$fname = "";//first name
$lname = ""; //last name
$em = ""; //email
$em2 = ""; //confirm email
$password = ""; //password
$password2 = ""; //confirm password
$date = ""; //sign up date
$error_array = []; //holds error message


if (isset($_POST['register_button'])){
    //Registration form values
    $fname = strip_tags($_POST['reg_fname']); //remove tags
    $fname = str_replace(' ','',$fname); //remove spaces
    $fname = ucfirst(strtolower($fname)); //Uppercase first letter
    $_SESSION['reg_fname'] = $fname ;//stores first name into session variable

    $lname = strip_tags($_POST['reg_lname']); //remove tags
    $lname = str_replace(' ','',$lname); //remove spaces
    $lname = ucfirst(strtolower($lname)); //Uppercase first letter
    $_SESSION['reg_lname'] = $lname ;//stores Last name into session variable

    $em = strip_tags($_POST['reg_email']); //remove tags
    $em = str_replace(' ','',$em); //remove spaces
    $_SESSION['reg_email'] = $em; //stores email into session variable

    $em2 = strip_tags($_POST['reg_email2']); //remove tags
    $em2 = str_replace(' ','',$em2); //remove spaces
    $_SESSION['reg_email2'] = $em2; //stores email2 into session variable

    $password = strip_tags($_POST['reg_password']); //remove tags

    $password2 = strip_tags($_POST['reg_password2']); //remove tags

    $date = date("Y-m-d"); //Current date

    if ($em == $em2){
        //Check email is valid
        if (filter_var($em,FILTER_VALIDATE_EMAIL)){
            $em = filter_var($em,FILTER_VALIDATE_EMAIL);

            //Check if email exists
            $e_check = mysqli_query($con,"SELECT email FROM users WHERE email= '$em'");

            //count no of rows returned
            $num_rows = mysqli_num_rows($e_check);

            if ($num_rows>0){
                array_push($error_array,"Email already in use<br>");
            }
        }
        else{
            array_push($error_array,"Invalid email format<br>");
        }
    }
    else{
        array_push($error_array,"Email's don't match<br>");
    }

    if (strlen($fname)>25 || strlen($fname)<2){
        array_push($error_array,"Your First name must be between 2 and 25 characters<br>");
    }

    if (strlen($lname)>25 || strlen($lname)<2){
        array_push($error_array,"Your Last name must be between 2 and 25 characters<br>");
    }

    if ($password != $password2){
        array_push($error_array,"Your password do not match<br>");
    }

    else{
        if (preg_match('/[^A-Za-z0-9]/',$password)){
            array_push($error_array,"Your password can only contain letters and numbers<br>");
        }
    }

    if (strlen($password)>30 || strlen($password)<5){
        array_push($error_array,"Your password has to be 5 to 30 characters<br>");
    }

    if (empty($error_array)){
        $password = md5($password); // Encrypt password

        //Generate username by concatening first name and last name
        $username = strtolower($fname."_".$lname);
        $check_username_query = mysqli_query($con,"SELECT username FROM users WHERE username='$username'");

        $i = 0;
        //if username exists add number to username
        while (mysqli_num_rows($check_username_query)!=0){
            $i++;
            $username = $username."_".$i;
            $check_username_query = mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
        }

        //profile picture assignment
        $rand = rand(1,2); //random number between 1 and 2
        if ($rand==1)
            $profile_pic = "Assets/images/profile_pic/defaults/head_deep_blue.png";
        else if($rand==2)
            $profile_pic = "Assets/images/profile_pic/defaults/head_emerald.png";

        $query = mysqli_query($con,"INSERT INTO users VALUES ('','$fname','$lname','$username','$em','$password','$date','$profile_pic','0','0','no',',')");

        array_push($error_array,"<span style='color: #14c800;'>You are all set!Goahead and login!</span><br>");

        //Clear Session variables
        $_SESSION['reg_fname'] = '';
        $_SESSION['reg_lname'] = '';
        $_SESSION['reg_email'] = '';
        $_SESSION['reg_email2'] = '';
    }

}
?>