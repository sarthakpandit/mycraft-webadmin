<?php session_start(); ?>
<?php /* 
	This file is part of MyCraft.
	
    MyCraft is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    MyCraft is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with MyCraft.  If not, see <http://www.gnu.org/licenses/>.
*/	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="shortcut icon" href="images/icons/favicon.ico">
<title>MyCraft - Minecraft Web Admin</title>
<script type="text/javascript" src="scripts/jquery1.4min.js"></script>
</head>
<?php
define('directblock', TRUE);
?>
<body>

<div id="wrap">

<div id="header">
<h1><a href="#">MyCraft</a></h1>
<h2>An easy to use backend for Minecraft
<br />
<b>
<font color="#FFFFFF">
<?php
$f_contents = file ("includes/randomquote.txt");
$line = $f_contents[array_rand ($f_contents)];
echo $line;
?>
</font>
</b>
</h2>
</div>

<div id="menu">
<ul>

<li><a href="?p=home">Home</a></li>
<li><a href="?p=warps">Warps</a></li>
<li><a href="?p=users">Users</a></li>
<li><a href="?p=whitelist">Whitelist</a></li>
<li><?php if ($_SESSION['auth']){print("&nbsp;<b>Logged in as $_SESSION[username]</b>");}else{print('<font color="#33CC33"><b><img src="images/16x16/info.png" alt="Info" /> You need to log in</b></font>');}?></li>
<li><?php if ($_SESSION['auth']){include('pages/interact_panel.php');}?></li>
<li><?php if (!$_SESSION['auth']){include('pages/login_form.php');}else{include('pages/logout_gui.php');}?></li>
<li></li>

</ul>
</div>

<div id="contentwrap"> 

<div id="content">
<?php
$default = 'home'; //Whatever default page you want to display if the file doesn't exist or you've just arrived to the home page.
$page = isset($_GET['p']) ? $_GET['p'] : $default; //Checks if ?p is set, and puts the page in and if not, it goes to the default page.
$page = basename($page); //Gets the page name only, and no directories.
if (!file_exists('pages/'.$page.'.php'))    { //Checks if the file doesn't exist
    $page = $default; //If it doesn't, it'll revert back to the default page
    //NOTE: Alternatively, you can make up a 404 page, and replace $default with whatever the page name is. Make sure it's still in the inc/ directory.
}
include('pages/'.$page.'.php'); //And now it's on your page! ?> 
</div>
<div style="clear: both;"> </div>
</div>
<div id="footer">
<p>Copyleft <img src="images/16x16/copyleft.png" /><a href="http://sacrificetheory.com"> ProjectInfinity</a> | <? print "Build: Aftermath"; ?></p>
</div>
<?php
/*
 This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/ ?>
</div>
</body>
</html>