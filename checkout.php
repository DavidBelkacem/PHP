<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>checkout</title>
    </head>

    <body>
        <?php 
            require "./mysqlconnexion.php";
            require "./requestfunctions.php";
        ?>

        <div class="sign-in-box">
            <h1 class= "sign-in"> Sign in </h1>
            <?php 
                $signInValidation = false;
                if (!empty($_POST)) {
                    $passwordcheck = checkEmailPassword($mysqlConnection, $_POST["sign-in-email"])[0]["password"];
                    // echo "<pre>";
                    // var_dump($passwordcheck);
                    // echo "</pre>";
                    if ($passwordcheck === $_POST["sign-in-password"]) {
                        $_SESSION["login"]["email"] = $_POST["sign-in-email"];
                        header("Location: ./cart.php");
                    }
                }
                // echo "<pre>";
                // var_dump($_POST);
                // echo "</pre>";
                // var_dump($signInValidation);
            ?>
            <form method="POST" >
                <label class="sign-in-email-label" for="sign-in-email"> Email :  </label>
                <input type="text" id="sign-in-email" name="sign-in-email"> 
                <label class="sign-in-password-label" for="sign-in-password"> Password : </label>
                <input type="text" id="sign-in-password" name="sign-in-password">
                <button class="buttonSignIn" type="submit"> Sign in </button>
            </form>
        </div>
        <div class="create-account-box">
            <h2> Not a member yet ? </h2>
            <a href="./register.php"> 
                <button class="button-register" type="submit"> Create an account </button>
            </a>
        </div>
    </body>
</html>