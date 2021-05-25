<div class="container">
  <div class="row mt-5">
    <div class="col-sm-7 p-5" style="color: #636363">
      <h3>Đăng Ký</h3>
      <hr>
      <form class="" action="/account/register" method="post">
        <div class="row">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
          </div>
          <div class="form-group">
            <label for="phoneNumber">Phone Number</label>
            <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" value="<?= set_value('phoneNumber') ?>">
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" value="">
          </div>
          <div class="form-group">
            <label for="password_confirm">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="">
          </div>
          <div class="form-group">
            <label for="dob">Date of birth</label>
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
            <a href="/account/login" style="text-decoration: none; font-size: 0.9rem">Already have an account?</a>
          </div>
        </div>
        <button type="submit" class="btn btn-danger col-12 mt-2">Register</button>
      </form>
    </div>
  </div>
</div>