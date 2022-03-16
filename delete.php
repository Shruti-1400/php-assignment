<?php
$con = mysqli_connect("localhost","root","");
$db = mysqli_select_db($con, 'users');
if(isset($_POST['delete'])){
    $id = $_POST['id'];
    $query = "DELETE FROM users WHERE id='$id' ";
    $query_run = mysqli_query($con,$query);

    if($query_run){
        echo '<script> alert("Data deleted"); </script>';
    }
    else{
        echo '<script> alert("Data not deleted"); </script>';
    }
}
?>