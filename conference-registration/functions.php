<?php
session_start();

define('ADMIN_USER', 'admin');
define('ADMIN_PASS', 'admin123');

$cookie_name = 'conference_registrations';
$cookie_life = 60 * 60 * 24 * 30;

function load_registrations() {
    global $cookie_name;
    if (!empty($_COOKIE[$cookie_name])) {
        $data = json_decode($_COOKIE[$cookie_name], true);
        return is_array($data) ? $data : [];
    }
    return [];
}

function save_registrations($arr) {
    global $cookie_name, $cookie_life;
    setcookie($cookie_name, json_encode(array_values($arr)), time() + $cookie_life, '/');
}

function find_by_email($arr, $email) {
    foreach ($arr as $i => $r) {
        if (strtolower($r['email']) === strtolower($email)) return $i;
    }
    return false;
}
?>
