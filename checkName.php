<?php
// Connect to the database
 define('DB_HOST', 'localhost');
 define('DB_USER', 'wyy');
 define('DB_PASSWORD', '123456Wd');
 define('DB_NAME', 'database2');
// Connect to the database
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$username = $_REQUEST['username'];
// Make sure someone has not already registered using this username
$query = "SELECT * FROM login WHERE username = '$username'";
$data = mysqli_query($dbc, $query);
if (mysqli_num_rows($data) == 0) {
    // The username is unique
     echo 'okay';           
} else {
// This username has already used by other account, so display an error message
    echo 'denied';
//$output_message = '<p class="error">'.'This username has already used by other account. Please choose a different user name.</p>';
//$username = "";    
}
mysqli_close($dbc);
?>
