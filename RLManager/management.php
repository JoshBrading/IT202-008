<!DOCTYPE html>
<html>

<head>
	<title>Team Management</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	<script src="https://kit.fontawesome.com/2dc30c3b9c.js" crossorigin="anonymous"></script>
	<style>
	html,
	body {

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
        width: 1020px;
        justify-items: center;
        align-items: top;
        
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
<div align="center">
    <div class="grid-container">
    <?php
        session_start();
        require("config.php");
        include("common_functions.php");
        $display_name = $_SESSION['user'];
        $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
        try {
            $sql="SELECT player_position FROM RLManager WHERE display_name = '$display_name'";
            $db = new PDO($connection_string, $dbuser, $dbpass);
            $stmt = $db->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $position = $result[0]['player_position'];
        }
        catch(Exception $e){
            echo $e->getMessage();
            exit();
        }
        
        if(!isset($_SESSION['user']) && $position != 'Captain') {
           Echo '<div style="grid-column: 1 / span 3; grid-row: 2 / span 2;">
           <div class="main-block">
               <h1>Access Denied</h1>
                <p style="padding: 30px;">Either you are not logged in or you are missing the required permissions to access this page.</p>
           </div>
       </div>
       ';
        }else{
            
        echo '
    <div style="grid-column: 2; grid-row: 2 / span 2;">
            <div class="main-block" style="width: 340px; max-height: 6000px;">
                <h1>Team Management</h1>
                    <form name="profile_info" method="POST" align="center">
                        <hr>
                    ';
                    try {
                        $sql="SELECT email, display_name FROM RLManager";
                        $db = new PDO($connection_string, $dbuser, $dbpass);
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
            
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        echo '
                        <label for="player">Pick a player:</label>
            
                        <select name="player">
                        ';
                        foreach( $result as $row){
                            $val = $row['display_name'];
                            if( empty($val))
                                $val = $row['email'];

                                echo "<option value='$val'>$val</option>";
                            
                        }
                        echo "</select>";  

                        echo '<br><br>
                        <input type="radio" value="Division 1" id="div1" name="team" checked/>
                        <label for="div1" class="radio">Div 1</label>
                        <input type="radio" value="Division 2" id="div2" name="team" />
                        <label for="div2" class="radio">Div 2</label>
                        <input type="radio" value="none" id="none" name="team" />
                        <label for="none" class="radio">None</label>

                        <div>

                        <div class="btn-block">
                            <button type="submit" name="submit_team">Submit</button>
                        </div>

                        </div>
                        <hr>
                        <div>
                        <form name="home" method="POST">
                            <div class="btn-block">
                                <button type="submit" name="clear">Clear Teams</button>
                            </div>
                        </form>
                        </div>
                        ';
                    }
                    catch(Exception $e){
                        echo $e->getMessage();
                        exit();
                    }
                    echo '
                    </form>
            </div>
        </div>
        
        ';
        echo '
        <div style="grid-column: 3; grid-row: 2 / span 2;">
                <div class="main-block" style="width: 340px; max-height: 6000;">
                    <h1>Current Teams</h1>
                        <form name="profile_info" method="POST" align="top">
                            <hr>
                        ';
                        try {
                            $sql="SELECT email, display_name, player_division, g_rank FROM RLManager";
                            $db = new PDO($connection_string, $dbuser, $dbpass);
                            $stmt = $db->prepare($sql);
                            $stmt->execute();
                
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            echo '<p style="font-size: 24px;">Division 1</p><br>';
                            foreach( $result as $row){
                                $division = $row['player_division'];
                                $p_display_name = $row['display_name'];
                                $rank = $row['g_rank'];
                                if(empty($p_display_name))
                                    $p_display_name = $row['email'];
                                assign_colors(NULL, NULL, $rank, $a, $b, $c_rank, $icon_rank);
                                
                                if($division == 'Division 1'){
                                    
                                    echo "
                                        <img src=$icon_rank height='20px' width='20px' >
                                        <p style='margin-bottom:20px;'>$p_display_name</p>

                                    ";
                                
                                }
                            
                            }
                            echo '<hr><p style="font-size: 24px;">Division 2</p><br>';
                            foreach( $result as $row){
                                $division = $row['player_division'];
                                $p_display_name = $row['display_name'];
                                $rank = $row['g_rank'];
                                if(empty($p_display_name))
                                    $p_display_name = $row['email'];

                                assign_colors(NULL, NULL, $rank, $a, $b, $c_rank, $icon_rank);
                                
                                if($division == 'Division 2'){
                                    
                                    echo "
                                        <img src=$icon_rank height='20px' width='20px' >
                                        <p style='margin-bottom:20px;'>$p_display_name</p>

                                    ";
                                
                                }
                            
                            }
                             
                        }
                        catch(Exception $e){
                            echo $e->getMessage();
                            exit();
                        }
                        echo '
                        </form>
                </div>
            </div>
            
            ';
        
        echo '
        <div style="grid-column: 1; grid-row: 2 / span 2;">
                <div class="main-block" style="width: 340px; max-height: 6000;">
                    <h1>All Players</h1>
                        <form name="profile_info" method="POST" align="center">
                            <hr>
                        ';
                        try {
                            $sql="SELECT email, display_name, g_rank FROM RLManager";
                            $db = new PDO($connection_string, $dbuser, $dbpass);
                            $stmt = $db->prepare($sql);
                            $stmt->execute();
                
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            foreach( $result as $row){
                                $p_display_name = $row['display_name'];
                                $rank = $row['g_rank'];
                                if(empty($p_display_name))
                                    $p_display_name = $row['email'];
                                assign_colors(NULL, NULL, $rank, $a, $b, $c_rank, $icon_rank);
                                
                                    echo "
                                        <img src=$icon_rank height='20px' width='20px' >
                                        <p style='margin-bottom:20px;'>$p_display_name</p>

                                    ";
                            }   
                        }
                        catch(Exception $e){
                            echo $e->getMessage();
                            exit();
                        }
                        echo '
                        </form>
                </div>
            </div>
            
            ';
        }
        
        echo '
        <div style="grid-column: 1 / span 3; grid-row: 1;">
            <div class="main-block" style="max-width:680 px; max-height: 150px;">
                <h1>Navigation</h1>
                <div class="grid-container" align="center" style="padding: 0px;">
                    <div style="grid-column: 1;">
                    <form name="home" method="POST">
                        <div class="btn-block">
                            <button type="submit" name="home">Home</button>
                        </div>
                    </form>
                    </div>
                    ';
                    if(!isset($_SESSION['user'])) {
                        echo '
                    <div style="grid-column: 2;">
                    <form name="home" method="POST">
                        <div class="btn-block">
                            <button type="submit" name="login">Login</button>
                        </div>
                    </form>
                    </div>
                    ';
                    }else{
                        echo '
                    <div style="grid-column: 2;">
                    <form name="home" method="POST">
                        <div class="btn-block">
                            <button type="submit" name="refresh">Refresh</button>
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
                    ';
                    }
                    echo '
                </div>
            </div>
        </div>
        ';
        ?>
    </div>
</div>
</body>
</html>
<?php

if(isset($_POST['home']))
    echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
if(isset($_POST['login']))
    echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
if(isset($_POST['clear'])){
    setAllVar('player_division', '');
    echo "<script type='text/javascript'> document.location = 'management.php'; </script>";
}
if(isset($_POST['refresh']))
    echo "<script type='text/javascript'> document.location = 'management.php'; </script>";
if(isset($_POST['logout']))
    echo "<script type='text/javascript'> document.location = 'logout.php'; </script>";
if(isset($_POST['submit_team'])){
    $team = $_POST['team'];
    $email = $_POST['player'];
    if(!strpos($email, '@') && !strpos($email, '@')){
        $sql="SELECT email FROM RLManager WHERE display_name = '$email'";
        $db = new PDO($connection_string, $dbuser, $dbpass);
        $stmt = $db->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
     
        $email = $result[0]['email'];
    }
    if($team == 'none')
        $team = '';
    setVar('player_division', $team, $email);
    echo "<script type='text/javascript'> document.location = 'management.php'; </script>";

}

?>