<?php
$date = new DateTime;
$date->setTimezone(new DateTimeZone('Europe/Moscow'));

echo $date->format('d.m.Y H:i');
?>