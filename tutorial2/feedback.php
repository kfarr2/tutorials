<!DOCTYPE html>
<html>
    <body>
        <?php
            
            if($_POST["name"] != ""){
                if($_POST["email"] != ""){
                    if($_POST["feedback"] != ""){

                        $dbhost = 'localhost';                     //server credentials
                        $dbuser = 'root';                               //
                        $dbpass = '';                            //

                        $conn = mysql_connect($dbhost,$dbuser,$dbpass); //connect to server
                        if(!$conn){
                            die("Could not connect: ".mysql_error());
                        }
                        echo "<p>Connected successfully</p>";

                        $sql = "CREATE DATABASE IF NOT EXISTS TUTORIAL2";             //create database
                        $retval = mysql_query($sql,$conn);
                        if(!$retval){
                            die("Could not create database: ".mysql_error());
                        }
                        echo "<p>Database TUTORIAL2 created successfully</p>";

                        $sql_table = "CREATE TABLE IF NOT EXISTS TUTORIAL2.feedback(Name TEXT, Email TEXT, Feedback TEXT)";    //create table
                        if(!mysql_query($sql_table)){
                            die("Could not create table: ".mysql_error());
                        }
                        echo "<p>Table feedback created successfully</p>";

                        $name = mysql_real_escape_string($_POST["name"]);
                        $email = mysql_real_escape_string($_POST["email"]);
                        $feedback = mysql_real_escape_string($_POST["feedback"]);

                      
                        $insert = "INSERT INTO TUTORIAL2.feedback VALUES ('$name', '$email', '$feedback','')";  //insert data into table
                        if(!mysql_query($insert)){
                            die("Could not insert data into table: ".mysql_error());
                        }
                        echo "<p>Data successfully inserted</p>";

                        mysql_close($conn);

                        header("Location: /tutorial2/thanks.php",true,301);
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
