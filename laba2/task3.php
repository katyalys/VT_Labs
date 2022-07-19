<?php

// array output
function output(array $arr, $level)
{
    $colors = ["red", "blue", "green", "purple", "orange"];

    for ($el = 0; $el < count($arr); $el++) {
        if (is_array($arr[$el])) {
            output($arr[$el], $level + 1);
        }
        else{
            // color change
            if ($level < 4){
                echo "<p style='color:$colors[$level] '>$arr[$el] </p>";
            }
            else{
                echo "<p style='color:$colors[4] '>$arr[$el] </p>";
            }
        }
    }
};

$arr = [1, 1, [2, 2, [3, 3, 3, [4, [[6]], 4, [5, [6, 6, [7, 7]], 5, 5, 5], 4]]], 1, 1];
output($arr, 0);