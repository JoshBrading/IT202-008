<html>
	<head>
		<title>RL Manager - Register</title>
		<style>
		body{
			background-color: #1c1c1c;

			color: white;
		}
		</style>
     <h1 align="center">Login</h1>
     <h2 align="center">NJIT Rocket League</h2>   
		<form name="loginform" id="myForm" method="POST">
      <div align="center">
  			<label for="email">Email: </label>
  			<input type="email" id="email" name="email" placeholder="Enter Email"/>
  			<label for="pass">Password: </label>
  			<input type="password" id="pass" name="password" placeholder="Enter password"/>
  			<input type="submit" value="Login"/>
     </div>
		</form>
     <div align="center">
      <button onclick="window.location.href = 'https://web.njit.edu/~jb547/IT202/RLManager/Register.php';">Register</button>
      <button onclick="window.location.href = 'https://web.njit.edu/~jb547/IT202/RLManager/logout.php';">Logout</button>
      </div>
	</body>
</html>
<?php 
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if(isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){
	$pass = $_POST['password'];
	$email = $_POST['email'];
	
	require("config.php");
	$connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
	try {
		$db = new PDO($connection_string, $dbuser, $dbpass);
		$stmt = $db->prepare("SELECT email, password from `RLManager` where email = :email LIMIT 1");
		
        $params = array(":email"=> $email);
        $stmt->execute($params);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		echo "<pre>" . var_export($stmt->errorInfo(), true) . "</pre>";
		if($result){
			$userpassword = $result['password'];

			if(password_verify($pass, $userpassword)){
				//$id = $result['id'];
				//echo "You logged in with id of " . $id;

				//$stmt = $db->prepare("SELECT r.id, r.role_name from `Roles` r JOIN `UserRoles` ur on r.id = ur.role_id where ur.user_id = :id");
				//$stmt->execute(array(":id"=>$id));
				$roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
				if(!$roles){
					$roles = array();
				}
				$user = array(
					//"id" => $id,
					"email"=>$result['email'],
					"roles"=> $roles);
				$_SESSION['user'] = $email;
				echo "Session: <pre>" . var_export($_SESSION, true) . "</pre>";
				echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
			}
			else{
				echo "Failed to login, invalid password";
			}
		}
		else{
			echo "Invalid email";
		}
	}
	catch(Exception $e){
		echo $e->getMessage();
		exit();
	}
}
?> 