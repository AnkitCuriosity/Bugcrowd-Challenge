<?php
setcookie('username','logout',time()-10);
setcookie('session','logout',time()-10);
header('Location: index.php');
?>