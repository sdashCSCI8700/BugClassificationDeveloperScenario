<?php session_start();
?>
<form action="checks.php" method="post">
User name:<br>
<input type="text" name="username" required>
<br>
Password:<br>
<input type="password" name="password" required>
<br><br>
<input type="submit" id="submit" name="submit" value="Submit">
</form>
