<?php
#1. simple/index array
$student_ages = [21, 42, 63, 34, 55, 26, 37, 38, 19, 50];

echo $student_ages[4];
echo "<br> --------------<br>";

#2. associate array
$student_ages = array(
    'lami'     => 21,
    'stacy'    => 42,
    'igor'     => 63,
    'venkat'   => 34,
    'vladmir'  => 55,
    'yusuf'    => 26,
    'michelle' => 37,
    'barack'   => 38,
    'hilary'   => 19,
    'donald'   => 50
);

echo $student_ages['lami'];
echo "<br> --------------<br>";

#3. multidimentional array
$classes = array(
    'chemistry' => array(
        'lami'     => 21,
        'stacy'    => 42,
        'igor'     => 63,
        'venkat'   => 34,
        'vladmir'  => 55,
        'yusuf'    => 26,
        'michelle' => 37,
        'barack'   => 38,
        'hilary'   => 19,
        'donald'   => 50
    ),
    'physics' => array(
        'yinka'     => 21,
        'olu'       => 43,
        'john'      => 66,
        'elizabeth' => 24,
        'kerry'     => 25,
        'sharon'    => 26,
        'kelly'     => 33,
        'mike'      => 34,
        'festus'    => 31,
        'lebron'    => 40
    ),
    'biology' => array(
        'jordan'  => 23,
        'mike'    => 42,
        'stephen' => 67,
        'dana'    => 36,
        'joseph'  => 45,
        'victor'  => 24,
        'tamika'  => 44,
        'lola'    => 32,
        'faith'   => 18,
        'promise' => 25
    )
);

var_dump($classes);

// count # of students
echo '<br># of students in chemistry class: ' . count($classes['chemistry']);
$classes['chemistry']['newguy'] = 10;

// add student
var_dump($classes['chemistry']);
echo '<br># of students in chemistry class: ' . count($classes['chemistry']);

// remove students
unset($classes['chemistry']['newguy']);
unset($classes['chemistry']['lami']);
var_dump($classes['chemistry']);
echo '<br># of students in chemistry class: ' . count($classes['chemistry']);

// sort students by their names and then their ages
ksort($classes['chemistry']);
var_dump($classes['chemistry']);

asort($classes['chemistry']);
var_dump($classes['chemistry']);

// find a student by their age
var_dump(array_search(26, $classes['chemistry']));