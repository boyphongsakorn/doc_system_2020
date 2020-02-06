<!DOCTYPE html>
<html>
<head>
<?php
session_start();
include 'config.php';

$qnameu="SELECT * FROM hello group by postby";
$qnameuQuery = $mysqli->query($qnameu);
?>
<title></title>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript" src="jquery-3.1.0.min.js"></script>
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
</style>
<script type="text/javascript">
$('#fileuser').on('shown.bs.modal', function () {
  $('#fileuser').focus()
})
$('#filetag').on('shown.bs.modal', function () {
  $('#filetag').focus()
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
        <a class="navbar-brand text-hide" href="index.php">Brand Text
        </a>
      </div>
      <div id="navbar6" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/doc">หน้าแรก</a></li>
          <li class="active"><a data-toggle="modal" data-target="#filetag">ดูเอกสาร ตามแท็ก</a></li>
          <li><a data-toggle="modal" data-target="#fileuser">ดูเอกสาร ของผู้ใช้</a></li>
          <?php if (isset($_SESSION["UserID"])) { ?>
          <li><a href="edit.php">จัดการ</a></li>
          <?php } else {?>
          <li><a href="login.html">ล็อกอิน</a></li>
          <?php } ?>
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
<font color="<?php echo $objResultst["titlecolor"];?>"><h1 style="margin-top: 25px;"><?php echo $objResultst["title"];?></h1></font>
        </div>
        <!-- /.container -->
    </div>
<div class="container">
    <ol class="breadcrumb" style="margin-bottom: 8px;">
        <li><a href="/doc">หน้าแรก</a></li>
        <li><a data-toggle="modal" data-target="#filetag">เอกสารตามแท็ก</a></li>
        <li class="active">#<?php echo $_GET["tag"]; ?></li>
    </ol>
    <div class="panel-group">
<?php
$getfromtag="SELECT * FROM hello WHERE data = '". $_GET["tag"] ."' ORDER BY id ASC";
$gftQuery = $mysqli->query($getfromtag);
while($objResult = mysqli_fetch_array($gftQuery))
{
?>
        <div class="panel panel-primary">
            <div class="panel-heading"><?php echo $objResult["name"];?></div>
            <div class="panel-body"><div class="row"><div class="col-md-2"><center><a href="myfile/<?php echo $objResult["postby"];?>/<?php echo $objResult["downloadurl"];?>"><img src="https://assets.ubuntu.com/v1/be3876ec-picto-download-warmgrey.svg" style="width: 80px;height: 80px;"></a></center></div><div class="col-md-7"> <?php echo $objResult["comment"];?></div><div class="col-md-3">โดย : <?php echo $objResult["postby"];?><br>แท็ก:<br><a href="tag.php?tag=<?php echo $objResult["data"];?>"><?php echo $objResult["data"];?></a></div></div></div>
        </div>
<?php
}
?>
    </div>
</div>
<div class="modal fade" id="filetag" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ดูเอกสาร ตามแท็ก</h4>
      </div>
      <div class="modal-body">
      <center><font size="18">
<?php
$qnameu="SELECT * FROM hello group by data";
$qnameuQuery = $mysqli->query($qnameu);
while($objResultqname = mysqli_fetch_array($qnameuQuery))
{
?>
<a href="tag.php?tag=<?php echo $objResultqname["data"];?>"><?php echo $objResultqname["data"];?></a>
<?php
}
?>
      </font></center>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="fileuser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ดูเอกสาร ตามผู้ใช้</h4>
      </div>
      <div class="modal-body">
<?php
$qnameu="SELECT * FROM hello group by postby";
$qnameuQuery = $mysqli->query($qnameu);
while($objResultqname = mysqli_fetch_array($qnameuQuery))
{
?>
<center><font size="18"><?php echo $objResultqname["postby"];?></font></center>
<?php
}
?>
      </div>
    </div>
  </div>
</div>
</body>
</html>