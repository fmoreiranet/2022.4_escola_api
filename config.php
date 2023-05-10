<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', 1);
ini_set("enable_post_data_reading", 1);


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_ENV = parse_ini_file('.env');

