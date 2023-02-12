<?php
require "connect.php";
// ลองให้โชว์ข้อมูล customer
$sql = "SELECT customer.CustomerID, customer.Name, customer.OutstandingDebt, country.CountryName FROM customer, country where country.CountryCode=customer.CountryCode" ; 
$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll();
// print_r($result);

foreach ($result as $r) {
    print '<br>'.$r['CustomerID'].'--' . $r['Name'] .'--'.$r['OutstandingDebt'].'--'.$r['CountryName'] ;
}
?>
