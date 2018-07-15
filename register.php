<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$first_nameErr = $last_nameErr = $genderErr = $addressErr = $emailErr = $date_of_birthErr = $contactErr = $passwordErr = "";
$first_name = $last_name = $gender = $address = $email = $date_of_birth = $contact = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["first_name"])) {
    $first_nameErr = "First Name is required";
  } else {
    $name = test_input($_POST["first_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
      $first_nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["last_name"])) {
    $last_nameErr = "Last Name is required";
  } else {
    $last_name = test_input($_POST["last_name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
      $last_nameErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
 }

 if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  } else {
    $address = test_input($_POST["address"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["date_of_birth"])) {
    $date_of_birthErr = "date of birth is required";
  } else {
    $date_of_birth = test_input($_POST["date_of_birth"]);
  }


 if (empty($_POST["contact"])) {
    $contactErr = "contact is required";
  } else {
    $contact = test_input($_POST["contact"]);
  }

 if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$sql = "INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `address`, `email`, `date_of_birth`, `contact`, `password`) VALUES (NULL, '$first_name', '$last_name', '$gender', '$address', '$email', '$date_of_birth', '$contact', '$password')";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">

<h2>Registration Form</h2>
<form class="form-horizontal"  form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-group"> 
<label class="control-label col-sm-2" for="first_name">First Name:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="first_name" placeholder="Enter First name" name="first_name"<?php echo $first_name;?>">
<?php echo $first_nameErr;?>
  </div>
  </div>
  <div class="form-group"> 
<label class="control-label col-sm-2" for="last_name">Last Name:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="last_name" placeholder="Enter Last name" name="last_name"<?php echo $last_name;?>">
<?php echo $last_nameErr;?>
  </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label> <input type="checkbox" name="gender" </label><?php if (isset($gender) && $gender=="male") echo "checked";?>  
  <?php echo $genderErr;?>
          <label> <input type="checkbox" name="gender" </label><?php if (isset($gender) && $gender=="female") echo "checked";?> 
          <?php echo $genderErr;?>
        </div>
      </div>
  <div class="form-group"> 
<label class="control-label col-sm-2" for="address">Address:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="address" placeholder="Enter address" name="address"<?php echo $address;?>">
<?php echo $addressErr;?>
</div>
  </div>
  <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $email;?>">
        <?php echo $emailErr;?>
      </div>
    </div> 
    <div class="form-group"> 
<label class="control-label col-sm-2" for="address">Date of Birth:</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="address" placeholder="Enter date of birth" name="date_of_birth" value="<?php echo $date_of_birth;?>">
<?php echo $date_of_birthErr;?>
</div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?php echo $password;?>">
        <?php echo $passwordErr;?>
      </div>
      </div>
      <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="reset" class="btn btn-default">Reset</button>
      </div>
    </div>
</form>
</div>

<?php
echo "<h2>Your Input:</h2>";
echo $first_name;
echo "<br>";
echo $last_name;
echo "<br>";
echo $gender;
echo "<br>";
echo $address;
echo "<br>";
echo $email;
echo "<br>";
echo $date_of_birth;
echo "<br>";
echo $contact;
echo "<br>";
echo $password;
?>

</body>
</html>