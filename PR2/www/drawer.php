<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/drawer_style.css">
    <title>Drawer</title>
</head>
<body>
    <div>
        <div class="svg">
        <?php
        $number = $_GET['num'];
        if (isset($number) && is_numeric($number)) {
            $shape = ($number >> 5) & 3;
            $r = ($number >> 4) & 1;
            $g = ($number >> 3) & 1;
            $b = ($number >> 2) & 1;
            $size = (($number >> 0) & 3) + 1;

            $color = '"#' . ($r == 1 ? 'ff' : "00") . ($g == 1  ? 'ff' : "00") . ($b == 1 ? 'ff' : "00") . '"';
            $size = $size * 100;
    
            $shape_tag = '';
            switch ($shape) {
                case 0:
                    $radius = ($size / 2);
                    $shape_tag = "circle " . " cx=" . ($radius + 10) . " cy=" . ($radius + 10) . " r=" . $radius . " ";
                    break;
                case 1:
                    $shape_tag = "rect " . "width=" . ($size * 2) . " height=" . ($size);
                    break;
                case 2:
                    $shape_tag = "rect " . "width=" . ($size) . " height=" . ($size);
                    break;
                case 3:
                    $side = $size;
                    $shape_tag = "polygon points='" . ($side / 2 + 5) . ",10" . " 10," . ($side) . " " . ($side) . "," . ($side) . "'";
                    break;
            }
            echo '<svg height = 100%, width = 100%>';
            echo '<' . $shape_tag . ' fill=' . $color . '  />';
            echo '</svg>';
        }
        ?>
        </div>
    </div>
</body>
</html>