<!---Author: Tram-Anh Ngo
     Date: 3/10/2023
     Course: CSC 450 Computer Science Captone
     This "followers" file in model -->


<?php
include('lib/dbCreate.php');
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

$followersData = array();

    // select all followers from database except profile user
    $select_followers = "SELECT user_profile.user_id, user_profile.userDisplayName FROM user_profile lEFT JOIN follow ON user_profile.user_id = follow.following_id WHERE follow.user_id = '$user_id'";
    $followersData = $conn->query($select_followers);


// close connection
$conn->close();

echo '<br />';

?>





