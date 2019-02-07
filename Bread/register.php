<?php
session_start();
require 'header.php';
head("Registration");
?>

    <div class="ls-main">
      <div class="ls-container">
        <h3>Register</h3>
        <p> Already have an Account? <a class="userType" href="./login.php">Login!</a> </p>

        <form action="" method="POST">
          <div class="loginPage">
            <label for="username">First Name</label>
            <input class="usrNpas" type="text" name="firstname" id="firstname"/>

            <label for="password">Last Name</label>
            <input class="usrNpas" type="text" name="lastname" id="lastname" >

            <label for="username">Username</label>
            <input class="usrNpas" type="text" name="username" id="username"/>

            <label for="password">Password</label>
            <input class="usrNpas" type="password" name="password" id="password" >

            <label for="password">Gender</label>
            <input type="text" name="gender" id="gender">

            <label for="password">Birthday</label>
            <input type="text" name="birthday" id="birthday">

            <label for="password">Location (Address of Work or School)</label>
            <input type="text" name="location" id="location">

            <label for="password">Please enter a social media account (preferrably Linkedin)</label>
            <input type="text" name="social_m" id="social_m">

            <label for="password">Select which skill you want to grow from:</label>
            <select name="growth_option">
              <option value="networking">Networking/Speaking</option>
              <option value="writing">Writing</option>
              <option value="teamwork">Teamwork</option>
            </select>
            <input id="button" class="registerSubmit" type="submit" name="registerSubmit" value="Sign Up" onclick="return loginCheck();">
          </div>
        </form>
      </div>
    </div>

    	<?php

            // When the user hits register.
            if (isset($_POST["registerSubmit"]))
            {
                // Grab credentials.
                $inputUser = $_POST["username"];
                $inputPass = $_POST["password"];
                $inputFirst = $_POST["firstname"];
                $inputLast = $_POST["lastname"];
                $inputGender = $_POST["gender"];
                $inputBirth = $_POST["birthday"];
                $inputLoc = $_POST["location"];
                $inputSoc = $_POST["social_m"];
                $inputGrowth = $_POST["growth_option"];
                require_once("connect-db.php");
                $sanitizedUser = strip_tags($inputUser);
                if ($sanitizedUser != $inputUser)
                {
                    echo "<p>Your username had to be sanitized. Your registered username is $sanitizedUser</p>";
                }

                // Ensures username not taken.
                $sql = "SELECT `username` FROM `users` WHERE `username`='$sanitizedUser' UNION SELECT `username` FROM `anonymoususers` WHERE `username`='$sanitizedUser'";

                if ($result = mysqli_query($dbLocalhost, $sql))
                {
                    $arrResult = mysqli_fetch_array($result);
                    if (sizeof($arrResult) > 0)
                    {
                        echo "<script>window.alert('There is already a user with this username')</script>";
                    }
                    else
                    {

                        // Adds credentials to database, thus registering user.
                        $sql = "INSERT INTO `users` VALUES ('$sanitizedUser', '$inputPass')";
                        $sql2 = "INSERT INTO `account_info` VALUES ('$inputFirst', '$inputLast', '$inputGender', '$inputBirth', '$inputLoc', '$inputSoc', '$inputGrowth')";

                        $result = mysqli_query($dbLocalhost, $sql2);

                        if ($result = mysqli_query($dbLocalhost, $sql))
                        {
                            echo "<script>window.alert('You have been registered into the system!')</script>";

                        }
                        else
                        {
                            echo "<script>window.alert('You were not registered')</script>";
                            echo mysqli_error($dbLocalhost);
                        }
                    }
                }
                else
                {
                    echo mysqli_error($dbLocalhost);
                }

            }

        ?>
</body>
</html>
