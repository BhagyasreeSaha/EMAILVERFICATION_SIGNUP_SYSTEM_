<?php
    include('mymethod.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <table>
        <tr>
            <td>Name: </td>
            <td><input type="text" name="name" ></td>
        </tr>

        <tr>
            <td>Email: </td>
            <td><input type="email" name="email" ></td>
        </tr>
        <tr>
            <td>passwoord: </td>
            <td><input type="text" name="password" ></td>
        </tr>

        <tr>
            <td>Contact No: </td>
            <td><input type="number" name="contact" ></td>
        </tr>
        <tr>
            <td><input type="submit" value="Submit" name="submit"></td>
            <td> <input type="reset" value="Reset"></td>
        </tr>
        <tr>
            <td>Forgot Password <a href="password_recovery.php">click here</a></td>
        </tr>
    </table>
</form>

<?php
if(isset($_POST['submit']))
{
    session_start();
    $email=$_POST['email'];
    $otp=random_int(100000, 999999);

    //store data in session
    $_SESSION['data'] = $_POST;
    $_SESSION['otp'] = $otp;
    $_SESSION['chance'] = 3;

    $res=sendEmail($email,$otp);
   
    if($res == "1")
    {
        header('location: otp.php');
    }
    else{
        echo "Sorry OTP not sent, Try another time....!!!";
    }
}
?>

</body>
</html>