<?php 

include('../../model/following/following.php');

//include('dbCreate.php'); 
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
 $user_id  = $_SESSION['user_id'];
 $query ="select user_profile.userDisplayName, user_profile.email, user_profile.user_id  from user_profile where user_profile.user_id != {$user_id} ";
 $result = $conn->query($query);

?>

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
    if ($addFollowMessage) {
        echo "<p>$addFollowMessage</p>";
    }
    ?>
</body> 
</html>