<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSERTION</title>
</head>
<body>
    <form action = "" method = "post">
        <input type="text" name="name" id="name" placeholder="Enter your name" required >
        <input type="email" name="email" id="email" placeholder="Enter your Email" required>
        <input type="password" name="password" id="password" placeholder="Enter your password" required>
        <input type="text" name="address" id="address" placeholder="Enter your address">
        <input type="number" name="phone" id="phone" placeholder="Enter your phone no." required>
        <input type ="date" name="dob" id="dob" placeholder="Enter date of birth" required>
        <button type = "submit" name = "insert" > INSERT </button> 
        <a href = "q3.php" > CANCEL </a>  
    </form>
    
</body>
</html>

<?php
    $con = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($con, 'users');
    
    if(isset($_POST['insert'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $dob = $_POST['dob']; 
        $query = "INSERT INTO `users`.`users` (`name`, `email`, `password`, `address`, `phone`, `dob`) VALUES ('$name', '$email', '$password', '$address', '$phone', '$dob')"; 
        $query_run = mysqli_query($con,$query);

        if($query_run){
            echo '<script> alert("Data saved"); </script>';
        }
        else{
            echo '<script> alert("Data not saved"); </script>';
        }
    } 
    ?>