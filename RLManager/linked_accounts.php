<!DOCTYPE html>
<html>

<head>
    <title>Linked Account</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
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
        input,
        p {
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
            max-width: 340px;
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
            width: 100%;
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
    </style>
</head>

<body style="background-color:#1c1c1c;">
    <div class="main-block">
        <h1>Linked Account</h1>
        <form name="Linked_Account" method="POST">
            <hr>
            <div class="user_platform">
                <input type="radio" value="steam" id="steam" name="platform" checked/>
                <label for="steam" class="radio">Steam</label>
                <input type="radio" value="ps" id="ps4" name="platform" />
                <label for="ps4" class="radio">PS4</label>
                <input type="radio" value="xbox" id="xbox" name="platform" />
                <label for="xbox" class="radio">Xbox</label>
            </div>
            <hr>
            <label id="icon" for="name"><i class="fas fa-user"></i></label>
            <input type="text" name="username" id="username" placeholder="Username" autocomplete="new-password" required/>
            <p>*Enter in game name, not your login name.</p>
            <hr>
            <p>Change the game profile linked to your account, this can be changed again at any time.</p>
            <button type="submit" value="submit">Submit</button>
        </form>
        <hr>
        <form name="Refresh" method="POST">
            <div class="btn-block">
                <button type="submit" name="refresh" href="/">Refresh Ranked Data</button>
            </div>
        </form>
        <form name="Cancel" method="POST">
            <div class="btn-block">
                <button type="submit" name="cancel" href="/">Cancel</button>
            </div>
        </form>
    </div>
</body>

</html>

<?php
session_start();
if(isset($_POST['cancel'])){

    echo "<script type='text/javascript'> document.location = 'home.php'; </script>";
}
if(isset($_SESSION['user'])) {
  echo  $_SESSION['user'];

    if(isset($_POST['username']) && isset($_POST['pass'])){

        $pass = $_POST['pass'];
        $user = $_POST['username'];
        $platform = $_POST['platform'];

        if(strpos($user, ' ') != false) // Xbox users can have spaces in their name so we have to check for a space and then replace it
            $user = str_replace(" ","-",$user);

        $url = "https://rocketleague.tracker.network/profile/$platform/$user";

        $html = getHTML($url);
        cleanHTML($html);   
    }

    if(isset($_POST['refresh'] )){

    echo "afsrgaerheathearth";
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

        if(strpos($element, "Solo") !== false)            // 
        continue;                                       // If the player has a rank in solo 3v3 then continue
        if(strpos($element, "Standard") !== false){       //
        $str = $element;                                // If "Standard" is in the string $element then assign it to $str and break the loop
        break;                                          //
        }
    }

    $remove_these = [',', 'Standard v', '~'];           // We need to remove these characters to clean our text
    $str = str_replace($remove_these, '', $str);        // Remove the characters
    $str = explode('(', $str);                          // Break the string into an array (this should work for everyones stats I think?)
    $str = $str[0];                                     // We only need the first elemennt in the array
    echo $str;
    }
    function getHighestRank($html_block){ // return the highest rank and game mode with the highest rank

    }
}else{
    echo "You must login!";
  }

?>