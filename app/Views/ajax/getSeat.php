<?php


$selectedSeats = "";
$sum = 0;
$seatURI = "";
if ($seats) {
    foreach ($seats as $seat) {
        $selectedSeats = $selectedSeats . $seat . ', ';
        $seatURI = $seatURI . '/' . $seat;
        $sum = $sum + $showing['price'];
    }
    /*echo '</pre>';
    print_r($showing);
    echo '<pre>';*/
    //echo trim($selectedSeats);
    $selectedSeats = substr(trim($selectedSeats), 0, -1);
    $data = [
        'seats' => $selectedSeats,
        'price' => $sum,
        'showId' => $showing['id']
    ];
    session()->set($data);
} ?>
<div class="container">
    <div class="container px-5 mt-3" style="width: 800px">
        <strong> Bạn chọn ghế: </strong>
        <?php if ($seats) {
            echo $selectedSeats;
        } ?>
        <br>
        <strong> Tổng số tiền: </strong>
        <?php if ($seats) : ?>
            <?php echo number_format($sum) . ' VND'; ?>
            <?php if (session()->has('valid')) : ?>
                <a href="<?= base_url('/default/booking/confirm/') ?>">
                    <p id="btn-confirm" class="btn btn-danger float-end">NEXT</p>
                </a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php session()->markAsTempdata([
    'seats'  => 60,
    'price' => 60,
    'showId' => 60
]);
session()->remove('valid');
