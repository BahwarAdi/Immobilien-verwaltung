<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=reamisDB','root','');
if($pdo->errorCode()){
    die($pdo->errorCode() .'_'. $pdo->errorInfo());
}

if(isset($_GET['log'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $statement = $pdo->prepare("SELECT * FROM User WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();

    if($user !== false && $password == $user['passwort']){
        $_SESSION['name'] = $user['name'];
        header('location:auswahl.php');
    }
    else{
        $errorMessage = " E-Mail oder Passwort war ungültig !!";
    }

}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang='de'>


<head>
    <title>reamis Login</title>
    <link href="StyleSheet.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
</head>
<body
<div class="cont">
    <h1>REAMIS</h1>
    <div class="fc">
        <form action="?log=1" method="POST">

            <fieldset>

                <h2>LOGIN</h2>
                <div class='bls'>

                    <label for='id'>E-Mail</label>
                    <input type="email" name="email" id='email'></input>

                    <label for='password'>Passwort</label>

                    <input type="password" name="password" id="password"></input>

                </div>
                <button type="submit" name="login" value="Login">Login</button>
                <button type="reset" name="Reset" value="Zurücksetzen">Zurücksetzen</button>
                <p><?php if(isset($errorMessage)) {echo ("$errorMessage");} ?></p>
            </fieldset>
        </form>
    </div>

</div>

</body>
<footer>
    <p>Copyright reamis ag</p>
</footer>
</html>
