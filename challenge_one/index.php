<?php
    $myArray = [
        [1, 'a'],
        [15, 'b'],
        [4, 'c'],
        [8, 'd'],
        [12, 'e'],
        [22, 'f'],
    ];
    function s($array)
    {
            asort($array);
            return $array;
    }

    var_dump(s($myArray));
?>

