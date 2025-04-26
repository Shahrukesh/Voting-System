<?php include "header.php"; 
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['SESS_NAME']) != "") {
    header("Location: voter.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login for Voting</title>
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
        }
		input[type="submit"] {
            padding: 5px 10px;
            font-size: 14px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Times New Roman', Times, serif; /* Added Times New Roman */
        }
		input[type="submit"]:hover {
            background-color: #0056b3;
        }	
        .toggle-password {
            position: absolute;
            right: 2.5px; /* Adjust this value to move the icon left or right */
            top: 170%; /* Center vertically */
            transform: translateY(-50%); /* Fine-tune vertical alignment */
            cursor: pointer;
            color: #666;
            font-size: 13.5px; /* Adjust size if needed */
        }
        .login-container {
            max-width: 250px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center; /* Center align the content inside the container */
        }
    </style>
</head>
<body>
    <div class="container">
        <?php global $nam; echo $nam; ?>
        <?php global $error; echo $error; ?>
        <br>
        <div class="login-container">
            <legend><h3>Login for Voting</h3></legend> 
            <br>
            <center><font size="4">
                <form action="login_action.php" method="post" id="myform">
                    <!--Username:-->
                    <input type="text" name="username" placeholder="Username" value="" required> 
                    <br>
                    <br>
                    <!--Password:-->
                    <div class="password-container">
                        <input type="password" name="password" id="login-password" placeholder="Password" value="" required>
                        <span toggle="#login-password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <br>
                    <br>
                    <input type="submit" name="login" value="Login"> 
                </form>
            </font></center>
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
        var frmvalidator = new Validator("myform");
        frmvalidator.addValidation("username", "req", "Please Enter Username");
        frmvalidator.addValidation("username", "maxlen=50");
        frmvalidator.addValidation("password", "req", "Please Enter Password");
    </script>

    <?php include "footer.php"; ?>
</body>
</html>