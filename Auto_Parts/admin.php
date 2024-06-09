<?php
$pageCount = 8;
try {
    $db = new PDO('mysql:host=localhost;dbname=test', "root", "");
    $rows = $db->query('SELECT COUNT(*) from parts');
    if ($rows->rowCount() > 0) {
        $row = $rows->fetch();
        $total = (int)$row[0];
        if ($total % $pageCount == 0) {
            $pageNum = $total / $pageCount;
        } else {
            $pageNum = $total / $pageCount + 1;
        }

    }
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    $db = null;
    die();
}
?>
<head>
    <meta charset="UTF-8">
    <title>All Parts</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/admin.js"></script>
    <style>
        a:visited {

        }

        a:hover {
            cursor: hand;
            text-decoration: none;
        }

        #show table {
            float: left;
            line-height: 30px;
            font-size: 20px;
        }

        #show img {
            height: 200px;
            width: 210px;
            margin-top: 15px;

        }
    </style>
</head>

<!-- header-->
<div class="container-fluid">
    <div class="row" style="height:60px;">
        <div class="col-xs-3" style="margin-top: 5px;">
            <img src="img/logo.png" style="height:80%;width: 100%;"/>
        </div>
        <div class="col-xs-1">

        </div>
        <div class="col-xs-6">
            <form class="form-inline" role="form" style="margin-top: 14px" action="adminSearch.php" method="get">

                <input type="text" class="form-control" style="width: 80%" name="name" placeholder="Search By Item Name">

                <button type="submit" class="btn btn-default" style="color: orange;">Search</button>
            </form>
        </div>
    </div>
</div>
<!-- navbar -->
<nav class="navbar navbar-inverse" style="margin: 0px;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="admin.php">All Parts</a></li>
                <li><a href="addPart.php?type=1">Add Part</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li><a href="login.php?type=2"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12" id="show">

        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-5">
            <ul class="pagination">
                <?php
                for ($i = 1; $i <= (int)$pageNum; $i++) {
                    ?>
                    <li><a><?= $i ?></a></li>
                    <?php
                }
                ?>
            </ul>

        </div>

    </div>
</div>
