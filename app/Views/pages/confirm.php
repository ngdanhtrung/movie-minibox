<div class="container mt-5" style="width: 800px">
    <div class="dashboard m-0">
        <h6 class="fw-bold fs-6 py-1 m-0" style="color: #fff">XÁC NHẬN THÔNG TIN</h6>
    </div>
    <div class="top-content">
        <h6 class="fw-bold fs-6"><?= $showing['movieName'] . ' | ' . $showing['cinemaName'] . ' | Cinema ' . $showing['room'] ?></h6>
        <h6 class="fw-bold fs-6"><?= $showing['showtime'] ?></h6>
    </div>
    <hr>
    <div class="container">
        <form action="/default/booking/confirm/success" method="post">
            <h6 style="font-size: 0.9rem">Tên: <?= session()->get('username') ?></h6>
            <h6 style="font-size: 0.9rem">Email: <?= session()->get('email') ?></h6>
            <h6 style="font-size: 0.9rem">Số ghế đặt: <?= $seats ?></h6>
            <h6 style="font-size: 0.9rem">Ngày đặt vé: <?= date("d/m/Y H:i:s", time()) ?></h6>
            <h6 style="font-size: 0.9rem">Tổng số tiền: <?= number_format($price) . ' VND' ?></h6>
            <a class="change-btn" href="/default/booking/<?= $showing['id'] ?>">Thay đổi</a>
            <button type="submit"class="change-btn float-end" style="background: #e71a0f ">Đặt vé</button>
        </form>
    </div>
</div>
<?php session()->markAsTempdata([
    'seats'  => 60,
    'price' => 60,
    'showId' => 60
]);
