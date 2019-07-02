<html>
<head>
<h1> This is a website to turn on buttons </h1>
</head>
<?php
if (isset($_POST["On"]))
{
exec("sudo python3 /var/www/html/ausinimas/ausintuvasOn.py");
}
if (isset($_POST["Off"]))
{
exec("sudo python3 /var/www/html/ausinimas/ausintuvasOff.py");
}

?>

<br>

<body>
<form method="post">
<button id="search" class="btn" name="On">On</button>
<button id="search" class="btn" name="Off">Off</button>
</form>
</body>
</html>
