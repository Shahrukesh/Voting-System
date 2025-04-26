<script src='https://www.google.com/recaptcha/api.js'></script>
<?php include "header.php";
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['SESS_NAME'])!="") {
    header("Location: voter.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
		.g-recaptcha {
    		transform: scale(0.85); /* Adjust the scale factor as needed */
    		transform-origin: 0 0;
    		margin-bottom: 20px; /* Adjust this value to increase or decrease the gap */
		}
		/* Optional: Adjust the margin above the "Next" button if needed */
		input[type="submit"] {
    		margin-top: -50px; /* Adjust this value to increase or decrease the gap */
			
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
		.container {
			padding-right: 50px;
    		position: relative; /* or absolute, fixed */
    		top: 10px; /* Move down by 20px */
    		left: 30px; /* Move right by 30px */
			height:500px;
		}
        .password-container {
            position: relative;
            display: inline-block;
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
        .register-container {
            max-width: 250px;
            margin: auto;
            padding: 20px;
			height: 390px;
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
        <div class="register-container">
            <legend><h3>Register</h3></legend>
            <br>
            <font size="4">
                <form action="reg_action.php" method="post" id="myform">
                    <!--Firstname:-->
                    <input type="text" name="firstname" placeholder="Firstname" value="" required />
                    <br>
                    <br>
                    <!--Lastname:-->
                    <input type="text" name="lastname" placeholder="Lastname" value="" required />
                    <br>
                    <br>
                    <!--Username:-->
                    <input type="text" name="username" placeholder="Username" value="" required />
                    <br>
                    <br>
                    <!--Password:-->
                    <div class="password-container">
                        <input type="password" name="password" id="register-password" placeholder="Password" value="" required />
                        <span toggle="#register-password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <br>
                    <br>
                    <!--Confirm Password:-->
                    <div class="password-container">
                        <input type="password" name="confirm_password" id="confirm-password" placeholder="Confirm Password" value="" required />
                        <span toggle="#confirm-password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <br>
                    <br>
                    <!-- Google reCAPTCHA -->
                    <div class="g-recaptcha" data-sitekey="6LeD3hEUAAAAAKne6ua3iVmspK3AdilgB6dcjST0"></div>
                    <br>
                    <br>
                    <input type="submit" name="submit" value="Next" />
                </form>
            </font>
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
        frmvalidator.addValidation("firstname","req","Please enter student firstname");
        frmvalidator.addValidation("firstname","maxlen=50");
        frmvalidator.addValidation("lastname","req","Please enter student lastname");
        frmvalidator.addValidation("lastname","maxlen=50");
        frmvalidator.addValidation("username","req","Please enter student username");
        frmvalidator.addValidation("username","maxlen=50");
        frmvalidator.addValidation("password","req","Please enter student password");
        frmvalidator.addValidation("password","minlen=6","Password must not be less than 6 characters.");
        frmvalidator.addValidation("confirm_password","req","Please confirm your password");
        frmvalidator.addValidation("confirm_password","eqelmnt=password","Passwords do not match.");
    </script>

    <?php include "footer.php"; ?>
</body>
</html>