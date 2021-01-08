<?php
require_once 'config/config.php';
require_once 'includes/form_handlers/register_handler.php';
require_once 'includes/form_handlers/login_handler.php';

?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Assets/css/register_style.css">
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
    </script>
    <script src="Assets/js/register.js"></script>
    <title>Welcome to SocioBuddy</title>
</head>
<body>
    <?php
    if(isset($_POST['register_button'])){
        echo '
        <script>
            $(document).ready(function() {
                $("#first").hide();
                $("#second").show();
            });
        </script>
        ';
    }
    ?>

    <div class="wrapper">

        <div class="login_box">
            <div class="login_header">
                <h2>SwirlFeed!</h2>
                Log In or Sign Up Below
            </div>
            <!--Log In Section-->
            <div id="first">
                <form action="register.php" method="post">
                    <input type="email" name="log_email" placeholder="Email Address" value="<?php if (isset($_SESSION['log_email'])){echo $_SESSION['log_email'];
                    } ?>" required ><br>
                    <input type="password" name="log_password" placeholder="Password"><br>
                    <input type="submit" name="login_button" value="LOGIN"><br>

                    <?php   if (in_array("Email and Password was incorrect <br>",$error_array)) echo "Email and Password was incorrect <br>"?>
                    <a href="#" id="signup" class="signup">Need an Account? Register here</a>
                </form>
            </div>

            <!--Sign Up Section-->
            <div id="second">
                <form action="register.php" method="post">
                    <input type="text" name="reg_fname" placeholder="First Name" value="<?php if (isset($_SESSION['reg_fname'])){echo $_SESSION['reg_fname'];
                    } ?>" required>
                    <br>
                    <?php
                    if ( in_array("Your First name must be between 2 and 25 characters<br>",$error_array))
                        echo 'Your First name must be between 2 and 25 characters<br>';
                    ?>

                    <input type="text" name="reg_lname" placeholder="Last Name" value="<?php if (isset($_SESSION['reg_lname'])){echo $_SESSION['reg_lname'];
                    } ?>" required>
                    <br>
                    <?php
                    if (in_array("Your Last name must be between 2 and 25 characters<br>",$error_array))
                        echo 'Your Last name must be between 2 and 25 characters<br>';
                    ?>

                    <input type="email" name="reg_email" placeholder="Email" value=" <?php if (isset($_SESSION['reg_email'])){
                        echo $_SESSION['reg_email'];
                    } ?>" required>
                    <br>
                    <?php
                    if (in_array("Email already in use<br>",$error_array))
                        echo "Email already in use <br>";
                    else if (in_array("Invalid email format<br>",$error_array))
                        echo "Invalid email format<br>";
                    else if (in_array("Email's don't match <br>",$error_array))
                        echo "Email's don't match <br>";
                    ?>

                    <input type="email" name="reg_email2" placeholder="Confirm Email" value=" <?php if (isset($_SESSION['reg_email2'])){
                        echo $_SESSION['reg_email2'];
                    } ?>" required>
                    <br>

                    <input type="password" name="reg_password" placeholder="Password" required>
                    <br>
                    <?php
                    if (in_array("Your password do not match<br>",$error_array))
                        echo "Your password do not match<br>";
                    else if (in_array("Your password can only contain letters and numbers<br>",$error_array))
                        echo "Your password can only contain letters and numbers<br>";
                    else if (in_array("Your password has to be 5 to 30 characters<br>",$error_array))
                        echo "Your password has to be 5 to 30 characters<br>";
                    ?>

                    <input type="password" name="reg_password2" placeholder="Confirm Password" required>
                    <br>
                    <input type="submit" name="register_button" value="Register">
                    <br>
                    <?php
                    if (in_array("<span style='color: #14c800;'>You are all set!Goahead and login!</span><br>",$error_array))
                        echo "<span style='color: #14c800;'>You are all set!Goahead and login!</span><br>";
                    ?>
                    <a href="#" id="signin" class="signin">Already have an account? Sign In here</a>
                </form>
            </div>

        </div>
    </div>

</body>
</html>