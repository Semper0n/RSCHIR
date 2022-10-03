<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/sort_style.css">
    <title>Sort</title>
</head>
<body>
    <div>
        <?php
            function swap (&$array,$key1,$key2) 
            {
                $temp = $array[$key1];
                $array[$key1] = $array[$key2];
                $array[$key2] = $temp; 
            }

            function insertion_sort ($array) 
            {
                $i = $j = 0; 
                $n = count($array);
                for ($i=1; $i<$n; $i++) {
                    $j = $i;
                    while (($j>0) && ($array[$j] < $array[$j-1])) {
                        swap($array,$j,$j-1);
                        $j = $j-1;
                    }
                }
                return $array;
            }
            echo "<p>Массив: [";
            echo implode(", ", explode(",", $_GET["array"]));
            echo "]</p>\n<p>Отсортированный массив: [";
            echo implode(", ", insertion_sort(explode(",", $_GET["array"])));
            echo "]</p>";
        ?>
    </div>
</body>
</html>

<?php

?>