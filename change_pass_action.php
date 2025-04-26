<?php
if(!isset($_SESSION)) { 
    session_start();
}
include "auth.php";
include "header_voter.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-image: url('Images/India.jpg');
            background-size: cover; /* Adjusts image to cover entire background */
            background-position: center; /* Centers the image */
            background-repeat: no-repeat; /* Prevents image from repeating */
            min-height: 100vh; /* Ensures body takes full viewport height */
        }
        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -25px;
            position: relative;
            z-index: 2;
            cursor: pointer;
        }
        .container {
            padding-top: 50px;
            margin: auto;
        }
        .password-container {
            position: relative;
            display: inline-block;
            margin-top: 10px; /* Added to move password fields downward */
        }
        input[type="submit"] {
            padding: 5px 10px;
            font-size: 14px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Times New Roman', Times, serif;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .toggle-password {
            position: absolute;
            right: 2.5px;
            top: 200%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
            font-size: 13.5px;
        }
        .login-container {
            max-width: 250px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h3>Change Password</h3>
            <h4 style="color:#e60808;"><?php global $nam; echo $nam;?> </h4> 
            <?php global $error; echo $error;?>                  
            <button onclick="toggleChangePasswordForm()">Change Password</button>
            <form action="change_pass_action.php" method="post" id="change-password-form" class="hidden">
                Current Password:
                <div class="password-container">
                    <input type="password" name="cpassword" id="cpassword" value="" >
                    <span toggle="#cpassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <br>
                <br>
                New Password:
                <div class="password-container">
                    <input type="password" name="npassword" id="npassword" value="" >
                    <span toggle="#npassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <br>
                <br>
                Confirm New Password:
                <div class="password-container">
                    <input type="password" name="cnpassword" id="cnpassword" value="" >
                    <span toggle="#cnpassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <br>
                <br>
                <input type="submit" name="cpass" value="UPDATE" >
            </form>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // jQuery to toggle password visibility and icon
        $(document).ready(function() {
            $(".toggle-password").click(function() {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        });
    </script>

    <script type="text/javascript">
        var frmvalidator = new Validator("change-password-form"); 
        frmvalidator.addValidation("cpassword","req","Please enter Current Password"); 
        frmvalidator.addValidation("cpassword","maxlen=50");
        frmvalidator.addValidation("npassword","req","Please enter New Password"); 
        frmvalidator.addValidation("npassword","maxlen=50");
        frmvalidator.addValidation("cnpassword","req","Please enter Confirm New Password"); 
        frmvalidator.addValidation("cnpassword","maxlen=50");

        function toggleChangePasswordForm() {
            var form = document.getElementById("change-password-form");
            form.classList.toggle("hidden");
        }
    </script>

    <?php include "footer.php";?>
</body>
</html>