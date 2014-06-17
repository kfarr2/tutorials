<!DOCTYPE html>
<html>
    <body>
        <?php
               $dbhost = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $conn = mysql_connect($dbhost,$dbuser,$dbpass); //connect to sql server
                if(!$conn){
                    die("Connection issue: ".mysql_error());
                }

                mysql_query('DELETE FROM TUTORIAL2.feedback WHERE FeedbackID = '.$_POST['id'],$conn);
        ?>
    </body>
</html>
