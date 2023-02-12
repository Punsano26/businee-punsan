<?php
require "connect.php";
// ลองให้โชว์ข้อมูล customer
$sql = "SELECT * FROM customer" ; 
$stmt = $conn->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll();
// print_r($result);

foreach ($result as $r) {
    print '<br>'.'รหัสลูกค้า : '.$r['CustomerID'].' วันเกิด : ' . $r['Birthdate'].' ยอดหนี้ : '.$r['OutstandingDebt']  ;
}
?>
