<?php
    include_once 'helper.php';

    $email    = null;
    $fullname = null;
    $password = null;

    # step 3
    if(isset($_REQUEST['update'], $_REQUEST['token'])) {
        if (Helper::checkCSRFToken($_REQUEST['token'])) {
            $email    = !empty($_REQUEST['email']) ? $_REQUEST['email'] : null;
            $fullname = !empty($_REQUEST['fullname']) ? $_REQUEST['fullname'] : null;
            $password = !empty($_REQUEST['password']) ? $_REQUEST['password'] : null;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CSRF Protection in PHP | Sitepoint</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style type="text/css">
        body {padding: 4em;}
    </style>
</head>
<body>
    <div class="container">
        <div class="col-sm-6">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" id="email" <?php echo ($email) ? "value='$email'" : "placeholder='Default Email'" ?>>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fullname" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="fullname" id="fullname" <?php echo ($fullname) ? "value='$fullname'" : "placeholder='Default Name'" ?>>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="password" id="password" <?php echo ($password) ? "value='$password'" : "placeholder='Default Password'" ?>>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-info" name="update" value="1">Update Profile</button>
                    </div>
                </div>
                <!-- step #2 -->
                <input type="hidden" name="token" value="<?php echo Helper::generateCSRFToken() ?>">
            </form>
        </div>
    </div>
</body>
</html>