<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Customer</title>
</head>
<body>
    <h1>Add country</h1>
    <form action = "addCustomer.php"method = "POST">

    <input type="text"placeholder='Enter Customer ID' name="CustomerID">
    <br><br>
    <input type="text" placeholder='Enter customer name' name ="Name">
    <br><br>
    <input type="date" placeholder='Enter customer date' name ="birthdate">
    <br><br>
    <input type="text" placeholder='Enter customer Email' name ="Email">
    <br><br>
    <input type="text" placeholder='Enter customer CountryCode' name ="CountryCode">
    <br><br>
    <input type="text" placeholder='Enter customer Outstanding' name ="Outstandingdebt">
    <br><br>
    <input type="submit">
    </form>
</body>
</html>

<?php 
    if (!empty($_POST['CustomerID'])&& !empty($_POST['Name'])&& !empty($_POST['birthdate'])&& !empty($_POST['Email'])&& !empty($_POST['CountryCode'])&& !empty($_POST['Outstandingdebt'])):
        require'connect.php';
            $sql_insert="insert into customer values (:CustomerID,:Name,:birthdate,:Email,:CountryCode,:Outstandingdebt)";

            $stmt = $conn->prepare($sql_insert);
            $stmt->bindParam(':CustomerID',$_POST['CustomerID']);
            $stmt->bindParam(':Name',$_POST['Name']);
            $stmt->bindParam(':birthdate',$_POST['birthdate']);
            $stmt->bindParam(':Email',$_POST['Email']);
            $stmt->bindParam(':CountryCode',$_POST['CountryCode']);
            $stmt->bindParam(':Outstandingdebt',$_POST['Outstandingdebt']);

            if($stmt->execute()):
                $message = 'Sucessfully add new country';

            else:
                    $message='Fail to add new country';
            endif;
            echo $message;
            $conn=null;
        endif;
        ?>