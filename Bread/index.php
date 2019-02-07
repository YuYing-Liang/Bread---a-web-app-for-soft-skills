<?php
session_start();
if (!is_dir("./uploads"))
{
    mkdir('./uploads', 0777, true);
}

require 'header.php';
head("Home");
?>

    <div id="bg">
      <div id="main">
        <a class="userType" href="./login.php">Login</a>
        <a class="userType" href="./register.php">Sign Up</a>
      </div>
    </div>

    <?php

        if (isset($_POST["submitsearch"]) && isset($_POST["search"]))
        {
            $search = $_POST["search"];

            if ($search == "login")
            {
                echo "<script type='text/javascript'> location.href='./login.php'; </script>";
            }
            else if ($search == "register")
            {
                echo "<script type='text/javascript'> location.href='./register.php'; </script>";
            }
            else if ( strpos($search, 'anonymous') !== false || strpos($search, 'anon') !== false)
            {
                echo "<script type='text/javascript'> location.href='./anonSetup.php'; </script>";
            }
            else if ( strpos($search, 'help desk') !== false)
            {
                echo "<script type='text/javascript'> location.href='./login.php'; </script>";
            }
            else if (  strpos($search, 'main') !== false)
            {
                echo "<script type='text/javascript'> location.href='./index.php'; </script>";
            }
            else
            {
                echo "Sorry, not sure what you are searching. Please message Group B if you think it should be searchable.";
            }
        }

    ?>


</body>
</html>
