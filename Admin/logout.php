<?php 
session_start();

unset($_SESSION["access_a"]);
unset($_SESSION["name"]);

session_destroy();
// do logout.
?>
<html>
<head>
<script type="text/javascript">
function redirect(){setTimeout(function(){document.location = 'index.php'}, 3000);}
</script>
<title>Logout: ADMIN</title>
</head>
<body onLoad="redirect();">
You have been logged out. Redirecting to <a href="login.php">home</a> in 3 seconds.
</body>
</html>