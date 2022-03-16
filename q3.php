<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 3 </title>
</head>
<body>
    <div class = "row">
        <a href = "INSERT.php" style = "margin-left:80%;" > INSERT </a>
    </div>
    <br>
    <?php
    $con = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($con, 'users');
    $query = "SELECT * FROM users";
    $query_run = mysqli_query($con,$query);
    ?>
    <table style = "background-color : grey;">
        <thead>
            <tr>
                <th> S.No. </th>
                <th> Name </th>
                <th> Email </th>
                <th> Password </th>
                <th> Address </th>
                <th> Phone </th>
                <th> DOB </th>
            </tr>
        </thead>

<?php
    if($query_run){
        while($row = mysqli_fetch_array($query_run)){
            ?>
            <tbody>
                <tr>
                    <th> <?php echo $row['S.No.'];?> </th>
                    <th> <?php echo $row['Name'];?> </th>
                    <th> <?php echo $row['Email'];?> </th>
                    <th> <?php echo $row['Password'];?> </th>
                    <th> <?php echo $row['Address'];?> </th>
                    <th> <?php echo $row['Phone'];?> </th>
                    <th> <?php echo $row['DOB'];?> </th>
                    
                    <form action="delete.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['S.No.']?>">
                        <th> <input type="submit" name="delete"> </th>
                    </form>
                </tr>
            </tbody>
        <?php
        }
    }
    else{
        echo "No record found";
    }
?>
    </table>  
</body>
</html>