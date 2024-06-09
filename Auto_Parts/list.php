<?php


$page=(int)$_POST['page'];
$pageCount=8;

try {
    $dbh= new PDO('mysql:host=localhost;dbname=test', "root", "");
    $part =array();
    $a=0;
    $start=(int)(($page-1)*$pageCount);
    if($_POST['type']==1){
        $sql='SELECT * from parts LIMIT '. $start.','.$pageCount;
    }else if($_POST['type']==2){
        $position=$dbh->quote($_POST['position']);
        $sql='SELECT * from parts where position = '.$position.' LIMIT '. $start.','.$pageCount;
    }else if($_POST['type']==3){
        $name=$dbh->quote("%".$_POST['name']."%");
        $sql='SELECT * from parts where name LIKE '.$name.' LIMIT '. $start.','.$pageCount;
    }else if($_POST['type']==4){
        $position=$dbh->quote($_POST['position']);
        $type=$dbh->quote($_POST['t']);
        $sql='SELECT * from parts where position = '.$position.' and type = '.$type.' LIMIT '. $start.','.$pageCount;
    }
    foreach($dbh->query($sql) as $row) {
        $parts[$a]['id'] = $row['id'];
        $parts[$a]['name'] = $row['name'];
        $parts[$a]['position'] = $row['position'];
        $parts[$a]['type'] = $row['type'];
        $parts[$a]['price'] = $row['price'];
          $parts[$a]['Quantity'] = $row['Quantity'];
        $a++;
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

echo json_encode($parts);