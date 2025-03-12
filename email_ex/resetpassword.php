<?php
include('mymethod.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reset password</title>
</head>
<body>

    <form action="" method="post">
        <table>
            <tr>
                <td><input type="text" name="newpassword" id="" placeholder="Enter your new password"></td>
            </tr>
            <tr>
            <td><input type="text" name="confirmpassword" id="" placeholder="Enter confirm password"></td>
            </tr>
            <tr>
                <td><input type="submit" value="change" name="change"></td>
            </tr>
        </table>
    </form>
    <?php
            if(isset($_POST['change']))
            {
                session_start();

                //store data in session
                $email = $_SESSION['email'];
                $newpassword = $_POST['newpassword'];
                $confirmpassword = $_POST['confirmpassword'];
                if($newpassword == $confirmpassword)
                {
                    $res=changePassword($email, $newpassword);

                    if($res == 1)
                    {
                        echo "Password recovered";
                    }
                    else{
                        echo "Not recovered";
                    }
                } 
                else
                {
                    echo "Both password Not matched";
                }

                
            }
    ?>
</body>
</html>