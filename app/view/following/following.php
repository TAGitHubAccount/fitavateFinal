<!---Author: Tram-Anh Ngo
     Date: 3/10/2023
     Course: CSC 450 Computer Science Captone
     This "following" file in view displays a list of the people in the database and let the profile user click on the link to follow others-->
<?php 

include('../../model/following/following.php');

// define database connection variables
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "fitavate";

 // create connection
 $conn = new mysqli($servername, $username, $password, $dbname);

 // check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
 $user_id  = $_SESSION['user_id'];// here is get the profile user.
 //Query print out the list of the people except profile user.
 $query ="select user_profile.userDisplayName, user_profile.email, user_profile.user_id  from user_profile where user_profile.user_id != {$user_id} ";
 $result = $conn->query($query);

?>
<!--html code to display a list of people in the database excep the profile user-->
<!DOCTYPE html> 
<html> 
        <head> 
		       <title> List of Pepole To follow </title> 
        </head>
<body> 
	<table  align="center"  border="1px" style="width:600px; line-height:40px;"> 
	    <tr> 
		    <th colspan="4"><h2>List of Name</h2></th> 
        </tr> 
        <tr> 
            <th> Following Link </th>
            <th> ID </th>   
		    <th> Name </th> 
			<th> Email </th> 
        </tr>
		
		<?php while($row = $result->fetch_assoc()) 
		{ 
		?> 
        <tr>
            <td>
                <!---below is the line of code profile user click on the "Follow" link to folow people on the list-->
                <a href="?page=following/following&follow=<?php echo $row['user_id']; ?>">Follow</a>
            </td>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['userDisplayName']; ?></td> 
            <td><?php echo $row['email']; ?></td> 
		</tr> 
	    <?php 
        } 
        ?> 

	</table>
    
    <?php
    //the "if" statement displays the message to let profile user know if they already followed the people in the list yet.
    if ($addFollowMessage) {
        echo "<p><font color=blue>$addFollowMessage</font></p>";
    }
    ?>
</body> 
</html>