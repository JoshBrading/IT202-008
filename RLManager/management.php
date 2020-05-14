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
        align-items: center;
        
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
        $email = $_SESSION['user'];
        $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
        try {
            $sql="SELECT player_position FROM RLManager WHERE email = '$email'";
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
            <div class="main-block" style="width: 340px; height: 620px;">
                <h1>Team Management</h1>
                    <form name="profile_info" method="POST" align="center">
                        <hr>
                    ';
                    try {
                        $sql="SELECT email FROM RLManager";
                        $db = new PDO($connection_string, $dbuser, $dbpass);
                        $stmt = $db->prepare($sql);
                        $stmt->execute();
            
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        echo '
                        <label for="player">Pick a player:</label>
            
                        <select id="player">
                        ';
                        foreach( $result as $row){
                            foreach($row as $key => $val){
                                echo "<option value='$val'>$val</option>";
                            }
                        }
                        echo "</select>";  
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
                        <form name="profile_info" method="POST" align="center">
                            <hr>
                        ';
                        try {
                            $sql="SELECT email, player_division, g_rank FROM RLManager";
                            $db = new PDO($connection_string, $dbuser, $dbpass);
                            $stmt = $db->prepare($sql);
                            $stmt->execute();
                
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            echo '<p style="font-size: 24px;">Division 1</p><br>';
                            foreach( $result as $row){
                                $division = $row['player_division'];
                                $p_email = $row['email'];
                                $rank = $row['g_rank'];
                                $p_email = '    ' . $p_email;
                                assign_colors(NULL, NULL, $rank, $a, $b, $c_rank, $icon_rank);
                                
                                if($division == 'Division 1'){
                                    
                                    echo "
                                        <img src=$icon_rank height='20px' width='20px' >
                                        <p style='margin-bottom:20px;'>$p_email</p>

                                    ";
                                
                                }
                            
                            }
                            echo '<hr><p style="font-size: 24px;">Division 2</p><br>';
                            foreach( $result as $row){
                                $division = $row['player_division'];
                                $p_email = $row['email'];
                                $rank = $row['g_rank'];
                                $p_email = '    ' . $p_email;
                                assign_colors(NULL, NULL, $rank, $a, $b, $c_rank, $icon_rank);
                                
                                if($division == 'Division 2'){
                                    
                                    echo "
                                        <img src=$icon_rank height='20px' width='20px' >
                                        <p style='margin-bottom:20px;'>$p_email</p>

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
        }
        echo '
        <div style="grid-column: 1; grid-row: 2 / span 2;">
                <div class="main-block" style="width: 340px; max-height: 6000;">
                    <h1>All Players</h1>
                        <form name="profile_info" method="POST" align="center">
                            <hr>
                        ';
                        try {
                            $sql="SELECT email, g_rank FROM RLManager";
                            $db = new PDO($connection_string, $dbuser, $dbpass);
                            $stmt = $db->prepare($sql);
                            $stmt->execute();
                
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            foreach( $result as $row){
                                $p_email = $row['email'];
                                $rank = $row['g_rank'];

                                assign_colors(NULL, NULL, $rank, $a, $b, $c_rank, $icon_rank);
                                
                                    echo "
                                        <img src=$icon_rank height='20px' width='20px' >
                                        <p style='margin-bottom:20px;'>$p_email</p>

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

if(isset($_POST['home'])){

    echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
}
if(isset($_POST['login'])){

    echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}
?>