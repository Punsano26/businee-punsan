<?php
require "connect.php";


if(isset($_GET["CustomerID"]))

{

    $strCustomerID = $_GET["CustomerID"];
    echo "<br>"."strCustomerID =".$strCustomerID;
    $sql="SELECT * FROM customer WHERE CustomerID = '".$strCustomerID ."'";
    echo "<br>" . "sql=".$sql."<br>";
    $stml = $conn->prepare($sql);
    $stml->execute();
    $result=$stml->fetch(PDO::FETCH_NUM);
    //print_r($resute);
}
?>
<table width="300" border="1">
  <tr>
    <th width="325">รหัสลูกค้าสมาชิก</th>
    <td width="240"><?php echo $result["0"]; ?></td>
  </tr>

  <tr>
    <th width="130">ชื่อ</th>
    <td><?php echo $result["1"]; ?></td>
  </tr>
 

  <tr>
    <th width="130">Email</th>
    <td><?php echo $result["2"]; ?></td>
  </tr>


  <tr>
    <th width="130">Birthdate</th>
    <td><?php echo $result["3"]; ?></td>
  </tr>


  <tr>
    <th width="130">CountryCode</th>
    <td><?php echo $result["4"]; ?></td>
  </tr>


  <tr>
    <th width="130">OutstandingDebt</th>
    <td><?php echo $result["5"]; ?></td>
  </tr>

 
  </table>
<?php
$conn = null;
?>