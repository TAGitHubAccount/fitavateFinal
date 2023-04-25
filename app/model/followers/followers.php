<?php
session_start(); // start session (assuming using session to store user data)

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
$arrayUserName = array(100);
$arrayUserId = array(100);

// check if user clicked the "followers" link
if (isset($_GET['followers'])) {
    // select all followers from database
   
    $select_followers = "SELECT user_profile.userDisplayName FROM user_profile lEFT JOIN follow ON user_profile.user_id = follow.following_id WHERE follow.user_id = '$user_id'";
    $result = $conn->query($select_followers);

    if ($result->num_rows > 0) {
       
        // display list of followers
       
        while ($row = $result->fetch_assoc()) {
            //echo $row["userDisplayName"];
            echo $arrayUserId = $row["following_id"];
            echo "      ";
            echo $arrayUserName = $row["userDisplayName"];
            echo '<br />';
            
        }
    } else {
        echo "You have no followers.";
    }
}

// close connection
$conn->close();

echo '<br />';

?>





