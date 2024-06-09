<?php
include "User.php";
/**
 * Created by PhpStorm.
 * User: Pratik
 * Date: 4/10/17
 * Time: 5:56 PM
 */
session_start();
if (isset($_GET["type"])) {
    if ($_GET["type"] == "1") {
        $email = $_POST["email"];
        $password = $_POST["pwd"];
        

        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "test";

        $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

        if (!$con) {
            echo "Failed to connect to MySQL: ";
        }


        $sql = "SELECT * from user where email = '$email' and password='$password'";

        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        if (!($row)) {
            header("Location: index.php");
            exit;
        } else {
				
            $user = new User();
            $user->email = $row['email'];
            $user->id = $row['id'];
            $_SESSION['id']=$row['id'];
            $user->rank = (int)$row['rank'];
            $user->password = $row['password'];
            $_SESSION["user"] = serialize($user);

        } 
    } else if ($_GET["type"] == "2") {
        session_destroy();
    }
}
if ($_GET["type"] == "1" && $user->rank == "2") {
    header("Location: admin.php");
} else {
    header("Location: index.php");
}
exit;