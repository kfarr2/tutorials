<!DOCTYPE html>
<html>
    <body>
        <?php
            
            if($_POST["name"] != ""){
                if($_POST["email"] != ""){
                    if($_POST["feedback"] != ""){
                        $_POST["email"] = "Reply-To: ".$_POST["email"];
                        mail("kfarr2@pdx.edu",$_POST["name"],$_POST["feedback"],$_POST["email"]);      //email to kfarr2@pdx.edu
                        header("Location: /thanks.php",true,301);
                        exit();        
                    }else{
                        echo "<p>Could not send email: You didn't include any feedback</p>";
                        echo "<p>Please try again</p>";
                    } 
               }else{
                    echo "<p>Could not send email: Missing email address</p>";
                    echo "<p>Please try again</p>";
               }                
            }else{
                echo "<p>Could not send email: Missing name</p>";
                echo "<p>Please try again</p>";
            }
        ?>                                                              
    </body>
</html>
