<?php
/*
 * Authorization Check
 * by Sanjay Prasad
 * sonzoy@gmail.com
 * http://www.openplus.in
 */

if(!isset($_SESSION['openpluslogged'])){
 header('Location:index.php');
		die();
}
?>
