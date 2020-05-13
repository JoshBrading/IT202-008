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
		border-radius: 5px;
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
	</style>
</head>

<body style="background-color:#1c1c1c;">
	<div class="grid-container">
		<div class="item1">
			<div class="main-block">
				<div align="center">
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
							<button type="submit" name="rank" href="/">Update Rank</button>
						</div>
					</form>
					<form name="Cancel" method="POST">
						<div class="btn-block">
							<button type="submit" name="schedule" href="/">Update Schedule</button>
						</div>
					</form>
					<form name="Cancel" method="POST">
						<div class="btn-block">
							<button type="submit" name="logout" href="/">Logout</button>
						</div>
					</form>
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
					<div class="card"> <img src="https://i.imgur.com/i7ltRDC.png" style="width:100%">
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
					$division = 'Division 1';
					$position = 'Captain';
					check_null($discord, $rank, $email, $bio);
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
												<h1 style='font-size: 56px'>$discord</h1> </div>
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
													<a href='#'><i class='fa fa-steam'></i> $account_steam</a>
													<br> <a href='#'><i class='fab fa-xbox'></i> $account_xbl</a>
													<br> <a href='#'><i class='fab fa-playstation'></i> $account_psn</a> </div>
											</div>
											<div class='item5'>
												<div align='left' style='margin: 22px; vertical-align: middle;'> 
													<a href='#'><i class='fa fa-twitter'></i> $twitter</a>
													<br> <a href='#'><i class='fab fa-discord'></i> $discord</a>
													<br> <a href='#'><i class='fa fa-twitch'></i> $twitch</a>
													<br> <a href='#'><i class='far fa-envelope'></i> $email</a> </div>
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

			function assign_colors($p_division, $p_position, $p_rank, &$c_division, &$c_position, &$c_rank, &$icon_rank){

				$p_rank = parse_rank($p_rank);
				switch( $p_division ){
					case "Division 1":
						$c_division = '#4d93d9';
						break;
					case 'Division 2':
						$c_division = "#000000";
						break;
				}
				switch( $p_position ){
					case "Captain":
						$c_position = '#2fcd73';
						break;
					case 'Player':
						$c_position = "#000000";
						break;
					case 'GameManager':
						$c_position = "#000000";
						break;
				}
				switch( $p_rank ){
					case "GrandChampion":
						$c_rank = '#ff00ea';
						$icon_rank = 'images/GrandChamp.png';
						break;
					case 'ChampionIII':
						$icon_rank = "images/Champion3.png";
						$c_rank = '#a87ee6';
						break;
					case 'ChampionII':
						$icon_rank = "images/Champion2.png";
						$c_rank = '#a87ee6';
						break;
					case 'ChampionI':
						$icon_rank = "images/Champion1.png";
						$c_rank = '#a87ee6';
						break;
					case 'DiamondIII':
						$icon_rank = "images/Diamond3.png";
						$c_rank = '#a87ee6';
						break;
					case 'DiamondII':
						$icon_rank = "images/Diamond2.png";
						$c_rank = '#a87ee6';
						break;
					case 'DiamondI':
						$icon_rank = "images/Diamond1.png";
						$c_rank = '#a87ee6';
						break;
					case 'PlatinumIII':
						$icon_rank = "images/Platinum3.png";
						$c_rank = '#a87ee6';
						break;
					case 'PlatinumII':
						$icon_rank = "images/Platinum2.png";
						$c_rank = '#a87ee6';
						break;
					case 'PlatinumI':
						$icon_rank = "images/Platinum1.png";
						$c_rank = '#a87ee6';
						break;
					case 'GoldIII':
						$icon_rank = "images/Gold3.png";
						$c_rank = '#a87ee6';
						break;
					case 'GoldII':
						$icon_rank = "images/Gold2.png";
						$c_rank = '#a87ee6';
						break;
					case 'GoldI':
						$icon_rank = "images/Gold1.png";
						$c_rank = '#a87ee6';
						break;
					case 'SilverIII':
						$icon_rank = "images/Silver3.png";
						$c_rank = '#a87ee6';
						break;
					case 'SilverII':
						$icon_rank = "images/Silver2.png";
						$c_rank = '#a87ee6';
						break;
					case 'SilverI':
						$icon_rank = "images/Silver1.png";
						$c_rank = '#a87ee6';
						break;
					case 'BronzeIII':
						$icon_rank = "images/Bronze3.png";
						$c_rank = '#a87ee6';
						break;
					case 'BronzeII':
						$icon_rank = "images/Bronze2.png";
						$c_rank = '#a87ee6';
						break;
					case 'BronzeI':
						$icon_rank = "images/Bronze1.png";
						$c_rank = '#a87ee6';
						break;
					default:
						$icon_rank = "images/Unranked.png";
						$c_rank = '##666666';
				}
			}

			function parse_rank( $p_rank ){ // If the user automatically fetches their ranked data then we need to parse out the first two words
				$rank_pased = explode(" ", $p_rank);
				$rank_pased = str_replace('Division', '', $rank_pased);

				if($rank_pased[0] == ""){
					$rank_pased = $rank_pased[1] . $rank_pased[2];
					$rank_pased = preg_replace('/\s/', '', $rank_pased);
					return $rank_pased;
				}
				return $rank_pased[0] . $rank_pased[1];
			}

			function check_null(&...$args){	// This function will take any number of arguments as a reference and replace the string with "N/A" if its empty
				foreach( $args as &$arg)
					if( empty($arg) )
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
    if(isset($_POST['rank'])){

        echo "<script type='text/javascript'> document.location = 'linked_accounts.php'; </script>";
    }
?>