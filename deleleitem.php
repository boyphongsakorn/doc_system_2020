<?php
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <style>
      body {
        font-family: 'Open Sans', sans-serif !important;
      }
      h1 a {
        text-decoration: none;
        color: #3b5998;
      }
      h1 a:hover {
        text-decoration: underline;
      }
    </style>
<style type="text/css">
      .profile {
  margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 20px 0 10px 0;
  background: #fff;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 50%;
  height: 50%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}
    
.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  padding: 20px;
  background: #fff;
  min-height: 460px;
}

.form-control {
  width: 30% !important;
  display: inline !important;
}

.disabledbutton {
      pointer-events: none;
      opacity: 0.4;
}
</style>
<style type="text/css">
/*
Creating a block for social media buttons
*/
.git {
  color: black;
  cursor: pointer;
  margin-left: 10px;
  font-size: 30px;
}
.twitter {
  color: #19C4FF;
  cursor: pointer;
  margin-left: 10px;
  font-size: 30px;
}
.instagram {
  color: #FF66FF;
  cursor: pointer;
  margin-left: 10px;
  font-size: 30px;
}
.facebook {
  color: #49649F;
  cursor: pointer;
  margin-left: 10px;
  font-size: 30px;
}
.linkedin {
  color: #007BB6;
  cursor: pointer;
  margin-left: 10px;
  font-size: 30px;
}
.fb-profile img.fb-image-lg{
    z-index: 0;
    width: 100%;  
    margin-bottom: 10px;
    max-height: 376px;
    max-width: 1140px;
}

.fb-image-profile
{
    margin: -90px 10px 0px 50px;
    z-index: 9;
    width: 20%; 
}

@media (max-width:768px)
{
    
.fb-profile-text>h1{
    font-weight: 700;
    font-size:16px;
}

.fb-image-profile
{
    margin: -45px 10px 0px 25px;
    z-index: 9;
    width: 20%; 
}
</style>
        <title>Edititem</title>
    </head>
    <body>
<?php
//We check if the users ID is defined
if(isset($_GET['itemid']))
{
        $id = intval($_GET['itemid']);
        //We check if the user exists
        $sedb = "SELECT * FROM hello WHERE id = '".$id."'";
        $dn = $mysqli->query($sedb);
        if(mysqli_num_rows($dn) >= 0)
        {
                $dnn = mysqli_fetch_array($dn);
                //We display the user datas
?>
<h2>ต้องการที่จะ Delete ไอเท็ม <?php echo $dnn["id"];?> ใช่หรือไม่ ข้อมูลมีตามนี้</h2>
<form method="post" action="delelef1.php">
ไอดี : <input type="text" name="id" value="<?php echo $dnn["id"];?>" readonly><br>
ชื่อ : <input type="text" name="name" value="<?php echo $dnn["name"];?>" readonly><br>
คำอธิบาย: <input type="text" name="comment" value="<?php echo $dnn["comment"];?>" readonly><br>
แท็ก: <input type="text" name="data" value="<?php echo $dnn["data"];?>" readonly><br>
ไฟล์เอกสาร: <input type="text" name="downloadurl" value="<?php echo $dnn["downloadurl"];?>" readonly><br>
โพสต์โดย: <input type="text" name="postby" value="<?php echo $dnn["postby"];?>" readonly><br>
<input type="submit" value="Delete">
</form>
<?php
        }
        else
        {
                echo 'This user dont exists.';
        }
}
else
{
        echo 'The user ID is not defined.';
}
?>
</body>
</html>