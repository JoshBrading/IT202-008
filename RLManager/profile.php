<!DOCTYPE html>
<html>

<head>
	<title>Profile</title>
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
	form,
    input,
    textarea,
	p {
		padding: 0;
		margin: 0;
		outline: none;
		font-family: Roboto, Arial, sans-serif;
		font-size: 16px;
		color: #e8e8e8;
	}
	
	h1 {
		font-size: 32px;
		font-weight: 300;
		text-align: center;
	}
	
	.main-block {
		height: 620px;
		padding: 10px 0;
		margin: auto;
		border-radius: 25px;
		border: solid 1px #ccc;
		box-shadow: 1px 2px 5px rgba(0, 0, 0, .31);
		background: #2e2e2e;
	}
	
	form {
		margin: 0 30px;
	}
	
	input[type=radio] {
		display: none;
    }
    
	label.radio {
		position: relative;
		display: inline-block;
		padding-top: 4px;
		margin-right: 20px;
		text-indent: 30px;
		overflow: visible;
		cursor: pointer;
	}
	
	label.radio:before {
		content: "";
		position: absolute;
		top: 2px;
		left: 0;
		width: 20px;
		height: 20px;
		border-radius: 50%;
		background: #c20000;
	}
	
	label.radio:after {
		content: "";
		position: absolute;
		width: 9px;
		height: 4px;
		top: 8px;
		left: 4px;
		border: 3px solid #e9e9e9;
		border-top: none;
		border-right: none;
		transform: rotate(-45deg);
		opacity: 0;
	}
	
	input[type=radio]:checked + label:after {
		opacity: 1;
	}
	
	input[type=text],
	input[type=password] {
		width: calc(100% - 57px);
		height: 36px;
		margin: 13px 0 0 -5px;
		padding-left: 10px;
		border-radius: 0 5px 5px 0;
		border: solid 1px #cbc9c9;
		box-shadow: 1px 2px 5px rgba(0, 0, 0, .09);
		background: #2e2e2e;
	}

	
	.btn-block {
		margin-top: 10px;
		text-align: center;
	}
	
	button {
		width: 280px;
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
	
	.grid-container {
		display: grid;
		/*grid-template-columns: auto auto auto auto;
		background-color: #2196F3;
        */ padding: 20px;
        
	}
	
	.grid-container > div {
		/*background-color: rgba(255, 255, 255, 0.8);
		*/ text-align: center;
		padding: 2px;
		font-size: 30px;
	}
	</style>
</head>

<body style="background-color:#1c1c1c;">
    <div class="grid-container" align="center">
    <div style="grid-column: 2; grid-row: 2 / span 2;">
            <div class="main-block" style="width: 340px;">
                <h1>Basic Information</h1>
                    <form name="profile_info" method="POST" align="center">
                        <hr>
                        <br>
                        <p>Display Name</p>
                        <input type="text" name="username" id="username" placeholder="Display Name" style="display: inline-block;" />
                        <br>
                        <br>
                        <p style="msrgin-top: 10px;">Bio</p>
                        <textarea id="w3mission" maxlength="256" rows="6" cols="30" style="resize: none; background-color: #2e2e2e; margin-top: 10px;" placeholder=" 256 characters about yourself!"></textarea>
                    
                        <i class="fa fa-twitter" style="margin-right: 10px;"></i>
                        <input type="text" name="twitter" id="twitter" placeholder="Twitter" style="display: inline-block;" />
                        <i class="fab fa-discord" style="margin-right: 10px;"></i>
                        <input type="text" name="discord" id="discord" placeholder="Discord" style="display: inline-block;" />
                        <i class="fab fa-twitch" style="margin-right: 10px;"></i>
                        <input type="text" name="twitch" id="twitch" placeholder="Twitch" style="display: inline-block;" />
                        <br>
                        <br>
                        <button type="submit" name="save">Save Changes</button>
                    </form>
            </div>
        </div>
        <div style="grid-column: 3; grid-row: 2 / span 2; ">
            <div class="main-block" style="width: 340px;">
                <h1>Linked Account</h1>
                <form name="Linked_Account" method="POST" align="center">
                    <hr>
                    <br>
                    <div class="user_platform">
                        <input type="radio" value="steam" id="steam" name="platform" checked/>
                        <label for="steam" class="radio">Steam</label>
                        <input type="radio" value="ps" id="ps4" name="platform" />
                        <label for="ps4" class="radio">PS4</label>
                        <input type="radio" value="xbox" id="xbox" name="platform" />
                        <label for="xbox" class="radio">Xbox</label>
                    </div>
                    <br>
                    <input type="text" name="username" id="username" placeholder="Username" />
                    <p style="margin-top: 10px;">Automatically fetch your rank.</p>
                    <button type="submit" name="submit">Submit</button>
                </form>
                <form name="manual" method="POST" align="left">
                    <br>
                    
                    <hr>
                    <br>
                    <p align="center" style="margin-bottom: 5px;">Manually enter your rank.</p>
                    <input type="radio" value="Grand Champion" id="Grand Champion" name="rank" checked/>
                    <label for="grand champion" class="radio">Grand Champion</label>
                    <input type="radio" value="Champion 3" id="Champion 3" name="rank" />
                    <label for="Champion 3" class="radio">Champion 3</label>
                    <input type="radio" value="Champ 2 or lower" id="Champ 2 or lower" name="rank" />
                    <label for="Champ 2 or lower" class="radio">Champ 2 or lower</label>
                    <br>
                    <br>
                    <button type="submit" name="submitManual">Submit</button>
                    <br>
                    <br>
                    <hr>
                    <br>
                    <p align="center">Auto fetching your rank will link your game account to your profile.</p>
                </form>
            </div>
        </div>

        <div style="grid-column: 1; grid-row: 2;">
            <div class="main-block" style="width: 340px;">
                <h1>Security</h1>
                <form name="change_email" method="POST" align="center">
                    <hr>
                    <br>
                    <p>Change Email</h>
                    <br>
                    <i class="far fa-envelope" style="margin-right: 10px;"></i>
                    <input type="text" name="email" id="email" placeholder="New Email" style="display: inline-block;" />
                    <i class="fas fa-lock" style="margin-right: 10px;"></i>
                    <input type="password" name="password" id="password" placeholder="Password" style="display: inline-block;" />
                    <br>
                    <br>
                    <button type="submit" name="save">Save Changes</button>
                </form>

                
                <form name="change_password" method="POST" align="center">
                    <br>
                    <hr>
                    <br>
                    <p>Change Password</h>
                    <br>
                    <i class="fas fa-unlock" style="margin-right: 10px;"></i>
                    <input type="password" name="email" id="email" placeholder="Old Password" style="display: inline-block;" />
                    <i class="fas fa-lock" style="margin-right: 10px;"></i>
                    <input type="password" name="password" id="password" placeholder="New Password" style="display: inline-block;" />
                    <i class="fas fa-lock" style="margin-right: 10px;"></i>
                    <input type="password" name="password" id="password" placeholder="Retype Password" style="display: inline-block;" />
                    <br>
                    <br>

                    <button type="submit" name="save">Save Changes</button>
                </form>
            </div>
        </div>

        <div style="grid-column: 1 / span 3; grid-row: 1;">
            <div class="main-block" style="max-width=9000px; max-height: 150px;">
                <h1>Navigation</h1>
                <div class="grid-container" align="center" style="padding: 0px;">
                    <div style="grid-column: 1;">
                    <form name="home" method="POST">
                        <div class="btn-block">
                            <button type="submit" name="home">Home</button>
                        </div>
                    </form>
                    </div>
                    <div style="grid-column: 3;">
                    <form name="home" method="POST">
                        <div class="btn-block">
                            <button type="submit" name="logout">Logout</button>
                        </div>
                    </form>
                    </div>
                    <div style="grid-column: 5;">
                    <form name="home" method="POST">
                        <div class="btn-block">
                            <button type="submit" name="Edit Schedule">Edit Schedule</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
session_start();
if(isset($_POST['home'])){

    echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
}

  //echo  $_SESSION['user'];

    if(isset($_POST['username'])){
        //echo $_POST['username'];
        $pass = $_POST['pass'];
        $user = $_POST['username'];
        $platform = $_POST['platform'];

        if(strpos($user, ' ') != false) // Xbox users can have spaces in their name so we have to check for a space and then replace it
            $user = str_replace(" ","-",$user);

        $url = "https://rocketleague.tracker.network/profile/$platform/$user";

        $html = getHTML($url);
        cleanHTML($html);   
    }else if(isset($_POST['rank'])){
        //echo "ranks";
        $g_rank = $_POST['rank'];
        setRank($g_rank);
    }

    function getHTML($site_url) // Gets the html of https://rocketleague.tracker.network/profile/$platform/$user
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $site_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close ($ch);
        return htmlentities($result);
    }

    function cleanHTML($html_block){ // Sorta cleans up the html, at least it gets us a code block where all our data is stored

    $split = explode("Un-Ranked", explode("Hoops", $html_block)[0])[1]; // Extract the code block we need
    $split = html_entity_decode($split);                                // yea... 
    $split = strip_tags($split);                                        // Removes all the html tags from the code block
    getStandardRank($split);
    }

    function getStandardRank($html_block){ // returns the users 3v3 rank

    // Example $html_block: Ranked Standard 3v3 <small style="display:block; font-size:10px; color:gray"> Champion II Division IV </small>

    $str = preg_replace('/[0-9]+/', '', $html_block); // remove the numbers from the string
    $str = explode('Ranked', $str); // break the string into an array

    foreach($str as $element) {                         // Checking for players rank in 3v3

        if(strpos($element, "Solo") !== false)          // 
        continue;                                       // If the player has a rank in solo 3v3 then continue
        if(strpos($element, "Standard") !== false){     //
        $str = $element;                                // If "Standard" is in the string $element then assign it to $str and break the loop
        break;                                          //
        }
    }

    $remove_these = [',', 'Standard v', '~'];           // We need to remove these characters to clean our text
    $str = str_replace($remove_these, '', $str);        // Remove the characters
    $str = explode('(', $str);                          // Break the string into an array (this should work for everyones stats I think?)
    $str = $str[0];                                     // We only need the first elemennt in the array


    if( strpos( $str, 'Grand' ) !== false)              // If the player has the word grand in the rank then they have to be grand champion
        $str = 'Grand Champion';                         // Setting str to grand champion so we dont actually have to strip away stuff
        
    setRank($str);
    }
    function setRank($rank){ // return the highest rank and game mode with the highest rank
        //echo $rank;
        require("config.php");
        $email = $_SESSION['user'];
		$connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
		try {
            $sql="UPDATE RLManager SET g_rank = '$rank' WHERE email = '$email'";
			$db = new PDO($connection_string, $dbuser, $dbpass);
			$stmt = $db->prepare($sql);
			$stmt->execute();
			echo "<pre>" . print_r($stmt->errorInfo(), true) . "</pre>";
		}
		catch(Exception $e){
			echo $e->getMessage();
			exit();
		}
    }

?>