<?php
session_start();
if (isset($_SESSION["submission"])) {
	header("Location: results.php");
}
else {
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="UTF-8">
  <title>Week 03</title>
</head>
<body>
  <div id="survey">
    <form method="post" action="<?php echo htmlspecialchars("results.php");?>">
      <input type="hidden" name="isSubmitted" value="yes">
  	  <p> What is your favorite color?<br/>
        <input type="radio" name="color" value="red">Red<br/>
        <input type="radio" name="color" value="orng">Orange<br/>
        <input type="radio" name="color" value="ylw">Yellow<br/>
        <input type="radio" name="color" value="grn">Green<br/>
        <input type="radio" name="color" value="blu">Blue<br/>
        <input type="radio" name="color" value="vlt">Violet<br/>
      </p>
      <p> What type of Pokemon would you choose as your starter?<br/>
      	<input type="radio" name="starter" value="Grass">Grass<br/>
      	<input type="radio" name="starter" value="Fire">Fire<br/>
      	<input type="radio" name="starter" value="Water">Water<br/>
      </p>      
      <p> What ice cream flavor do your prefer?<br/>
        <input type="radio" name="icream" value="van">Vanilla<br/>
        <input type="radio" name="icream" value="choc">Chocolate<br/>
        <input type="radio" name="icream" value="strwbry">Strawberry<br/>
      </p>
      <p> Do you like seafood?<br/>
        <input type="radio" name="seafood" value="yes">Yes<br/>
        <input type="radio" name="seafood" value="no">No<br/>
      </p>
      <input type="submit" name="submit" value="Submit">
    </form>
  </div>
  <p> 
    <a href="results.php">Click here</a> to check the results!!
  </p>
</body>
</html>
<?php } ?>