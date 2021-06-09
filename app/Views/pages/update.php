<div class="container my-5">
  <div class="row m-auto">
    <div class="col-sm-3" style="color: #636363">
      <strong class="text-uppercase fs-4" style="color: #e71a0f"><span>Tài khoản</span></strong>
      <div class="m-1 block-content">
        <ul>
          <li><a href="/account/user">Thông tin chung</a></li>
          <li class="active"><a href="/account/update">Chi tiết tài khoản</a></li>
          <li><a href="/account/history">Lịch sử xem phim</a></li>
        </ul>
      </div>
    </div>
    <div class="col-sm-8" style="color: #636363">
      <div class="dashboard">
        <h3>Cập nhật thông tin tài khoản</h3>
      </div>
      <hr>
      <form class="" action="/account/update" method="post">
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="email">Địa chỉ email: </label>
              <input type="text" class="form-control" readonly id="email" value="<?= $user['email'] ?>">
            </div>
            <div class="form-group">
              <label for="phoneNumber">Số điện thoại: <span style="color: red; font-size: 0.7rem"> *</span></label>
              <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" value="<?= set_value('phoneNumber', '0' . $user['phoneNumber']) ?>">
            </div>
            <div class="form-group">
              <label for="username">Tên đăng nhập: <span style="color: red; font-size: 0.7rem"> *</span></label>
              <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username', $user['username']) ?>">
            </div>
          </div>
          <div class="col-sm-6">
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
              <input type="date" class="form-control" name="dob" id="dob" value="<?= $user['dob'] ?>">
            </div>
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
            <a href="/account/user" style="text-decoration: none; font-size: 0.9rem">Quay trở lại thông tin tài khoản</a>
          </div>
        </div>
        <button type="submit" class="btn btn-danger col-12 mt-2">Cập nhật</button>
      </form>
    </div>
  </div>
</div>