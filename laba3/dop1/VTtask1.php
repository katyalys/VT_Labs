<?php

//if user doesn't enter any parameters
if (count($_GET) == 0){
    echo "enter parameters";
}

// check if the entered parameter is float or integer or string
foreach ($_GET as $value) {
    if(is_numeric($value)) {
        if (strpos($value, '.') == 0 && strpos($value, 'e') == 0){
            echo "$value is integer number;\n";
        }
        else {
            echo "$value is float number;\n";
        }
    }
    else{
        echo "$value is string;\n";
    }
}
