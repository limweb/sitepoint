<?php
session_start();

# step 1
class Helper {
    public static function generateCSRFToken() {
        $hash = hash('md5', uniqid()); //sha1, sha256
        $_SESSION['csrf-token'] = $hash;

        return $hash;
    }

    public static function checkCSRFToken($token) {
        if (!empty($_SESSION['csrf-token']) && $token === $_SESSION['csrf-token']) {
            unset($_SESSION['csrf-token']);
            return true;
        }
        return false;
    }
}