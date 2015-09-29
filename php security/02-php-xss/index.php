<?php

$comment = "this is a well written test comment with no quams.";
$comment = "<script>alert(document.cookie);</script>";

function cleanInput($input) {
    return htmlentities($input);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>XSS Protection in PHP | Sitepoint</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="detailBox">
            <div class="titleBox">
                <label>Comment Box</label>
            </div>
            <div class="actionBox">
                <ul class="commentList">
                    <li>
                        <div class="commenterImage">
                            <img src="http://lorempixel.com/50/50/people/<?php echo rand(1, 10) ?>" />
                        </div>
                        <div class="commentText">
                            <p><?php echo cleanInput($comment) ?></p>
                            <span class="date sub-text">literally a few seconds ago</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>