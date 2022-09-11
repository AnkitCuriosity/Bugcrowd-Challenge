<HTML>
<head>
<link rel="shortcut icon" type="image/x-icon" href="image.png" />

<title>Hijack the Session !</title>

<style>
body {
  font-family: Arial, sans-serif;
}

h1 {
  text-align: center;
  font-family: Tahoma, Arial, sans-serif;
  color: #06D85F;
  margin: 80px 0;
}

.box {
  width: 40%;
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
}

.button {
  font-size: 1em;
  padding: 10px;
  color: #fff;
  border: 3px solid #db7006;
  border-radius: 20px/50px;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.3s ease-out;
}
.button:hover {
  background: #eb984e;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 40%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}

@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
}
input[type=text] {
  width: 1px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 14px;
  background-color: white;
  background-image: url('image.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
  width: 35%;
}
.btn-10 {
  background: #eb984e;
            font-size: 15px;
            color: white;
            border-radius: 7px;
            box-shadow: 0 7px 0px #6d4c41;
            display: inline-block;
            transition: all .2s;
            position: relative;
            padding: 2px 5px;
            position: relative;
            top: 0;
  margin:0;
}

 .btn-10:active {
            top: 3px;
            box-shadow: 0 2px 0px #6d4c41;
            transition: all .2s;
        }
body {
  background-image: url("2.svg"), url("bugcrowd-logo.svg");;
  background-repeat: no-repeat,no-repeat;
  background-position: center,left top;
  height: 650px;
  background-size: cover,auto;
}
</style>
</head>
<br><br><br>
<form action="index.php" method="POST">
Provide a username to login : <input type="Text" name="username" placeholder="Username.."><br><br>
<input type="submit" class="btn-10" value="Login to the challenge">
</form>
</HTML>

<?php
if(isset($_POST['username'])){
  if(!empty($_POST['username'])){
$user=$_POST['username'];
$hash=md5(time());
setcookie('session',$user.'-'.$hash,time()+1800,'','',false,true);
setcookie('username',$user,time()+1800,'','',false,true);
header('Location: main.php');
} else {
echo 'Username is missing :(';
}
}
?>
<HTML>
<body translate="no" >
<div class="box">
	<a class="button" href="#rules">Read Instructions</a>
</div>

<div id="rules" class="overlay">
	<div class="popup">
		<h2><center>Welcome to the Challenge&nbsp; <img src=image.png><center></h2><h3>Please read these instructions carefully -:</h3>
		<a class="close" href="#">&times;</a>
		<div class="content">
			1) Upon login, the application assigns a session value to your user. Your target is to provide a "One click" PoC to steal this value. The application has some hidden bugs which will help you to retrieve this value.<BR><BR>2) The first 10 users to find the solution and send <a href="https://twitter.com/bugcrowd" target="_blank">Bugcrowd</a> a direct message with the solution will win a prize.<BR><BR>3) When the challenge tweet receives 50 retweets, we will provide one hint to the challenge.<BR><BR>4) For every 100 likes the tweet receives, we will give away one additional prize to a user who completes the challenge and sends us a direct message with the solution.<BR><BR>5) The challenge runs from February 13th to February 15th.<BR><BR>6)<B> NOTE</B> that posting the solution publicly on any platform is strictly prohibited and any participant found posting the solution will immediately be banned from the challenge.
		</div>
	</div>
</div>
</body>
</HTML>