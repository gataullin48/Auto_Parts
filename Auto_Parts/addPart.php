<?php

if(isset($_GET["updateType"])){
    $type = $_GET["updateType"];
}else{
    $type=1;
}
?>
<head>
    <meta charset="UTF-8">
    <?php
    if ($type == 1) {
        ?>
        <title>Add Part</title>
        <?php
    } else if ($type == 2) {
        ?>
        <title>Update Part</title>
        <?php
    }
    ?>

    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <!--<link href="css/index.css" rel="stylesheet"/>-->
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--<script src="js/index.js"></script>-->
</head>
<body>
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
                <li><a href="addPart.php">Add Part</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li><a href="login.php?type=2"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row" style="margin-top: 10px;">
        <div class="col-sm-offset-1 col-sm-10">
            <div class="panel panel-primary">
                <?php
                    if($type==1){
                        ?>

                        <div class="panel-heading">Add Part</div>
                <?php
                    }else if($type==2){
                        ?>
                        <div class="panel-heading">Update Part</div>
                <?php
                    }
                ?>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="form" enctype="multipart/form-data"
                          action="upload.php" method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Name:</label>
                            <div class="col-sm-6">
                                <?php
                                if ($type == 1) {
                                    ?>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Part Name">
                                    <?php
                                } else if($type==2) {
                                    ?>
                                    <input type="text" class="form-control" name="name" value="<?=$_GET['name']?>">
                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="type">Manufacturer:</label>
                            <div class="col-sm-6">
                                <?php
                                if ($type == 1) {
                                    ?>
                                    <select class="form-control" name="type">
                                        <option>Ferrari</option>
                                        <option>Honda</option>
                                        <option>Lexus</option>
                                        <option>Mazda</option>
                                        <option>Audi</option>
                                        <option>Jaguar</option>
                                        <option>Ford</option>
                                    </select>
                                    <?php
                                } else if($type==2){
                                    ?>
                                    <select class="form-control" name="type">
                                        <option>Ferrari</option>
                                        <option>Honda</option>
                                        <option>Lexus</option>
                                        <option>Mazda</option>
                                    </select>
                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="position">Position:</label>
                            <div class="col-sm-6">
                                <?php
                                if ($type == 1) {
                                    ?>
                                    <select class="form-control" name="position">
                                        <option>Wheel</option>
                                        <option>Light</option>
                                        <option>Inner Parts</option>
                                        <option>Exterior Parts</option>
                                    </select>
                                    <?php
                                } else if($type==2){
                                    ?>
                                    <select class="form-control" name="position">
                                        <option>Wheel</option>
                                        <option>Light</option>
                                        <option>Inner Parts</option>
                                        <option>Exterior Parts</option>
                                    </select>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="price">Price:</label>
                            <div class="col-sm-6">
                                <?php
                                if ($type == 1) {
                                    ?>
                                    <input type="text" class="form-control" name="price" placeholder="Enter Part Price">
                                    <?php
                                } else if($type==2){
                                    ?>
                                    <input type="text" class="form-control" name="price" value="<?=$_GET['price']?>">
                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                        
                        
                        <div class="form-group">

                            <label class="control-label col-sm-2" for="file">Picture:</label>
                            <div class="col-sm-6">
                                <input type="file" name="filename" class="form-control" id="file"/>
                            </div>
                        </div>
                        <input type="hidden" name="updateType" value="<?= $type ?>"/>
                        <?php
                        if ($type == 2) {
                            ?>
                            <input type="hidden" name="id" value="<?= $_GET['id'] ?>"/>
                            <?php

                        }
                        ?>
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>"/>
                        <div class="form-group" style="float: left; margin-left: 50px;">
                            <div class=" col-sm-2">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>

                    </form>
                    <div class=" col-sm-2" style="float: left;">
                        <a href="admin.php"><button class="btn btn-default">Cancel</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $(function () {
        $('#form').validation();
    })
</script>