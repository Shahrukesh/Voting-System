<?php
if (!isset($_SESSION)) {
    session_start();
}
include "auth.php";
include "header_voter.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Voting Page</title>
    <style>
        body {
            background-image: url('Images/India.jpg');
            background-size: cover; /* Adjusts image to cover entire background */
            background-position: center; /* Centers the image */
            background-repeat: no-repeat; /* Prevents image from repeating */
            min-height: 100vh; /* Ensures body takes full viewport height */
        }
        body {
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            
            display: inline-block;
            text-align: left;
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 70px;
            font-family: 'Times New Roman', Times, serif;
        }
        h2 {
            margin: 0 0 5px 0; /* Adjusted margin for h2 */
            text-align: center; /* Center-align the text */
        }
        h3 {
            margin: 10px 0 10px 0; /* Adjusted margin for h3 */
            text-align: center; /* Center-align the text */
        }
        form {
            margin-top: 20px; /* Added margin to the form */
        }
        input[type="radio"] {
            margin: 10px 0;
        }
        input[type="submit"] {
            margin-top: 20px;
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
        font {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome <?php echo $_SESSION['SESS_NAME']; ?> ⚖️</h2>
        <h3>Make a Vote ! 🗳</h3>
        <form action="submit_vote.php" name="vote" method="post" id="myform">
            <font size='6'>What is your favorite political party?</font><br><br>
            <input type="radio" name="lan" value="BJP">  BJP<br>
            <input type="radio" name="lan" value="CONGRESS">  CONGRESS<br>
            <input type="radio" name="lan" value="TVK">  TVK<br>
            <input type="radio" name="lan" value="NOTA">  NOTA<br>
            <input type="radio" name="lan" value="APP">  AAP<br>
            <br>
            <?php
            global $msg, $error;
            echo $msg;
            echo $error;
            ?>
            <br>
            <center>
                <input type="submit" value="Submit Vote" name="submit" style="height:30px; width:100px;">
            </center>
        </form>
    </div>
</body>
</html>