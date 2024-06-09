<?php

    try {
        $db = new PDO('mysql:host=localhost;dbname=test', "root", "");

    } catch (PDOException $e) {

        $msg= "Delete fail! Error!: " . $e->getMessage();
        $db = null;
        die();
    }
    if($db!=null) {

        $id=$_GET['id'];
        $f=true;

            try {

                $db->beginTransaction();
                $db->exec("delete from parts where id = $id");
                $db->commit();
                $db = null;
            } catch (Exception $e) {
                $db->rollBack();
                $db = null;
                $msg = "Delete fail! Error: " . $e->getMessage();
                $f = false;
            }

    }
    if($f) {

        $path = "partsImg/$id.jpg";       

//echo $_FILES["filename"]["type"];


        if (file_exists($path)) {
           
           unlink($path);
        }//END IF

        $msg="Delete Success!";
    }

echo "<script language='javascript'>";
echo "alert(\"".$msg."\");";
echo "location='admin.php'";
echo "</script>";