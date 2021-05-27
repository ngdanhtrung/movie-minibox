<div class="container">
  <div class="row mt-2">
    <div class="col-sm-1"></div>
    <div class="col-sm-6 p-5" style="color: #636363">
      <h3>Đăng ký</h3>
      <hr>
      <form class="" action="/account/register" method="post">
        <div class="row">
          <div class="form-group">
            <label for="email">Địa chỉ email: <span style="color: red; font-size: 0.7rem"> *</span></label>
            <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
          </div>
          <div class="form-group">
            <label for="phoneNumber">Số điện thoại: <span style="color: red; font-size: 0.7rem"> *</span></label>
            <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" value="<?= set_value('phoneNumber') ?>">
          </div>
          <div class="form-group">
            <label for="username">Tên đăng nhập: <span style="color: red; font-size: 0.7rem"> *</span></label>
            <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>">
          </div>
          <div class="form-group">
            <label for="password">Mật khẩu: <span style="color: red; font-size: 0.7rem"> *</span></label>
            <input type="password" class="form-control" name="password" id="password" value="">
          </div>
          <div class="form-group">
            <label for="password_confirm">Xác nhận mật khẩu: <span style="color: red; font-size: 0.7rem"> *</span></label>
            <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="">
          </div>
          <div class="form-group">
            <label for="dob">Ngày sinh: <span style="color: red; font-size: 0.7rem"> *</span></label>
            <input type="date" class="form-control" name="dob" id="dob" value="">
          </div>
          <?php if (isset($validation)) : ?>
            <div class="alert m-auto text-danger" role="alert">
              <?= $validation->listErrors() ?>
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
  </div>
</div>