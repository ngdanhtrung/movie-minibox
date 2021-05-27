<div class="container">
  <div class="row mt-5">
    <div class="col-sm-6 p-5" style="color: #636363">
      <h3>Đăng Ký</h3>
      <hr>
      <form class="" action="/account/register" method="post">
        <div class="row">
          <div class="form-group">
            <label for="email">Email*</label>
            <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
          </div>
          <div class="form-group">
            <label for="phoneNumber">Số điện thoại*</label>
            <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" value="<?= set_value('phoneNumber') ?>">
          </div>
          <div class="form-group">
            <label for="username">Tên đăng nhập*</label>
            <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>">
          </div>
          <div class="form-group">
            <label for="password">Mật khẩu*</label>
            <input type="password" class="form-control" name="password" id="password" value="">
          </div>
          <div class="form-group">
            <label for="password_confirm">Xác nhận mật khẩu*</label>
            <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="">
          </div>
          <div class="form-group">
            <label for="dob">Ngày sinh</label>
            <input type="date" class="form-control" name="dob" id="dob" value="">
          </div>
          <?php if (isset($validation)) : ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
              </div>
            </div>
          <?php endif; ?>
        </div>
        <div class="row">
          <div class="col-12 col-sm-4">
          </div>
          <div class="col-12 col-sm-8 mt-1 text-end">
            <a href="/account/login" style="text-decoration: none; font-size: 0.9rem">Đã có tài khoản? Đăng nhập!</a>
          </div>
        </div>
        <button type="submit" class="btn btn-danger col-12 mt-2">Đăng ký</button>
      </form>
    </div>
    <div class="col-sm-6 p-5" style="color: #636363">
        <div id="carouselExampleFade" class="carousel slide carousel-fade carousel-dark" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="<?php echo base_url() ?>./img/event-1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="<?php echo base_url() ?>./img/event-2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="<?php echo base_url() ?>./img/event-3.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
    </div>
  </div>
</div>