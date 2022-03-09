<?php 
    function primeNo($num){
        $cnt = 0;
        for($i = 2; $i*$i <= $num; $i++){
            if($num%$i == 0) {
                $cnt++;
                break;
            }
        }
        if($cnt==0) echo $num." ";
    }

    echo "Prime numbers upto specified number are : ";
    if(isset($_GET["number"])){
        for($i = 2; $i<=$_GET["number"]; $i++){
            primeNo($i);
        }
    }
?>
<html>
    <head>
        <title> Assignment 1</title>
    </head>
    <body>
        <form action="<?php $_PHP_SELF ?>" method ="get">
            Number: <input type="number" name="number">
        </form>
    </body>
</html>
