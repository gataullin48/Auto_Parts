<?php
/**
 * Created by PhpStorm.
 * User: Pratik
 * Date: 9/9/17
 * Time: 5:40 PM
 */
session_start();
$cart = unserialize($_SESSION['cart']);
$userid = $_SESSION['id'];
$itemid = $_SESSION['ITEMID'];
$count = $_SESSION['cart'][$itemid];
$mysqltime = date ("Y-m-d H:i:s");

//  $link = new PDO('mysql:host=localhost;dbname=test', "root", "root");
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "test";

$link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
 if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$result = mysqli_query($link,"SELECT * FROM orders");
$num_rows = mysqli_num_rows($result);

$order_cart = $_SESSION['ORDER_CART'];
$keys = array_keys($order_cart);
foreach($keys as $key){
    // Attempt update query execution
    $item_count = $order_cart[$key];
    $num_rows = $num_rows+1;
    $itemid = $key;
    echo $userid;
    $sql = "INSERT INTO ORDERS VALUES (".$num_rows.",".$userid.",".$itemid.",".$item_count.",STR_TO_DATE('".$mysqltime."', '%Y-%m-%d %H:%i:%s') );";
    $sql1= "UPDATE parts SET Quantity=(Quantity - ".$item_count.") WHERE id=".$itemid.";";
    if(mysqli_query($link, $sql)){
        echo "Records were updated successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    if(mysqli_query($link, $sql1)){
        echo "Records were updated successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql1. " . mysqli_error($link);
    }
    echo "alert('".$sql."');";
}
//echo "Emptied the cart";
$_SESSION['cart']=serialize(array());
$_SESSION['ORDER_CART'] = array();

echo "<script language='javascript'>";
echo "alert(\"success!\");";
echo "location='index.php'";
echo "</script>";