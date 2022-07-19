<?php

//if user doesn't enter any parameters
if (count($_GET) == 0){
    echo "enter parameters";
}

// initialization
echo '<table border="1">';
$new_array = array_values($_GET); //возвращает элементы из массива GET

// check for the valid parameter
if (is_numeric($new_array[0]) && strpos($new_array[0], '.') == 0 && strpos($new_array[0], 'e') == 0){

    // loop through rows
    for ($tr = 1; $tr <= $new_array[0]; $tr++) {
        echo '<tr>';
        echo '<td>';
        echo $tr;  //output of the row numberS
        echo '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
else{
    echo 'enter number of strings as first parameter';
}



