<!DOCTYPE html>
<html>
<script type = "text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
   <body>
        <?php
            $username = $_COOKIE["username"];   //set username via cookie passed from previous page
            $admin = "kfarr2";                  //
            
            //check if user is in ARC or ARCSTAFF group
            $connection = ldap_connect('ldap.oit.pdx.edu');
            $search = ldap_search($connection, 'dc=pdx,dc=edu', '(& (| (cn=arc) (cn=arcstaff)) (memberUid='.$username.') (objectclass=posixGroup))');
            $results = ldap_get_entries($connection, $search);
            
           if((strcmp($username,$admin)==-1) || ($results['count'] > 0)) //if the username is the same as $admin or the search returns that the user is part of the arc group
            {
                $dbhost = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $conn = mysql_connect($dbhost,$dbuser,$dbpass); //connect to sql server
                if(!$conn){
                    die("Connection issue: ".mysql_error());
                }

               $query = mysql_query("SELECT * FROM TUTORIAL2.feedback",$conn); //print out feedback in the following format:   NAME : FEEDBACK
                echo    "<table>";


                setcookie("server",$conn,0,"delete.php");
                                while($row = mysql_fetch_array($query))
                                {
                                    echo "<tr>".
                                            "<td>".$row['Name']." : </td>".
                                            "<td>".$row['Feedback']."</td>".
                                            '<td><input type="button" onclick="deleteIt(' . $row['FeedbackID'] . ')" value="Delete"/></td>'
                                        ."</tr>";
                                }

                echo    "</table>";

            }else{
                echo "<p>Incorrect username: You do not have access to this page."; //user has incorrect credentials and wont be able to see the table
            }
        ?>
 
        <script>
        $(document).ready(function(){});
           function deleteIt(id) {
                $.ajax({
                    type: "POST",
                    url: "delete.php",
                    data: {"id" : id},
                });
           }
        </script>
    </body>
<html>
