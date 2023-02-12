<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Test SQL Country injection</h1>
    <form action="select_injection_2Countrybindparam.php" method="GET">
        <input type="text" plancholder="Enter Country Name" name="CountryName">
        <br><br>
        <input type="Submit">
    </form>
</body>
</html>
<?php

if (isset($_GET["CountryName"])):
    echo "<br>" . $_GET['CountryName'];
    require 'connect.php';
    $count = 0;
    $sql = "SELECT * FROM country where CountryName =:CountryName";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':CountryName', $_GET['CountryName']);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    echo "<br>******************<br>";

    while ($row = $stmt->fetch()) {
        echo $row['CountryName']. '&nbsp' . $row['CountryCode'] ."<br>";
        $count++;
    }

    //echo "count ... ".$count;
    if($count==0)
    echo "<br> No data ... <br>";
    $conn = null;
endif;
?>