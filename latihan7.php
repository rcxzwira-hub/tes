<?php
$hari = date("D");

switch ($hari) {

case "Mon":
    echo "Senin";
    break;

case "Tue":
    echo "Selasa";
    break;

case "Wed":
    echo "Rabu";
    break;

default:
    echo "hari lain";
}
?>