<head>
<link rel="shortcut icon" type="image/x-icon" href="image.png" />

<title>Hijack the Session !</title>
<style>
.btn-10 {
  background: #eb984e;
            font-size: 15px;
            color: white;
            border-radius: 7px;
            box-shadow: 0 7px 0px #6d4c41;
            display: inline-block;
            transition: all .2s;
            position: relative;
            padding: 15px 25px;
            position: relative;
            top: 0;
  margin:0 20px;
}

 .btn-10:active {
            top: 3px;
            box-shadow: 0 2px 0px #6d4c41;
            transition: all .2s;
        }
</style>
<style>
body {
  background-image: url("5.svg"), url("bugcrowd-logo.svg");
  background-repeat: no-repeat,no-repeat;
  background-position: center,left top;
  height: 750px;
  background-size: cover,auto;
}
</style>
</head>
<p align="right"><button class="btn-10" onclick="location.href='logout.php'"><B>Log Out</B></button></p>

<?php
if(isset($_COOKIE['session'])&&!empty($_COOKIE['session'])){
  $safeuser=htmlentities($_COOKIE["username"]);
  $safesecret=htmlentities($_COOKIE["session"]);
echo '<center><p style="font-size:30px">Welcome to the challenge <B>'.$safeuser.'</B> !</p></center>';
if(isset($_GET['tools'])){
  if(!empty($_GET['tools'])) {
    $tools=htmlentities($_GET["tools"]);
  echo '<br><br><br><br><center><B>Hurray, you found the secret parameter&nbsp;&nbsp;<img src=image.png></B></center>';
   http_response_code(203);
  if(preg_match("/\r\n/", $tools)) {
  if(preg_match("/:/", $tools)) {
      $new_head = substr($tools, strpos($tools, "\r\n") + 2);
      header($new_head);
  } else {
    $tools=$tools.':';
    $new_head = substr($tools, strpos($tools, "\r\n") + 2);
      header($new_head);
  }
   } else if (preg_match("/\n\r/", $tools)) {
     if(preg_match("/:/", $tools)) {
      $new_head = substr($tools, strpos($tools, "\n\r") + 2);
      header($new_head);
  } else {
    $tools=$tools.':';
    $new_head = substr($tools, strpos($tools, "\n\r") + 2);
      header($new_head);
  }
     
   }
   else {
     @header('X-Value: '.$tools);
   }
   header('Auth-secret: '.$safesecret);
   if(isset($_SERVER['HTTP_ORIGIN'])&&!empty($_SERVER['HTTP_ORIGIN'])){
   header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
   }
   header('Access-Control-Allow-Credentials: true');

} else {
  echo '<br><br><br><br><center><B>Parameter "tools" CANNOT be empty..&nbsp;&nbsp;<img src=image.png></B></center>';
}
} else {
   echo '<br><br><br><br><center><B>Better late than never. But never late is better..&nbsp;&nbsp;<img src=image.png></B></center>';
}
}
else {
header('Location: index.php');
}
?>
