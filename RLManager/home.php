<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
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
            display:inline-block;
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
        tr:nth-child(even) {background-color: #1c1c1c;}
    </style>
</head>

<body style="background-color:#1c1c1c;">
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
</body>

</html>

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