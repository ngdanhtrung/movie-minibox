<div class="container">
  <div class="row mt-5">
    <div class="col-sm-7 px-5">
      <h3>Đăng nhập</h3>
      <hr>
      <?php if (session()->get('success')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->get('success') ?>
        </div>
      <?php endif; ?>
      <form class="" action="/account/login" method="post">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" value="">
        </div>
        <?php if (isset($validation)) : ?>
          <div class="col-12">
            <div class="alert alert-danger" role="alert">
              <?= $validation->listErrors() ?>
            </div>
          </div>
        <?php endif; ?>
        <div class="row">
          <div class="col-12 col-sm-4">
          </div>
          <div class="col-12 col-sm-8 text-end">
            <a href="/account/register">Don't have an account yet?</a>
          </div>
        </div>
        <button type="submit" class="btn btn-danger col-12 mt-2">Login</button>
      </form>
    </div>
  </div>
</div>