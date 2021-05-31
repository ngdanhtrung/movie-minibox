<?php
array_filter($seats);
if ($seats) {
    foreach ($seats as $seat) {
        echo $seat . ', ';
    }
    echo '</pre>';
    print_r($seats);
    echo '<pre>';
}
