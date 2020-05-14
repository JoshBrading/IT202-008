<!DOCTYPE html>
<html>

<head>
	<title>Home</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<script src="https://kit.fontawesome.com/2dc30c3b9c.js" crossorigin="anonymous"></script>
	<style>
	html,
	body {
		display: flex;
		justify-content: center;
		height: 100%;
	}
	
	body,
	div,
	h1,
	form,
	input {
		padding: 0;
		margin: 0;
		outline: none;
		font-size: 16px;
		color: #e8e8e8;
	}
	
	h1 {
		padding: 10px 0;
		font-size: 32px;
		font-weight: 300;
		text-align: center;
	}
	
	p {
		font-size: 12px;
	}
	
	hr {
		color: #e8e8e8;
		opacity: 0.3;
	}
	
	.main-block {
		max-width: 9000px;
		min-height: 200px;
		padding: 10px 0;
		margin: auto;
		border-radius: 25px;
		border: solid 1px #ccc;
		box-shadow: 1px 2px 5px rgba(0, 0, 0, .31);
		background: #2e2e2e;
	}
	
	form {
		margin: 0 30px;
		display: inline-block;
	}
	
	.btn-block {
		margin-top: 10px;
		text-align: center;
	}
	
	button {
		width: 150px;
		padding: 10px 0;
		margin: 10px auto;
		border-radius: 5px;
		border: none;
		background: #c20000;
		font-size: 14px;
		font-weight: 600;
		color: #e9e9e9;
	}
	
	button:hover {
		background: #eb0000;
	}
	
	table,
	th,
	td {
		border-collapse: collapse;
		text-align: center;
		border: 2px solid white;
		padding: 5px;
		width: 1000px;
	}
	
	tr:nth-child(even) {
		background-color: #1c1c1c;
	}
	
	.card {
		border-radius: 25px;
		border: 2px solid white;
		width: 420px;
		height: 1024px;
		margin: auto;
		text-align: center;
		font-family: arial;
	}
	
	.title {
		color: grey;
		font-size: 18px;
	}
	
	a {
		text-decoration: none;
		font-size: 20px;
		color: white;
	}
	
	h2 {
		font-size: 32px;
		margin-top: 5px;
		margin-bottom: 5px;
	}
	
	h3 {
		font-size: 24px;
		margin-top: 5px;
		margin-bottom: 5px;
	}
	
	.grid-container {
		display: grid;
		grid-template-columns: auto auto auto auto;
		/*background-color: #2196F3;*/
		padding: 2px;
	}
	
	.grid-container > div {
		/*background-color: rgba(255, 255, 255, 0.8);*/
		text-align: center;
		padding: 2px;
		font-size: 30px;
	}
	
	.item1 {
		grid-row: 1;
		grid-column: 1 / span 3;
	}
	
	.item2 {
		grid-row: 2;
	}
	
	.item3 {
		grid-row: 3;
		grid-column: 1 / span 2;
	}
	
	.item4 {
		grid-row: 4;
		grid-column: 1 / span 2;
	}
	
	.item5 {
		grid-row: 5;
	}
	
	.itembio {
		grid-row: 2;
		grid-column: 1 / span 2;
	}
	img{
		border-radius: 25px;
	}
	</style>
</head>

<body style="background-color:#1c1c1c;">
	<div class="grid-container">
		<div class="item1">
			<div class="main-block">
				<div align="center">
				<?php
				session_start();
				require("config.php");
				$email = $_SESSION['user'];
				$connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
				try {
					$sql="SELECT player_position FROM RLManager WHERE email = '$email'";
					$db = new PDO($connection_string, $dbuser, $dbpass);
					$stmt = $db->prepare($sql);
					$stmt->execute();

					$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
					$i = 0;
					$grid = 2;
					$position = $result[0]['player_position'];

				}
				catch(Exception $e){
					echo $e->getMessage();
					exit();
				}
				if(isset($_SESSION['user'])) {
					//echo $_SESSION['user'];
					$GLOBALS['logged_in'] = true;
				} else {
					$GLOBALS['logged_in'] = false;
				}
					if($GLOBALS['logged_in']){
						echo '
							<form name="Cancel" method="POST">
								<div class="btn-block">
									<button type="submit" name="login" href="/">Login</button>
								</div>
							</form>
							<form name="Cancel" method="POST">
								<div class="btn-block">
									<button type="submit" name="register" href="/">Register</button>
								</div>
							</form>
							<form name="Cancel" method="POST">
								<div class="btn-block">
									<button type="submit" name="profile" href="/">Edit Profile</button>
								</div>
							</form>
							<form name="Cancel" method="POST">
								<div class="btn-block">
									<button type="submit" name="schedule" href="/">Edit Schedule</button>
								</div>
							</form>
							<form name="Cancel" method="POST">
								<div class="btn-block">
									<button type="submit" name="logout" href="/">Logout</button>
								</div>
							</form>
						';
						if( $position == 'Captain' || $position == 'GameManager'){
							echo '
							<form name="Cancel" method="POST">
								<div class="btn-block">
									<button type="submit" name="manager" href="/">Management</button>
								</div>
							</form>
							';
						}
					} else {
						echo '
							<form name="Cancel" method="POST">
								<div class="btn-block">
									<button type="submit" name="login" href="/">Login</button>
								</div>
							</form>
							<form name="Cancel" method="POST">
								<div class="btn-block">
									<button type="submit" name="register" href="/">Register</button>
								</div>
							</form>
						';
					}

				
				?>
				</div>
				<h1>Practice Times</h1>
				<div align="center">
					<?php
                require("config.php");
                echo "<table style='border: solid 1px black;'>";
                echo "<tr><th>Rank</th><th>Time Slots</th><th>Discord ID</th></tr>";

                class TableRows extends RecursiveIteratorIterator {
                    function __construct($it) {
                        parent::__construct($it, self::LEAVES_ONLY);
                    }

                    function current() {
                        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
                    }

                    function beginChildren() {
                        echo "<tr>";
                    }

                    function endChildren() {
                        echo "</tr>" . "\n";
                    }
                }

                $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";

                try {
                    $conn = new PDO($connection_string, $dbuser, $dbpass);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT g_rank, time_slot, discord FROM RLManager");
                    $stmt->execute();

                    // set the resulting array to associative
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                        echo $v;
                    }
                }
                catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $conn = null;
                echo "</table>";
            ?>
				</div>
			</div>
		</div>
		<div class="item2">
			<div class="grid-container">
				<div class="item2">
					<div class="card"> <img src="https://i.imgur.com/i7ltRDC.png" style="width: 100%;">
						<div class="grid-container">
							<div class="item1">
								<h1 style="font-size: 56px">Tacki</h1> </div>
							<div class="item3">
								<h2 style="color: #4d93d9">Division 1</h2>
								<h2 style="color: #2fcd73; margin-top: 0;">Captain</h2> <img src="https://rocketleague.tracker.network/Images/RL/ranked/s4-19.png" style="width:20%"> </div>
							<div class="item4">
								<h2 style="color: #ff00ea">Grand Champion</h2>
								<h3>Linked Accounts</h3> </div>
							<div class="itembio">
								<p style="font-size: 16px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sagittis eget mi eget venenatis. Proin faucibus bibendum euismod. Nullam a erat sed ligula fringilla lacinia. Nunc tristique pharetra dictum. Cras vel metus ut libero pulvinar tincidunt nec sit amet ante. </p>
							</div>
							<div class="item5">
								<div align="left" style="margin: 22px; vertical-align: middle;"> <a href="#"><i class="fa fa-steam"></i> player_steam</a>
									<br> <a href="#"><i class="fab fa-xbox"></i> player_xbl</a>
									<br> <a href="#"><i class="fab fa-playstation"></i> player_psn</a> </div>
							</div>
							<div class="item5">
								<div align="left" style="margin: 22px; vertical-align: middle;"> <a href="#"><i class="fa fa-twitter"></i> player_twitter</a>
									<br> <a href="#"><i class="fab fa-discord"></i> player_discord</a>
									<br> <a href="#"><i class="fa fa-twitch"></i> player_twitch</a>
									<br> <a href="#"><i class="far fa-envelope"></i> player_email</a> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
            require("config.php");
			include("common_functions.php");


            $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";

            try {
                $conn = new PDO($connection_string, $dbuser, $dbpass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM RLManager");
                $stmt->execute();

                // set the resulting array to associative
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$i = 0;
				$grid = 2;
				foreach($result as $row){
					echo "<br>";
					$discord = $row['discord'];
					$rank = $row['g_rank'];
					$email = $row['email'];
					$bio = $row['bio'];
					$display_name = $row['display_name'];
					$twitter = $row['twitter'];
					$twitch = $row['twitch'];
					$division = $row['player_division'];
					$position = $row['player_position'];
					$account_psn = $row['ps'];
					$account_steam = $row['steam'];
					$account_xbl = $row['xbox'];
					check_null($display_name, $discord, $rank, $email, $account_steam, $account_xbl, $account_psn, $twitter, $twitch, $email);
					// Pass this the players division, position and rank, also references to each color
					// assign_colors(p_division, p_position, p_rank, &c_division, &c_position, &c_rank);
					assign_colors($division, $position, $rank, $color_division, $color_position, $color_rank, $icon_rank);
					if( $i >= 2){
						$grid++;
						$i = 0;
					}
					$i++;
					echo "
						<div style='grid-row: $grid;'>
							<div class='grid-container'>
								<div class='item2'>
									<div class='card'> <img src='https://holmesbuilders.com/wp-content/uploads/2016/12/male-profile-image-placeholder.png' style='width:100%'>
										<div class='grid-container'>
											<div class='item1'>
												<h1 style='font-size: 56px'>$display_name</h1> </div>
											<div class='item3'>
												<h2 style='color: $color_division'>$division</h2>
												<h2 style='color: $color_position; margin-top: 0;'>$position</h2>
												<img src='$icon_rank' alt='$icon_rank' style='width:20%'>
											</div>
											<div class='item4'>
												<h2 style='color: $color_rank'>$rank</h2>
												<h3>Linked Accounts</h3> </div>
											<div class='itembio'>
												<p style='font-size: 16px'>$bio</p>
											</div>
											<div class='item5'>
												<div align='left' style='margin: 22px; vertical-align: middle;'>
													<a href='https://steamcommunity.com/id/$account_steam' target='_blank'><i class='fa fa-steam'></i> $account_steam</a>
													<br> <a href='#'><i class='fab fa-xbox'></i> $account_xbl</a>
													<br> <a href='#'><i class='fab fa-playstation'></i> $account_psn</a> </div>
											</div>
											<div class='item5'>
												<div align='left' style='margin: 22px; vertical-align: middle;'> 
													<a href='https://twitter.com/$twitter' target='_blank' ><i class='fa fa-twitter'></i> $twitter</a>
													<br> <a href='#' target='_blank' ><i class='fab fa-discord'></i> $discord</a>
													<br> <a href='https://twitch.tv/$twitch' target='_blank' ><i class='fa fa-twitch'></i> $twitch</a>
													<br> <a href='mailto:$email' target='_blank' ><i class='far fa-envelope'></i> $email</a> </div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						";
				}
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;

			

			

			function check_null(&...$args){	// This function will take any number of arguments as a reference and replace the string with "N/A" if its empty
				foreach( $args as &$arg)
					if(empty($arg))
						$arg = "N/A";
			}

        ?>
	</div>
</body>
<?php
    if(isset($_POST['logout'])){

    echo "<script type='text/javascript'> document.location = 'logout.php'; </script>";
    }
    if(isset($_POST['login'])){

        echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
    }
    if(isset($_POST['schedule'])){

        echo "<script type='text/javascript'> document.location = 'schedule.php'; </script>";
    }
    if(isset($_POST['register'])){

        echo "<script type='text/javascript'> document.location = 'register.php'; </script>";
    }
    if(isset($_POST['profile'])){

        echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
	}
	if(isset($_POST['manager'])){

        echo "<script type='text/javascript'> document.location = 'management.php'; </script>";
	}

	function function_alert($message) { 
		
		echo "<script>alert('$message');</script>"; 
	} 
	
?>