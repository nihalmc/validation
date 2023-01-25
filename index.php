<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{color: red;}
    </style>
</head>
<body>
    <?php
    $usernameErr = $emailErr =$passwordErr = "";
    $username =$email =$password ="";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["username"])) {
            $usernameErr = "Name is required";
        } else {
            $username = test_input($_POST["username"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
                $usernameErr= "only letters and white spaces allowed";
            }
        }
        if(empty($_POST["email"])) {
            $emailErr = "Email is required";
        }else{
            $email=test_input($_POST["email"]);
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                $emailErr = "The email address is incorrect";
            }
    
        }
        if(empty($_POST['password']))
                    {
                        $passwordErr='Enter Your Password!';
                    }
                    else
                    {
                        $password = test_input($_POST['password']);
                        if(!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,16}$/',$password))
                        {
                            $passwordErr='Invalid Format! Re-Enter Password!';
                        }
                    }   
    }
    function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
    ?>
<h2>PHP Form Validation Example</h2>
<p><span class="error">* required Filed</span></p>
    <form action="<?php echo 
   htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        Enter username:
        <input  type="text" name="username" >
        <span class="error">* <?php echo $usernameErr;?></span>
        <br><br>
      Enter Email:
        <input type="email" name="email"><br>
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
        Enter password:
        <input type="password" name="password" >
        <span class="error">* <?php echo $passwordErr;?></span><br>
        <input type="submit" value="submit" name="submit">
    </form>
<?php

echo "<h2>Your Input:</h2>";
echo $username;
echo "<br>";
echo $email;
?>
</body>
</html>