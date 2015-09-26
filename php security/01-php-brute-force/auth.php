<?php
session_start();
date_default_timezone_set('America/New_York');

class Auth {
    const USER = 'site';
    const PASS = '$2y$10$aGt2lkH/6BWdll8zsK8S9OeqfhZ02mHWUa/ypLn6oB.fncpoVBbua'; //point

    const LOCK_TRIES = 3;
    const LOCK_TIME  = 0.5; //in minutes

    #$_SESSION['lock-tries']
    #$_SESSION['lock-time']

    public static function login($user, $pass) {

        $check_lock_time  = self::checkLockoutTime();
        $check_lock_tries = self::checkLockoutTries();

        $check_user = ($user == self::USER);
        $check_pass = (password_verify($pass, self::PASS));

        if ($check_lock_time && $check_user && $check_pass) {
            $_SESSION['logged-in'] = true;
            self::endLockout();
            return true;
        }

        return false;
    }

    public static function logout() {
        if (!empty($_SESSION['logged-in'])) {
            unset($_SESSION['logged-in']);
        }
    }

    public static function checkLogin() {
        $check_login = isset($_SESSION['logged-in']) && ($_SESSION['logged-in'] == true);
        return $check_login;
    }

    public static function startLockout() {
        $_SESSION['lock-time'] = date('Y-m-d H:i:s');
    }

    public static function endLockout() {
        if (!empty($_SESSION['lock-time'])) {
            unset($_SESSION['lock-time']);
        }

        if (!empty($_SESSION['lock-tries'])) {
            unset($_SESSION['lock-tries']);
        }
    }

    public static function checkLockoutTime() {
        if (isset($_SESSION['lock-time'])) {
            $curr_time = new DateTime(date('Y-m-d H:i:s'));
            $wait_time = new DateTime($_SESSION['lock-time']);
            $wait_time->modify('+' . self::LOCK_TIME . ' minutes');

            if ($curr_time > $wait_time) {
                self::endLockout();
                return true;
            } else {
                return false;
            }
        }

        return true;
    }

    public static function checkLockoutTries() {
        if (empty($_SESSION['lock-tries'])) {
            $_SESSION['lock-tries'] = 1;
        } else {
            $_SESSION['lock-tries'] += 1;
        }

        if ($_SESSION['lock-tries'] >= self::LOCK_TRIES) {
            self::startLockout();
            return false;
        } else {
            return true;
        }
    }
}