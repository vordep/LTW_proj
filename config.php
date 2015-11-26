<?php
session_start();

defined("HOME_URL")
or define("HOME_URL", dirname("http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']));

defined("UPLOADS_URL")
or define("UPLOADS_URL", HOME_URL . "/server/php/files");

defined("TEMPLATES_PATH")
or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));

defined("UPLOADS_PATH")
or define("UPLOADS_PATH", realpath(dirname(__FILE__) . '/server/php/files'));

defined("CLASSES_PATH")
or define("CLASSES_PATH", realpath(dirname(__FILE__) . '/logic/classes'));

defined("DB_PATH")
or define("DB_PATH", realpath(dirname(__FILE__) . '/data'));

date_default_timezone_set("Europe/Lisbon");
?>
