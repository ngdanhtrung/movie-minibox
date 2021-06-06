<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url() ?>/css/header.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/css/footer.css">
  <link rel="stylesheet" href="/css/jcarousel.ajax.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <title>Mini Box | Thông tin - Lịch Chiếu - Hệ Thống rạp chiếu phim đỉnh cao</title>
</head>

<body>
  <div id="wrapper">
    <div id="header">
      <div class="header-text">
        <?php if (session()->get('isLoggedIn')) : ?>
          <a href="/account/history">Vé của tôi</a>
          <a href="/account/user">Xin chào, <?= session()->get('username') ?></a>
          <a href="/account/logout">Đăng xuất</a>
        <?php else : ?>
          <a href="/account/login">Vé của tôi</a>
          <a href="/account/login">Đăng nhập</a>
          <a href="/account/register">Đăng ký</a>
        <?php endif; ?>
      </div>
      <div class="header-page">
        <div class="header-page-container">
          <a class="logo" href="/"><img class="logo" src="<?php echo base_url() ?>./img/comm7.png" alt="logo"></a>
          <div class="dropdown-box">
            <button class="dropbtn">Phim
              <div class="dropdown-content">
                <a href="/now-showing">phim đang chiếu</a>
                <a href="/coming-soon">phim sắp chiếu</a>
              </div>
            </button>
            <button class="dropbtn">Rạp
              <div class="dropdown-content">
                <a href="/sites/cinemas">tất cả rạp</a>
              </div>
            </button>
            <button class="dropbtn">Thành viên
              <div class="dropdown-content">
                <a href="/account/user">tài khoản</a>
                <a href="#">quyền lợi</a>
              </div>
            </button>
            <a href="/about" class="dropbtn">giới thiệu</a>
          </div>
        </div>
      </div>
    </div>
    <div style="background: #FDFCF0; margin-bottom: 24px;">