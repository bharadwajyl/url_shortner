<?php
    @include_once("./root/db.php");
    if (isset($_GET["redirect"])){
        $url ="https://levioosa.000webhostapp.com/Shorten/". $_GET["redirect"];
        $redirect = $conn->query("SELECT l_url FROM gol_url WHERE s_url = '$url'");
        if ($redirect->num_rows > 0) {
            while($row = $redirect->fetch_assoc()) {
                header("location:".$row["l_url"]."");
            }
        } else {
            die("Link broken");
        }
    }
    
    //Default
    if (!isset($_COOKIE["gol_short"])){
        $links = '<li>No links has been generated yet.</li>'; 
    } else {
        $cookie = $_COOKIE["gol_short"];
        $links = "";
        $result = $conn->query("SELECT * FROM gol_url WHERE unique_id= '$cookie'"); 
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                    $links .='<li><a href="'.$row["s_url"].'" target="_blank">'.$row["s_url"].'</a> <i class="fa fa-trash" title="Delete" onclick="deletion('.$row["id"].')"></i></li>';
            } 
        } else {
            $links ='<li>No links has been generated yet.</li>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>

<!--TITLE-->
<title>Shorten URL</title>

<!--SHORTCUT ICON-->
<link rel="shortcut icon" href="assets/images/favicon.ico" />

<!--META TAGS-->
<meta charset="UTF-8" />
<meta name="language" content="ES" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

<!--FONT AWESOME-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--GOOGLE FONTS-->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" />

<!--PLUGIN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<!--STYLE SHEET-->
<link rel="stylesheet" href="assets/css/style.css" />

<body id="body">

<!--MAIN-->
<main>
    <form>
        <fieldset>
            <input type="url" name="url" maxlength="250" placeholder="Paste your url here" />
            <button type="submit" class="btn btn_1 shorten">Shorten</button>
        </fieldset>
    </form>
    <section class="result">
        <ol>
            <?php echo $links; ?>
        </ol>
    </section>
</main>

<!--JAVASCRIPT-->
<script type="text/javascript" src="assets/js/custom.js"></script>
</body>
</html>
