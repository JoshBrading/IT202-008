  
<?php 
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(	   isset($_POST['email']) 
	&& isset($_POST['password'])
	&& isset($_POST['confirm'])
  && isset ($_POST['platform'])
  && isset ($_POST['eligible'])
  && isset ($_POST['discord'])
  && isset ($_POST['g_rank'])
	){
	$pass = $_POST['password'];
	$conf = $_POST['confirm'];
	if($pass != $conf){
		//echo "All good, 'registering user'";
		
		$msg = "Passwords don't match, what's going on there?";
	}
	else{
		$msg = "Registration complete.";
		//let's hash it
		$pass = password_hash($pass, PASSWORD_BCRYPT);
		echo "<br>$pass<br>";
		//it's hashed
		require("config.php");
		$connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
		try {
			$db = new PDO($connection_string, $dbuser, $dbpass);
			$stmt = $db->prepare("INSERT INTO `RLManager`
							(email, password, platform, eligible, discord, g_rank) VALUES
							(:email, :password, :platform, :eligible, :discord, :g_rank)");
			$email = $_POST['email'];
      $platform=$_POST [ 'platform' ];
      $eligible=$_POST [ 'eligible' ];
      $discord=$_POST [ 'discord' ];
      $g_rank=$_POST [ 'g_rank' ];
			$params = array(":email"=> $email, 
						":password"=> $pass,
            ":platform"=>$platform,
            ":eligible"=>$eligible,
            ":discord"=>$discord,
            ":g_rank"=>$g_rank);
			$stmt->execute($params);
			echo "<pre>" . var_export($stmt->errorInfo(), true) . "</pre>";
		}
		catch(Exception $e){
			echo $e->getMessage();
			exit();
		}
	}
	
}
?>
<html>
	<head>
		<title>RL Manager - Register</title>
		<style>
		body{
			background-color: #212F3C;

			color: white;
		}
		</style>
		<script>
			function doValidations(form){
				let isValid = true;
				if(!verifyEmail(form)){
					isValid = false;
				}
				if(!verifyPasswords(form)){
					isValid = false;
				}
				return isValid;
			}
			function verifyEmail(form){
				let ee = document.getElementById("email_error");
				if(form.email.value.trim().length  == 0){
					ee.innerText = "Please enter an email address";
					return false;
				}
				else{
					ee.innerText = "";
					return true;
				}
			}
			function verifyPasswords(form){
				let pe = document.getElementById("password_error");
				if(form.password.value.length == 0 || form.confirm.value.length == 0){
					//alert("You must enter both a password and confirmation password");
					pe.innerText = "\nConfirm password!";
          pe.style.color = '#ff0000';
					return false;
				}
				if(form.password.value != form.confirm.value){
					//alert("Uhh you made a typo");
					pe.innerText = "\nPasswords do not match.";  
          pe.style.color = '#ff0000';             
					return false;
				}
				pe.innerText = "";
				return true;
			}
		</script>
	</head>
	<body onload="findFormsOnLoad();">
		<!-- This is how you comment -->
   <h1 align="center">Registration</h1>
   <h2 align="center">NJIT Rocket League</h2>
		<form name="regform" id="myForm" method="POST"
					onsubmit="return doValidations(this)">
			<div align="center">
  				<label for="email">Email: </label><br>
  				<input type="email" id="email" name="email" placeholder="Enter Email"/>
  				<span id="email_error"></span>
        <br>
        <br>
  				<label for="pass">Password: </label><br>
  				<input type="password" id="pass" name="password" placeholder="Enter password"/>
        <br>
  		  	<label for="conf">Confirm Password: </label><br>
  				<input type="password" id="conf" name="confirm" placeholder="Confirm password"/>
  				<span id="password_error"></span>
        <br>
        <br>
          <p>Do you meet all requirements to compete? 2.5 GPA and are full time.</p>
          <input type="radio" id="yes" name="eligible" value="yes">
          <label for="yes">Yes</label>
          <input type="radio" id="no" name="eligible" value="no">
				  <label for="no">No</lebel><br>

        <br>
          <label for="discord">Discord: </label><br>
          <input type="text" id="discord" name="discord" placeholder="Ex. Tacki#3113"/>
        <br>
        <br>
  				<label for="platform">Select your platform:</label>
  				<select id="platform" name="platform">
   				 <option value="PC">PC</option>
   				 <option value="PS4">PS4</option>
   				 <option value="Switch">Switch</option>
  				 <option value="Xbox">Xbox</option>
  				</select>
        <br>
        <br>
  				<label for="g_rank">Select your rank:</label>
  				<select id="g_rank" name="g_rank">
   				 <option value="Grand Champion">Grand Champion</option>
   				 <option value="Champion 3">Champion 3</option>
   				 <option value="Champ 2 or lower">Champion 2 or lower</option>
        <br>

        </select>
         <div>&nbsp;</div>
         <input type="submit" value="Register"/>
         </div>
		</form>
        <div align="center">
         <button onclick="window.location.href = 'https://web.njit.edu/~jb547/IT202/RLManager/login.php';">Login</button>
		    </div>
    <?php if(isset($msg)):?>
			<span><?php echo $msg;?></span>
		<?php endif;?>
	</body>
</html>
