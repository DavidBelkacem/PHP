<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
    </head>
    <body>
        <div class="register-form">
            <?php 

            require "./mysqlconnexion.php";
            require "./requestfunctions.php";

            $register_inputs= array(
                array("register-username", "Username  ", "username"), 
                array("register-first-name", "First Name ", "text"),
                array("register-last-name", "Last Name ", "text"),
                array("register-password", "Password", "text"),
            );

            if (!empty($_POST)) {
                $i = 0;
                $error = 0;
                foreach ($_POST as $input_name => $input_value) {
                    // echo $input_name . "<br>";
                    // echo $register_inputs[$i][0] . "<br>";
                    // echo "<br>";
                    if ($input_name !== $register_inputs[$i][0]) {
                        $error++;
                        $_POST[$input_name] = "";
                    } 
                    if (empty($_POST[$input_name])) {
                        $error++;
                        echo "Please enter a valid " . $register_inputs[$i][1] . "<br>";
                    }
                    $i++;
                }
                // echo $error . "<br>";
                if ($error === 0) {
                    insertNewCustomer($db, $_POST["register-first-name"], 
                    $_POST["register-last-name"], $_POST["register-username"], $_POST["register-password"]);
                    header("Location: ./checkout.php");
                }
            }
            // echo "---------------1-------------";
            // echo "<pre>";
            // var_dump($_POST);
            // echo "</pre>";
            ?>
            <form method="POST">
                <?php 
                foreach ($register_inputs as $register_input) { ?>
                    <div class="<?=$register_input[0]?>">
                        <div class="<?=$register_input[0]?>-label">
                            <label for="<?=$register_input[0]?>"> <?=$register_input[1]?> </label>
                        </div>
                        <div class="<?=$register_input[0]?>-input">
                            <input type="<?=$register_input[2]?>" id="<?=$register_input[0]?>" name="<?=$register_input[0]?>" 
                            value="<?php 
                                if (!empty($_POST[$register_input[0]])) {
                                 echo $_POST[$register_input[0]]; 
                                 } ?>" >
                        </div>
                    </div>
                <?php  } ?>
                <button class="button-register" type="submit"> Create account </button>
            </form>
        </div>
    </body>
</html>