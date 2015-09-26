<?php

# 1st Example
$variable = null;
if ("x" != "y") {
    $variable = "yea";
} else {
    $variable = "nae";
}

//(condition) ? {true-value} : {false-value}
$variable = ("x" == "y") ? "yea" : "nae";

# 2nd Example
$input = "not default";
$variable = "default";
if ($input) {
    $variable = $input;
}

$variable = ($input) ?: "default";

echo $variable;
echo PHP_EOL;