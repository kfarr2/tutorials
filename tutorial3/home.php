<!DOCTYPE html>
<html>
    <body>
        <?php
            $link = "https://sso.pdx.edu/cas/login?service=";  
            $service = "http://10.0.0.10/tutorial3/login.php";
            $encoded = urlencode($service);
            echo '<form id="login" action="'.$link.$encoded.'" method="post"><input type="submit" name="LOGIN" value="Login"></form>';
        ?>
           </body>
</html>
