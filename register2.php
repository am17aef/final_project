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
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">

<h2>Registration Form</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  First Name: <input type="text" name="First_name" value="<?php echo $first_name;?>">
  <span class="error">* <?php echo $first_nameErr;?></span>
  <br><br>
  Last Name: <input type="text" name="Last_name" value="<?php echo $last_name;?>">
  <span class="error">* <?php echo $last_nameErr;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Address: <input type="text" name="address" value="<?php echo $address;?>">
  <span class="error">* <?php echo $addressErr;?></span>
  <br><br> 
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Date of Birth: <input type="text" name="First_name" value="<?php echo $first_name;?>">
  <span class="error">* <?php echo $date_of_birthErr;?></span>
  <br><br>
  Password: <input type="text" name="First_name" value="<?php echo $first_name;?>">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
  <input type="reset" value="Reset"> 
</form>

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