<!DOCTYPE html>
<html>
<head>
<?php
session_start();
include 'config.php';

$strSQL = "SELECT * FROM hello ORDER BY id ASC";
$objQuery = $mysqli->query($strSQL);
$strSQLst = "SELECT * FROM settings";
$objQueryst = $mysqli->query($strSQLst);

$objResultst = mysqli_fetch_array($objQueryst);
if (isset($_SESSION["UserID"])) {
//*** Update Last Stay in Login System
  $sqleee = "UPDATE member SET LastUpdate = NOW() WHERE Username = '".$_SESSION["UserID"]."'";
  $queryeeee = mysqli_query($mysqli,$sqleee);

//*** Get User Login
  $strSQLeee = "SELECT * FROM member WHERE Username = '".$_SESSION['UserID']."' ";
  $objQueryeee = mysqli_query($mysqli,$strSQLeee);
  $objResulteee = mysqli_fetch_array($objQueryeee,MYSQLI_ASSOC);
}
?>
<title><?php echo $objResultst["title"];?></title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://kkgo.boyphongsakorn.xyz/jquery-3.1.0.min.js"></script>
<script src="https://apis.google.com/js/platform.js"></script>
<style type="text/css">
.navbar {
    margin-bottom: 0px !important;
}

.example6 .navbar-brand{ 
  background: url(<?php echo $objResultst["logourl"];?>) center / contain no-repeat;
  width: 200px;
}

.intro-header {
  height: 90px;
    padding-top: 0px; /* If you're making other pages, make sure there is 50px of padding to make sure the navbar doesn't overlap content! */
    padding-bottom: 50px;
    text-align: left;
    color: #f8f8f8;
    background: url(<?php echo $objResultst["headurl"];?>) no-repeat center center;
    background-size: cover;
}

.intro-message {
    position: relative;
    padding-top: 20%;
    padding-bottom: 20%;
}

.intro-message > h1 {
    margin: 0;
    text-shadow: 2px 2px 3px rgba(0,0,0,0.6);
    font-size: 5em;
}

.intro-divider {
    width: 400px;
    border-top: 1px solid #f8f8f8;
    border-bottom: 1px solid rgba(0,0,0,0.2);
}

.intro-message > h3 {
    text-shadow: 2px 2px 3px rgba(0,0,0,0.6);
}

@media(max-width:767px) {
    .intro-message {
        padding-bottom: 15%;
    }

    .intro-message > h1 {
        font-size: 3em;
    }

    ul.intro-social-buttons > li {
        display: block;
        margin-bottom: 20px;
        padding: 0;
    }

    ul.intro-social-buttons > li:last-child {
        margin-bottom: 0;
    }

    .intro-divider {
        width: 100%;
    }
}

.div1 {
    width: 300px;
    height: 100px;
    border: 1px solid #33CCFF;
}

.panel-group .panel {
    margin-bottom: 5px !important;
}
</style>
<script type="text/javascript">
$('#additem').on('shown.bs.modal', function () {
  $('#additem').focus()
})
$('#adduser').on('shown.bs.modal', function () {
  $('#adduser').focus()
})
$('#editsettings').on('shown.bs.modal', function () {
  $('#editsettings').focus()
})
</script>
</head>
<body>
<center>
<nav class="navbar navbar-inverse navbar-static-top example6">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar6">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand text-hide" href="edit.php">Brand Text
        </a>
      </div>
      <div id="navbar6" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <?php if (isset($_SESSION["UserID"])) :?>
            <?php if ($_SESSION["UserID"] == "admin") :?>
            <li><a data-toggle="modal" data-target="#additem">Add Item</a></li>
            <li><a data-toggle="modal" data-target="#adduser">Add User</a></li>
            <li><a data-toggle="modal" data-target="#editsettings">Setting</a></li>
            <li class="active"><a href="logout.php">Logout</a></li>
            <?php else:?>
            <li><a data-toggle="modal" data-target="#additem">Add Item</a></li>
            <li class="active"><a href="logout.php">Logout</a></li>
            <?php endif ?>
          <?php else:?>
          <li><a href="login.html">Login</a></li>
          <?php endif ?>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>
</center>
    <div class="intro-header" style="margin-bottom: 5px;">
        <div class="container">
<font color="<?php echo $objResultst["titlecolor"];?>"><h1 style="margin-top: 25px;">การจัดการ</h1></font>
        </div>
        <!-- /.container -->
    </div>
<div class="container">
<?php if (isset($_SESSION["UserID"])) :?>
    <div class="panel-group">
<?php
while($objResult = mysqli_fetch_array($objQuery))
{
?>
        <div class="panel panel-primary">
            <div class="panel-heading"><?php echo $objResult["name"];?> <?php if ($_SESSION["UserID"] == $objResult["postby"]) :?><a data-toggle="modal" data-target="#popedit<?php echo $objResult["id"];?>"><img src="https://cdn3.iconfinder.com/data/icons/google-material-design-icons/48/ic_mode_edit_48px-128.png" style="width: 25px;height: 25px;"></a><a data-toggle="modal" data-target="#popdelete<?php echo $objResult["id"];?>"><img src="https://cdn3.iconfinder.com/data/icons/musthave/256/Remove.png" style="width: 25px;height: 25px;"></a><?php else:?><?php endif ?></div>
            <div class="panel-body"><div class="row"><div class="col-md-2"><center><a href="myfile/<?php echo $objResult["postby"];?>/<?php echo $objResult["downloadurl"];?>"><img src="https://assets.ubuntu.com/v1/be3876ec-picto-download-warmgrey.svg" style="width: 80px;height: 80px;"></a></center></div><div class="col-md-7"> <?php echo $objResult["comment"];?></div><div class="col-md-3">โดย : <?php echo $objResult["postby"];?><br>แท็ก:<br><?php echo $objResult["data"];?></div></div></div>
        </div>
<script>
$('#popedit<?php echo $objResult["id"];?>').on('shown.bs.modal', function () {
  $('#pop<?php echo $objResult["id"];?>').focus()
})
$('#popdelete<?php echo $objResult["id"];?>').on('shown.bs.modal', function () {
  $('#pop<?php echo $objResult["id"];?>').focus()
})
</script>
<!-- Modal -->
<div class="modal fade" id="popedit<?php echo $objResult["id"];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">แก้ไขเอกสาร <?php echo $objResult["id"];?></h4>
      </div>
      <div class="modal-body">
        <iframe class="playerpage" src="edititem.php?itemid=<?php echo $objResult["id"];?>" style="
    width: 564px; height: 210px;" frameborder="0"></iframe>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="popdelete<?php echo $objResult["id"];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ลบเอกสาร <?php echo $objResult["id"];?></h4>
      </div>
      <div class="modal-body">
        <iframe class="playerpage" src="deleleitem.php?itemid=<?php echo $objResult["id"];?>" style="
    width: 100%; height: 300px;" frameborder="0"></iframe>
      </div>
    </div>
  </div>
</div>
<?php
}
?>
    </div>
</div>
<div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Item</h4>
      </div>
      <div class="modal-body">
<form name="form1" method="post" action="additemf1.php" enctype="multipart/form-data">
ชื่อผู้โพสต์: <input type="text" name="Username" value="<?php echo $_SESSION["UserID"];?>" readonly><br>
ชื่อ : <input type="text" name="name" size="30"><br>
คำอธิบาย: <input type="text" name="comment" cols="40" rows="5" style="width:400px;"><br>
แท็ก: <input type="text" name="data" size="30"><br>
ไฟล์เอกสาร: <input type="file" name="filUpload">
<input type="submit" value="Submit">
</form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Item</h4>
      </div>
      <div class="modal-body">
<form name="form1" method="post" action="adduserf1.php" enctype="multipart/form-data">
Username : <input type="text" name="Username" size="30"><br>
Password: <input type="text" name="Password" cols="40"><br>
Name: <input type="text" name="Name" size="30">
<input type="submit" value="Submit">
</form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editsettings" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Setting</h4>
      </div>
      <div class="modal-body">
<form method="post" action="editsettingsf1.php">
โล้โก URL : <input type="text" name="logourl" value="<?php echo $objResultst["logourl"];?>"><br>
รูปพื้นหลัง : <input type="text" name="headurl" value="<?php echo $objResultst["headurl"];?>"><br>
ชื่อเว็บ: <input type="text" name="title" value="<?php echo $objResultst["title"];?>"><br>
สีของชื่อเว็บ: <input type="text" name="titlecolor" value="<?php echo $objResultst["titlecolor"];?>"> ดู code สีได้<a href="http://www.w3schools.com/colors/colors_picker.asp">ที่นี้</a><br>
<input type="submit" value="Submit"></form>
      </div>
    </div>
  </div>
</div>
<?php else :?>
<center>กรุณา Login</center>
<?php endif ?>
</body>
</html>