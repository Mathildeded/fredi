<?php
	unset($_SESSION["sessid"]);
	unset($_SESSION["sessmdp"]);
    header("location:index.php");
?>
