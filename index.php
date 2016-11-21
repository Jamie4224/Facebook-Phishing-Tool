<?php
// Set SUPER Vars
$apppath = dirname(__FILE__);

// Require main class
require("$apppath/includes/main.boot.php");

$FBPhish->themecheck();
$content = $FBPhish->loadPage("home");

// Credits
$credits = '
<!--
Copyright Jamie4224 2016
FBPhish is released under the GNU General Public License v3
Removal of this copyright notice is an infringement of the license.
Developed by Jamie4224
-->
';

// Copyright 
$copyrightMeta = '
<meta name="dcterms.rightsHolder" content="Jamie4224">
<meta name="dcterms.rights" content="Released under GNU General Public License v3">
<meta name="dcterms.dateCopyrighted" content="2016">
<meta name="dc.license" content="GNU General Public License v3">
<meta name="web_author" content="Jamie4224">';

$content = str_replace("<head>", "<head>" . $copyrightMeta, $content);

// Compress html
$content = trim(preg_replace('/\s\s+/', ' ', $content));
$content = str_replace("\lf", '', $content);

// Add credits into head
$content = str_replace("<head>", "<head>" . $credits, $content);

echo $content;

?>