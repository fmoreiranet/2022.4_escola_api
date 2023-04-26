<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_ENV = parse_ini_file('.env');
