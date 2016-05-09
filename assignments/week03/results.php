<?php
session_start();
if (isset($_POST["isSubmitted"])) {
  $_SESSION["submission"] = "done";
}
$red = $orng = $ylw = $grn = $blu = $vlt = 0;
$grs = $fire = $wtr = $van = $chok = $strbry = 0;
$yes = $no = 0;

//session_unset();
//session_destroy();

$myfile = fopen("results.txt", "r") or die("Unable to open file!");
  if (!feof($myfile))
    $red = fgets($myfile);
  if (!feof($myfile))
    $orng = fgets($myfile);
  if (!feof($myfile))
    $ylw = fgets($myfile);
  if (!feof($myfile))
    $grn = fgets($myfile);
  if (!feof($myfile))
    $blu = fgets($myfile);
  if (!feof($myfile))
    $vlt = fgets($myfile);
  if (!feof($myfile))
    $grs = fgets($myfile);
  if (!feof($myfile))
    $fire = fgets($myfile);
  if (!feof($myfile))
    $wtr = fgets($myfile);
  if (!feof($myfile))
    $van = fgets($myfile);
  if (!feof($myfile))
    $chok = fgets($myfile);
  if (!feof($myfile))
    $strbry = fgets($myfile);
  if (!feof($myfile))
    $yes = fgets($myfile);
  if (!feof($myfile))
    $no = fgets($myfile);
  fclose($myfile);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["color"]))
    $color = test_input($_POST["color"]);
  else
    $color = "";
  if (isset($_POST["starter"]))
    $starter = test_input($_POST["starter"]);
  else
    $starter = "";
  if (isset($_POST["icream"]))
    $icream = test_input($_POST["icream"]);
  else
    $icream = "";
  if (isset($_POST["seafood"]))
    $seafood = test_input($_POST["seafood"]);
  else
    $seafood = "";

  if ($color == "red")
    $red += 1;
  if ($color == "orng")
    $orng += 1;
  if ($color == "ylw")
    $ylw += 1;
  if ($color == "grn")
    $grn += 1;
  if ($color == "blu")
    $blu += 1;
  if ($color == "vlt")
    $vlt += 1;
  if ($starter == "Grass")
    $grs += 1;
  if ($starter == "Fire")
    $fire += 1;
  if ($starter == "Water")
    $wtr += 1;
  if ($icream == "van")
    $van += 1;
  if ($icream == "choc")
    $chok += 1;
  if ($icream == "strwbry")
    $strbry += 1;
  if ($seafood == "yes")
    $yes += 1;
  if ($seafood == "no")
    $no += 1;

  $myfile = fopen("results.txt", "w") or die("Unable to open file!");
  
  fwrite($myfile, (string)$red.PHP_EOL);
  fwrite($myfile, (string)$orng.PHP_EOL);
  fwrite($myfile, (string)$ylw.PHP_EOL);
  fwrite($myfile, (string)$grn.PHP_EOL);
  fwrite($myfile, (string)$blu.PHP_EOL);
  fwrite($myfile, (string)$vlt.PHP_EOL);
  fwrite($myfile, (string)$grs.PHP_EOL);
  fwrite($myfile, (string)$fire.PHP_EOL);
  fwrite($myfile, (string)$wtr.PHP_EOL);
  fwrite($myfile, (string)$van.PHP_EOL);
  fwrite($myfile, (string)$chok.PHP_EOL);
  fwrite($myfile, (string)$strbry.PHP_EOL);
  fwrite($myfile, (string)$yes.PHP_EOL);
  fwrite($myfile, (string)$no.PHP_EOL);
  fclose($myfile);
}

$cTotal = $red + $orng + $ylw + $grn + $blu + $vlt;
$stTotal = $grs + $fire + $wtr;
$iTotal = $van + $chok + $strbry;
$seTotal = $yes + $no;

function test_input($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

function percent($item, $total) {
  if ($total == 0)
    echo "0";
  else
    echo ($item/$total*100);
}

?>

<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <title>Week 03</title>
</head>
<body>
  <?php if (isset($_SESSION["submission"])) { ?>
    <h4>Thank you for taking the survey.</h4>
  <?php } ?>
  <div id="results">
    <h2>Survey Results:</h2>
    <h3>Favorite Color:</h3>    
    <ul>
      <li>Red: <?php percent($red, $cTotal); ?>%</li>
      <li>Orange: <?php percent($orng, $cTotal); ?>%</li>
      <li>Yellow: <?php percent($ylw, $cTotal); ?>%</li>
      <li>Green: <?php percent($grn, $cTotal); ?>%</li>
      <li>Blue: <?php percent($blu, $cTotal); ?>%</li>
      <li>Violet: <?php percent($vlt, $cTotal); ?>%</li>
    </ul>
    <h3>Starter Pokemon Type:</h3>
    <ul>
      <li>Grass: <?php percent($grs, $stTotal); ?>%</li>
      <li>Fire: <?php percent($fire, $stTotal); ?>%</li>
      <li>Water: <?php percent($wtr, $stTotal); ?>%</li>
    </ul>
    <h3>Preferred Ice Cream Flavor:</h3>
    <ul>
      <li>Vanilla: <?php percent($van, $iTotal); ?>%</li>
      <li>Chocolate: <?php percent($chok, $iTotal); ?>%</li>
      <li>Strawberry: <?php percent($strbry, $iTotal); ?>%</li>
    </ul>
    <h3>Do you like seafood?</h3>
    <ul>
      <li>Yes: <?php percent($yes, $seTotal); ?>%</li>
      <li>No: <?php percent($no, $seTotal); ?>%</li>
    </ul>
  </div>
</body>
</html>