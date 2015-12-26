<?php   
  // Connect to the database
  require_once('./includes/connectvars.inc.php');
  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $fname = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
    $lname = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $phonenumber = mysqli_real_escape_string($dbc, trim($_POST['phonenumber']));
    $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
        
    // Make sure the aboved fields are not empty
    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($username) && !empty($password)) {
      // Make sure someone has not already registered using this username
      $query = "SELECT * FROM login WHERE username = '$username'";
      $data = mysqli_query($dbc, $query);
      if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO login (username, password, firstName, lastName, email) VALUES ('$username', MD5('$password'), '$fname', '$lname', '$email')";
        $result = mysqli_query($dbc, $query);
        // Confirm success with the user
        echo '<p>Congratulations. Your account has been successfully created. You\'re now ready to <a href="login.php">log in</a>.</p>';
        mysqli_close($dbc);
        exit();
      } else {
        // This username has already used by other account, so display an error message
        $output_message = '<p class="error">'.'This username has already used by other account. Please choose a different user name.</p>';
        $username = "";    
      }
    } else {
      $output_message = '<p class="error">You must enter all of the sign-up fields.</p>';
    }
  }     
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="utils.js" type="text/javascript"></script> 
    <script src="validation.js" type="text/javascript"></script> 
    <title>Sign Up</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <!-- My CSS -->
    <link href="style.css" rel="stylesheet"> 
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">MySpace</a>
        </div>
   
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
            <li><a href="about.php">About</a></li>
            <li class="dropdown">
              <a href="portfolio.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Portfolio <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="portfolio.php">HTML&CSS</a></li>
                <li><a href="portfolio.php">JavaScript</a></li>
                <li><a href="portfolio.php">PHP&SQL</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="portfolio.php">Java</a></li>
                <li><a href="portfolio.php">Python</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="beijing.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Photos<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="beijing.php">Beijing</a></li>
                <li><a href="shanghai.php">Shanghai</a></li>
                <li><a href="shanghai.php">Boston</a></li>
              </ul>
            </li>
          </ul>
    
          <ul class="nav navbar-nav navbar-right">
          <?php
            if (isset($_SESSION['username'])) {
              echo'<li><a href="forum.html">Forum</a></li>';
              echo'<li><a href="logout.php">Log Out (' . $_SESSION['username'] . ')</a></li>';       
            } else { 
              echo'<li class="active"><a href="signup.php">Sign up</a></li>';
              echo'<li><a href="login.php">Log in</a></li>';      
            }
          ?>      
  
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav> 


    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="well topMargin">
              <form action="" method="post" enctype="multipart/form-data">
                <?=$output_message ?>
                <span class="form-header">Welcome to create an Account</span>
                <div class="form-group topMargin">
                  <label for="username">Username</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="username" id="username" value="<?php if (!empty($username)) echo $username; ?>" placeholder="Enter your username">
                    <span id="nameprompt" class="input-group-addon"></span>
                  </div>
                  <span id="namepromptdetail" class="error"></span>
                </div>
                <div class="form-group">
                  <label for="firstname">First name</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="firstname" id="firstname" value="<?php if (!empty($fname)) echo $fname; ?>" placeholder="2 to 15 characters">
                    <span id="firstnameprompt" class="input-group-addon"></span>
                  </div>
                  <span id="firstnamepromptdetail" class="error"></span>
                </div>
                <div class="form-group">
                  <label for="lastname">Last name</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="lastname" id="lastname" value="<?php if (!empty($lname)) echo $lname; ?>" placeholder="2 to 25 characters">
                    <span id="lastnameprompt" class="input-group-addon"></span>
                  </div>
                  <span id="lastnamepromptdetail" class="error"></span>
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <div class="input-group">
                    <input type="email" class="form-control" name="email" id="email" value="<?php if (!empty($email)) echo $email; ?>" placeholder="Email address: name@example.com">
                    <span id="emailprompt" class="input-group-addon"></span>
                  </div>
                  <span id="emailpromptdetail" class="error"></span>
                </div>
                <div class="form-group">
                  <label for="phonenumber">Phone number</label>
                  <div class="input-group">
                    <input type="phonenumber" class="form-control" name="phonenumber" id="phonenumber" value="<?php if (!empty($phonenumber)) echo $phonenumber; ?>" placeholder="(xxx)xxx-xxxx ">
                    <span id="phoneprompt" class="input-group-addon"></span>
                  </div>
                  <span id="phonepromptdetail" class="error"></span>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="At least 8 char, 1 upper, 1 lower, 1 num">
                    <span id="passwordprompt" class="input-group-addon"></span>
                  </div>
                  <span id="passwordpromptdetail" class="error"></span>
                </div>
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Create Account</button>
                <div class="topMargin">Already has an account ? <a href="login.php">Log In now !</a></div>
              </form>  
            </div>
          </div>
        </div> 

<?php 
require_once('./includes/footer.inc.php'); 
mysqli_close($dbc);
?>
    
