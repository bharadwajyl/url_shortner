<?php
switch ($_POST["FormType"]) {
    case "shortenurl":
        Gol::Shorten(''.$_POST['url'].'');
        break;
     case "urldeletion":
        Gol::Deletion(''.$_POST['id'].'', ''.$_POST['unique'].'');
        break;
    default:
        die("Not Allowed");
        break;
}


class Gol{
    public function Shorten($url){
        if (! filter_var($url, FILTER_VALIDATE_URL)) {
            print_r("Invalid url");
            return 1;
        }
        
        //Set cookie
        if (!isset($_COOKIE["gol_short"])){
            $unique = "gol_".rand();
            setcookie("gol_short", $unique, time() + (86400 * 30), "/");
        } else {
            $unique = $_COOKIE["gol_short"];
        }
        
        //Generate alphanumerical value
        function alphanumeric($len){
            $mix = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            return substr(str_shuffle($mix), 0, $len);
        }
        $alpha = alphanumeric(13);
        
        //compress url
        $c_url = "https://".$_SERVER['REQUEST_URI']."$alpha";
        
        //DB
        @include_once("db.php");
        if ($conn->query("SELECT * FROM gol_url WHERE unique_id = '$unique'")->num_rows < 3 && $conn->query("INSERT INTO gol_url (l_url, s_url, unique_id) VALUES ('$url', '$c_url', '$unique')") === TRUE) {
            print_r("success");
        } else {
            print_r("Restricted to 3 urls only");
        }
    }
    
    public function Deletion($id, $unique){
        @include_once("db.php");
        $unique = $_COOKIE["gol_short"];
        $conn->query("DELETE FROM gol_url WHERE id = $id AND unique_id = '$unique'") === TRUE ? print_r("success") : print_r("Try again");
    }
}
?>
