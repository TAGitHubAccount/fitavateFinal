<!---Author: Tram-Anh Ngo
     Date: 3/10/2023
     Course: CSC 450 Computer Science Captone
     This "followers" file in view displays a list of people who followed the profile user-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel= "styleSheet" href="styleSheet.css">
    <title>Profile Page</title>
</head>

<body>
<div class="container">
            <div id="container">
                <h1><font color=blue>Follower!</font></h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Follower ID</th>
                            <th>Follower Name</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include('model/followers.php');
                        while ($follower = $followersData->fetch_assoc())
                        {
                            ?> 
                                <tr>
                                    
                                    <td><?php echo $follower['user_id']; ?></td>
                                    <td><?php echo $follower['userDisplayName']; ?></td> 
                                    
                                </tr> 
                                <?php 
                            
                        }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>
</body>

</html>