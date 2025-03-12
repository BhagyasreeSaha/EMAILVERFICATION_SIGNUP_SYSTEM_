<?php
    include('mymethod.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>password recovery</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>Enter Email</td>
                <td><input type="email" name="email" id=""></td>
            </tr>
            <tr>
                <td><input type="submit" value="send otp" name="password_recovery"></td>
            </tr>
        </table>
    </form>
<?php
if(isset($_POST['password_recovery']))
{
    session_start();
    $email=$_POST['email'];
    $otp=random_int(100000, 999999);

    //store data in session
    $_SESSION['email'] = $email;
    $_SESSION['otp'] = $otp;
    $_SESSION['chance'] = 3;

    $res=sendEmail($email,$otp);
   
    if($res == "1")
    {
        header('location: otp_recovery.php');
    }
    else{
        echo "Sorry OTP not sent, Try another time....!!!";
    }
}
?>
</body>
</html>