<?php
$data = date("Ymd") . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
var_dump($data);
?>