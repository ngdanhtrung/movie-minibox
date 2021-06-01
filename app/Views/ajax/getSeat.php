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


/*if (str_contains('G10, G11', 'G10')) {
    echo "<br> G10 is taken! <br>";
}
if (str_contains('G10, G11', 'G11')) {
    echo "G11 is taken!";
}*/
