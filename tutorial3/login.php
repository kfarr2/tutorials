<!DOCTYPE html>
<html>
    <body>
        <?php
            $actual = $_SERVER[REQUEST_URI];
            $ticket_start = strpos($actual,'=')+1;
            $length = strlen($actual) - $ticket_start;
            $ticket = substr($actual,$ticket_start,$length);
            $link = "https://sso.pdx.edu/cas/proxyValidate?ticket=".$ticket."&service=http://10.0.0.10/tutorial3/login.php";
            if($cas_username = file_get_contents($link)){
                $_SESSION['username'] = $cas_username;
            }
            //@include($_SESSION['username']);
            setcookie("username",$_SESSION['username'],0,"admin.php");
            header("Location: admin.php",true,301);
            exit();
        ?>
    </body>
</html>

