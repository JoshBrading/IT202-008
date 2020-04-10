<!DOCTYPE html>
<html>

<head>
    <title>Schedule</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <style>
        html, body {
            display: flex;
            justify-content: center;
            height: 100%;
        }
        
        body, div, h1, form, input, p {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Roboto, Arial, sans-serif;
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
        }
        
        .user_platform {
            margin: 15px 0;
        }
        
        input[type=radio] {
            display: none;
        }
        
        label#icon {
            margin: 0;
            border-radius: 5px 0 0 5px;
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
        
        input[type=text], input[type=password] {
            width: calc(100% - 57px);
            height: 36px;
            margin: 13px 0 0 -5px;
            padding-left: 10px;
            border-radius: 0 5px 5px 0;
            border: solid 1px #cbc9c9;
            box-shadow: 1px 2px 5px rgba(0, 0, 0, .09);
            background: #2e2e2e;
        }
        
        input[type=password] {
            margin-bottom: 15px;
        }
        
        #icon {
            display: inline-block;
            padding: 9.3px 15px;
            box-shadow: 1px 2px 5px rgba(0, 0, 0, .09);
            background: #c20000;
            color: #e9e9e9;
            text-align: center;
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

        table, th, td {
            border-collapse: collapse;
            text-align: center;
            border: 1px solid white;
            padding: 5px;
            width: 1000px;
        }
        input.boxes{
            width: 40px;
            height: 40px;
        }
        tr:nth-child(even) {background-color: #1c1c1c;}
    </style>
</head>

<body style="background-color:#1c1c1c;">
    <div class="main-block">
        <h1>Schedule</h1>
        <p align="center">Check off your available times</p>
        <div align="center">
            <form method="post">
                <table>
                    <tr>
                        <th></th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                        <th>Sun</th>
                    </tr>
                    <tr>
                        <!-- This is about to get really wack and inneficient but I'm runing out of time so it is what it is -->
                        <td>8:00 AM<br>-------------------<br>9:00 AM</td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="8-9am Mon"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="8-9am Tue"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="8-9am Wed"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="8-9am Thu"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="8-9am Fri"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="8-9am Sat"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="8-9am Sun"></td>
                    </tr>
                    <tr>
                        <td>9:00 AM<br>-------------------<br>10:00 AM</td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="9-10am Mon"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="9-10am Tue"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="9-10am Wed"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="9-10am Thu"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="9-10am Fri"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="9-10am Sat"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="9-10am Sun"></td>
                    </tr>
                    <tr>
                        <td>10:00 AM<br>-------------------<br>11:00 AM</td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="10am Mon"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="10am Tue"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="10am Wed"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="10am Thu"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="10am Fri"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="10am Sat"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="10am Sun"></td>
                    </tr>
                    <tr>
                        <td>11:00 AM<br>-------------------<br>12:00 AM</td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="11-12pm Mon"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="11-12pm Tue"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="11-12pm Wed"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="11-12pm Thu"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="11-12pm Fri"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="11-12pm Sat"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="11-12pm Sun"></td>
                    </tr>
                    <tr>
                        <td>12:00 PM<br>-------------------<br>1:00 PM</td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="12-2pm Mon"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="12-2pm Tue"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="12-2pm Wed"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="12-2pm Thu"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="12-2pm Fri"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="12-2pm Sat"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="12-2pm Sun"></td>
                    </tr>
                    <tr>
                        <td>1:00 PM<br>-------------------<br>2:00 PM</td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="1-2pm Mon"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="1-2pm Tue"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="1-2pm Wed"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="1-2pm Thu"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="1-2pm Fri"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="1-2pm Sat"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="1-2pm Sun"></td>
                    </tr>
                    <tr>
                        <td>2:00 PM<br>-------------------<br>3:00 PM</td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="2-3pm Mon"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="2-3pm Tue"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="2-3pm Wed"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="2-3pm Thu"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="2-3pm Fri"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="2-3pm Sat"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="2-3pm Sun"></td>
                    </tr>
                    <tr>
                        <td>3:00 PM<br>-------------------<br>4:00 PM</td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="3-4pm Mon"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="3-4pm Tue"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="3-4pm Wed"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="3-4pm Thu"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="3-4pm Fri"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="3-4pm Sat"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="3-4pm Sun"></td>
                    </tr>
                    <tr>
                        <td>4:00 PM<br>-------------------<br>5:00 PM</td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="4-5pm Mon"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="4-5pm Tue"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="4-5pm Wed"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="4-5pm Thu"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="4-5pm Fri"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="4-5pm Sat"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="4-5pm Sun"></td>
                    </tr>
                    <tr>
                        <td>5:00 PM<br>-------------------<br>6:00 PM</td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="5-6pm Mon"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="5-6pm Tue"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="5-6pm Wed"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="5-6pm Thu"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="5-6pm Fri"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="5-6pm Sat"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="5-6pm Sun"></td>
                    </tr>
                    <tr>
                        <td>6:00 PM<br>-------------------<br>7:00 PM</td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="6-7pm Mon"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="6-7pm Tue"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="6-7pm Wed"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="6-7pm Thu"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="6-7pm Fri"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="6-7pm Sat"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="6-7pm Sun"></td>
                    </tr>
                    <tr>
                        <td>7:00 PM<br>-------------------<br>8:00 PM</td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="7-8pm Mon"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="7-8pm Tue"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="7-8pm Wed"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="7-8pm Thu"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="7-8pm Fri"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="7-8pm Sat"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="7-8pm Sun"></td>
                    </tr>
                    <tr>
                        <td>8:00 PM<br>-------------------<br>9:00 PM</td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="8-9pm Mon"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="8-9pm Tue"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="8-9pm Wed"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="8-9pm Thu"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="8-9pm Fri"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="8-9pm Sat"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="8-9pm Sun"></td>
                    </tr>
                    <tr>
                        <td>9:00 PM<br>-------------------<br>10:00 PM</td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="9-10pm Mon"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="9-10pm Tue"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="9-10pm Wed"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="9-10pm Thu"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="9-10pm Fri"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="9-10pm Sat"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="9-10pm Sun"></td>
                    </tr>
                    <tr>
                        <td>10:00 PM<br>-------------------<br>11:00 PM</td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="10-11pm Mon"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="10-11pm Tue"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="10-11pm Wed"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="10-11pm Thu"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="10-11pm Fri"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="10-11pm Sat"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="10-11pm Sun"></td>
                    </tr>
                    <tr>
                        <td>11:00 PM<br>-------------------<br>12:00 AM</td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="11-12pm Mon"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="11-12pm Tue"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="11-12pm Wed"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="11-12pm Thu"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="11-12pm Fri"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="11-12pm Sat"></td>
                        <td><input type="checkbox" class="boxes" name="time_day[]" value="11-12pm Sun"></td>
                </table>
                <div class="btn-block">
                    <button type="submit" name="Submit" href="/">Submit</button>
                </div>
            </form>
            <form name="Cancel" method="POST">
                <div class="btn-block">
                    <button type="submit" name="cancel" href="/">Go Back</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<?php
session_start();
if(isset($_POST['cancel'])){

    echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
}
if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    echo $_SESSION['user'];
    if(!empty($_POST['time_day'])) {

        $time_slot = "";
        foreach($_POST['time_day'] as $time){
            $time_slot .= "$time ";
            $time_slot .= "";
        }
        echo $time_slot;
		require("config.php");
		$connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
		try {
            $sql="UPDATE RLManager SET time_slot = '$time_slot' WHERE email = '$user'";
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
}
?>