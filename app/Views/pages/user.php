<?php
helper('url');
if (!isset($_SESSION['isLoggedIn'])) {
    return redirect()->to(base_url());
} ?>
<div class="container">
    <div class="row row-cols-2 m-auto">
        <div class="col-sm-2"></div>
        <div class="col-sm-8 py-1">
            <div class="dashboard">
                <h3>Thông tin chung</h3>
            </div>
            <hr>
            <div class="container">
                <h6 class="fw-bold py-2">Xin chào, <?= session()->get('username') ?></h6>
                <h6 class="fw-bold py-1">Thông tin tài khoản</h6>
                <hr>
                <h6 style="font-size: 0.9rem">Tên: <?= session()->get('username') ?></h6>
                <h6 style="font-size: 0.9rem">Email: <?= session()->get('email') ?></h6>
                <h6 style="font-size: 0.9rem">Số điện thoại: <?= $user["phoneNumber"] ?></h6>
                <h6 style="font-size: 0.9rem">Ngày sinh: <?= $user["dob"] ?></h6>
            </div>
        </div>
    </div>
</div>