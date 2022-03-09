<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // Collect post variables
    // $name = $_POST['name'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
          $nameErr = "Name is required";
        } else {
          $name = $_POST["name"];
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
          }
        }
    // $email = $_POST['email'];
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = $_POST["email"];
        // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            }
        }
    }
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $sql = "INSERT INTO `users`.`users` (`name`, `email`, `password`, `address`, `phone`, `dob`) VALUES ('$name', '$email', '$password', '$address', '$phone', '$dob');";
 
    // Execute the query
    if($con->query($sql) == true){
        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 2</title>
</head>
<body>
    <div class="container">
        <p>Enter your details and submit this form.</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form.</p>";
        }
    ?>
        <form action="<?php $_PHP_SELF ?>" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="email" name="email" id="email" placeholder="Enter your Email">
            <input type="password" name="password" id="password" placeholder="Enter your password">
            <input type="text" name="address" id="address" placeholder="Enter your address">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone no.">
            <input type ="date" name="dob" id="dob" placeholder="Enter date of birth">
            <button class="btn">Submit</button> 
        </form>
    </div>
</body>
</html>