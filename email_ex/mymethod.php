<?php
include('phpmailer/PHPMailerAutoload.php');
//lnnymnigrpgtseni
function addInfo($data)
{
    $name=$data['name'];
    $email=$data['email'];
    $password=$data['password'];
    $contact=$data['contact'];

    $conn = mysqli_connect('localhost', 'root', '', 'emailpractice');

    $sql = "insert into info(name, email, password, contact) values('$name', '$email', '$password', '$contact')";

    $res = mysqli_query($conn, $sql);

    return $res;

}

function changePassword($email, $password)
{
   

        $conn=mysqli_connect("localhost", "root", "", "emailpractice");

        $sql="UPDATE info set password='$password' where email='$email'";

        $res=mysqli_query($conn, $sql);

       return $res;
}

function sendEmail($email, $otp)
{
    $mail = new PHPMailer() ;
    $mail->isSMTP();  //Only enable when use in local server 

    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';

    $mail->Username = 'bhagyasreesaha062@gmail.com';
    $mail->Password = 'jinmhaeqekvqqtxo';

    $mail->setFrom('bhagyasreesaha062@gmail.com', 'Email Verification');
    $mail->addAddress($email);
    $mail->addReplyTo('bhagyasreesaha062@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'OTP (One Time Password) for Registraion.';
    $mail->Body = '<h1>Your OTP(One Time Password) is : '.$otp.'</h1>';

    if($mail->send())
    {
        return "1";
    }
    else{
        return "0";
    }
}
?>