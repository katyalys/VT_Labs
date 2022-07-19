<!DOCTYPE html>
<html>
<head>
    <title>laba</title>
    <meta charset="utf-8" />
</head>
<body>
<table>
    <?php
    $array = [["Tom", 5, 1.2897, "Alice and Tom"], [1, 5.324, "Bob", "Kate"], [3, "Sam", "Mary", 9.678]];

    foreach ($array as $arr_str)
    {
        echo "<tr>";
        foreach ($arr_str as $arr_el)
        {
            echo "<td>$arr_el</td>";
        }
        echo "</tr>";
    }

    for ($i=0; $i<count($array); $i++){
        for ($j=0; $j<count($array[$i]); $j++){
            if(is_numeric($array[$i][$j])) {
                if (strpos($array[$i][$j], '.') == 0 && strpos($array[$i][$j], 'e') == 0){
                    $array[$i][$j] *= 2;
                }
                else {
                    $array[$i][$j] = round($array[$i][$j], 2, PHP_ROUND_HALF_UP);
                }
            }
            else{
                $array[$i][$j] = strtoupper($array[$i][$j]);
            }
        }
    }

    echo "<tr>";
    foreach ($array as $arr_str)
    {
        echo "<tr>";
        foreach ($arr_str as $arr_el)
        {
            echo "<td>$arr_el</td>";
        }
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>