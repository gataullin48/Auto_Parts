<?php
session_start();
$pageCount = 8;
try {
    $db = new PDO('mysql:host=localhost;dbname=test', "root", "");
    $name=$db->quote("%".$_GET['name']."%");
    $rows = $db->query("SELECT COUNT(*) from parts where name like ".$name);
    if ($rows->rowCount() > 0) {
        $row = $rows->fetch();
        $total = (int)$row[0];
        if ($total % $pageCount == 0) {
            $pageNum = $total / $pageCount;
        } else {
            $pageNum = $total / $pageCount+1;
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
    <title>Search Name</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <!--<link href="css/index.css" rel="stylesheet"/>-->
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/searchName.js"></script>
    <style>
        a:visited{

        }
        a:hover {
            cursor: hand;
            text-decoration: none;
        }
        #show table{
            float: left;
            line-height: 30px;
            font-size: 20px;
        }
        #show img{
            height:200px;
            width: 210px;
            margin-top: 15px;

        }
    </style>
</head>

<!-- header-->
<div style="display: none;" id="name"><?=$_GET['name']?></div>
<div class="container-fluid">
    <div class="row" style="height:60px;">
        <div class="col-xs-3" style="margin-top: 5px;">
            <img src="img/logo.png" style="height:80%;width: 100%;"/>
        </div>
        <div class="col-xs-1">

        </div>
        <div class="col-xs-6">
            <form class="form-inline" role="form" style="margin-top: 14px" action="searchName.php" method="get">

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
                <li><a href="index.php">Home</a></li>
                <li><a  href="position.php?position=Wheel">Wheel</a></li>
                <li><a  href="position.php?position=Light">Light</a></li>
                <li><a  href="position.php?position=Inner Parts">Inner Parts</a></li>
                <li><a  href="position.php?position=Exterior Parts">Exterior Parts</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="myCart.php"><span class="glyphicon glyphicon-th-large"></span> My Cart &nbsp;<span id="bag" class="badge"></span></a></li>
                <?php
                if (!isset($_SESSION["user"])) {
                    ?>
                    <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a data-toggle="modal" data-target="#myModal" id="login"><span
                                class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php
                } else {
                    ?>
                    <li><a href="account.php"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
                    <li><a href="login.php?type=2" ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <form class="form-horizontal" role="form" action="login.php?type=1" method="post">

                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="pwd" placeholder="Enter password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12" id="show">

        </div>
    </div>
    <div class="row">
        <div class="col-sm-offset-5">
            <ul class="pagination">

                <?php
                for ($i=1;$i<=(int)$pageNum;$i++) {
                    ?>
                    <li><a><?=$i?></a></li>
                    <?php
                }
                ?>
            </ul>

        </div>

    </div>
</div>
