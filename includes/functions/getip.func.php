<?php
// DO NOT TOUCH
function getIp() {
	$ip = $_SERVER['REMOTE_ADDR'];
	return $ip;
}

function getMetaIp() {
    $metaIp = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $metaIp = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $metaIp = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $metaIp;
}