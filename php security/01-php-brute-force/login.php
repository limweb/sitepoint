<?php
    include 'auth.php';

    # authentication logic
    $message_type = null;
    $message      = null;

    if (isset($_REQUEST['logout'])) {
        Auth::logout();

        $message_type = 'success';
        $message      = 'You have successfully logged out.';
    }

    if (isset($_REQUEST['login'])) {
        $user = empty($_POST['user']) ? null : $_POST['user'];
        $pass = empty($_POST['pass']) ? null : $_POST['pass'];

        $access = Auth::login($user, $pass);
        if ($access) {
            header('location: index.php');
            exit;
        } else {
            $message_type = 'danger';
            $message      = 'The credentials you entered were invalid.  Try again!';
        }
    }

    # tack debug prompts to message
    $tries = empty($_SESSION['lock-tries']) ? null : $_SESSION['lock-tries'];
    $time  = empty($_SESSION['lock-time']) ? null : $_SESSION['lock-time'];
    $message .= "<p>lock-tries: $tries | lock-time: $time</p>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - PHP Brute Force Prevention | Sitepoint</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h3>Log In</h3>

        <?php
            if (!empty($message)) {
                echo PHP_EOL . "<div class='alert alert-$message_type'>";
                echo PHP_EOL . $message;
                echo PHP_EOL . "</div>";
            }
        ?>

        <div class="col-xs-12 col-sm-6">
            <form class="form-horizontal" action="?login" method="post">
                <div class="form-group">
                    <label for="user" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="user" name="user" placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-info">Log In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>