<?php
echo 'Số ghế đặt: ';
if ($seats) {
    foreach ($seats as $seat) {
        echo $seat . ', ';
    }
    echo '</pre>';
    print_r($seats);
    echo '<pre>';
}


if (str_contains('"B5", "D10"', 'A10')) {
    echo "<br> G10 is taken! <br>";
}
if (str_contains('"A2", "A6"', 'G11')) {
    echo "G11 is taken!";
}
