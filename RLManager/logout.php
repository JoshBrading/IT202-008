<?php
session_start();
session_unset();
session_destroy();
echo "You have been logged out";
echo $_SESSION['user'];
echo var_export($_SESSION, true);
//get session cookie and delete/clear it for this session
if (ini_get("session.use_cookies")) { 
    $params = session_get_cookie_params(); 
	//clones then destroys since it makes it's lifetime 
	//negative (in the past)
    setcookie(session_name(), '', time() - 42000, 
        $params["path"], $params["domain"], 
        $params["secure"], $params["httponly"] 
    ); 
} 
?>

<html>
<head>
<title>RL Manager - Logout</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
		body{
			background-color: #212F3C;

			color: white;
		}
</style>
</head>
<body>
  <div align="center">
    <p>Logged out! <br> Redirecting to home page in <span id="countdowntimer">3 </span> Seconds</p>
  </div>
  <meta http-equiv="refresh" content="5;url=http://web.njit.edu/~jb547/IT202/RLManager/home.php" />
<script type="text/javascript">
    var timeleft = 3;
    var timer = setInterval(function(){
    timeleft--;
    document.getElementById("countdowntimer").textContent = timeleft;
    if(timeleft <= 0)
        clearInterval(timer);
    },1000);
</script>
</body>
</html>
