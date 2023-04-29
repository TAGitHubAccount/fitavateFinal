
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
$addFollowMessage = '';

  // check if user clicked the "follow" link
  //function callFollow($user_id){
  if (isset($_GET['follow'])) {
   
    $follower_id = $_GET['follow']; // get follower ID from URL parameter

    // check if user is already following the follower
    $check_following = "SELECT * FROM follow WHERE user_id = $user_id AND following_id =$follower_id";
    $result = $conn->query($check_following);
    
    if (($result->num_rows== 0)) {
        // insert new follower into database
        $insert_follower = "INSERT INTO follow (user_id, following_id) VALUES ($user_id, $follower_id)";
        $conn->query($insert_follower);
        $addFollowMessage = 'Not followed yet';
    }else{
        $addFollowMessage = 'Already followed';
    }
  }
  //}

?>






