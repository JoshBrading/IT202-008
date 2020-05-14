<?php
function assign_colors($p_division, $p_position, $p_rank, &$c_division, &$c_position, &$c_rank, &$icon_rank){

    //echo $p_division . ' ' .  $p_position . ' ' .  $p_rank . ' ' .  $c_division . ' ' .  $c_position . ' ' .  $c_rank . ' ' .  $icon_rank . '<br>';
    $p_rank = parse_rank($p_rank);
    if(!empty($p_division)){
        switch( $p_division ){
            case "Division 1":
                $c_division = '#4d93d9';
                break;
            case 'Division 2':
                $c_division = "#2fcd73";
                break;
        }
    }
    switch( $p_position ){
        case "Captain":
            $c_position = '#fc0303';
            break;
        case 'Player':
            $c_position = $c_division;
            break;
        case 'GameManager':
            $c_position = "#000000";
            break;
        case 'Admin':
            $c_position = "#fc0303";
            
    }
    
    if(!empty($p_rank)){
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
                $c_rank = '#0ba8ff';
                break;
            case 'DiamondII':
                $icon_rank = "images/Diamond2.png";
                $c_rank = '#0ba8ff';
                break;
            case 'DiamondI':
                $icon_rank = "images/Diamond1.png";
                $c_rank = '#0ba8ff';
                break;
            case 'PlatinumIII':
                $icon_rank = "images/Platinum3.png";
                $c_rank = '#a5f8ff';
                break;
            case 'PlatinumII':
                $icon_rank = "images/Platinum2.png";
                $c_rank = '#a5f8ff';
                break;
            case 'PlatinumI':
                $icon_rank = "images/Platinum1.png";
                $c_rank = '#a5f8ff';
                break;
            case 'GoldIII':
                $icon_rank = "images/Gold3.png";
                $c_rank = '#f4db45';
                break;
            case 'GoldII':
                $icon_rank = "images/Gold2.png";
                $c_rank = '#f4db45';
                break;
            case 'GoldI':
                $icon_rank = "images/Gold1.png";
                $c_rank = '#f4db45';
                break;
            case 'SilverIII':
                $icon_rank = "images/Silver3.png";
                $c_rank = '#c7c7c6';
                break;
            case 'SilverII':
                $icon_rank = "images/Silver2.png";
                $c_rank = '#c7c7c6';
                break;
            case 'SilverI':
                $icon_rank = "images/Silver1.png";
                $c_rank = '#c7c7c6';
                break;
            case 'BronzeIII':
                $icon_rank = "images/Bronze3.png";
                $c_rank = '#faa54e';
                break;
            case 'BronzeII':
                $icon_rank = "images/Bronze2.png";
                $c_rank = '#faa54e';
                break;
            case 'BronzeI':
                $icon_rank = "images/Bronze1.png";
                $c_rank = '#faa54e';
                break;
            default:
                $icon_rank = "images/Unranked_icon.png";
                $c_rank = '##666666';
        }
    }
    //echo $p_division . ' ' .  $p_position . ' ' .  $p_rank . ' ' .  $c_division . ' ' .  $c_position . ' ' .  $c_rank . ' ' .  $icon_rank;

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
function setVar(...$args){ // Im not really sure this is optimal but it makes setting variables very easy
    require("config.php");
    $email = $_SESSION['user'];
    $var = $args[0];
    $val = $args[1];
    if(!empty($args[2]))
        $email = $args[2];
    $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";


    try {
        $sql="UPDATE RLManager SET " . $var . " = '$val' WHERE email = '$email'";
        $db = new PDO($connection_string, $dbuser, $dbpass);
        $stmt = $db->prepare($sql);
        $stmt->execute();
        //echo "<pre>" . print_r($stmt->errorInfo(), true) . "</pre>";
    }
    catch(Exception $e){
        echo $e->getMessage();
        exit();
    }
}
function setAllVar($var, $value){ // This could be merged with the above function in the future
    require("config.php");
    $connection_string = "mysql:host=$dbhost;dbname=$dbdatabase;charset=utf8mb4";
    try {
        $sql="UPDATE RLManager SET " . $var . " = '$value'";
        $db = new PDO($connection_string, $dbuser, $dbpass);
        $stmt = $db->prepare($sql);
        $stmt->execute();
        //echo "<pre>" . print_r($stmt->errorInfo(), true) . "</pre>";
    }
    catch(Exception $e){
        echo $e->getMessage();
        exit();
    }
}
?>