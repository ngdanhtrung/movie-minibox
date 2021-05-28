<div class="container mt-3">
  <div class="row m-auto">
    <div class="col-sm-3">
      <strong class="text-uppercase fs-4" style="color: #e71a0f"><span>Tài khoản</span></strong>
      <div class="m-1 block-content">
        <ul>
          <li class="active"><a href="/account/user">Thông tin chung</a></li>
          <li><a href="/account/update">Chi tiết tài khoản</a></li>
        </ul>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="dashboard">
        <h3>Thông tin chung</h3>
      </div>
      <hr>
      <div class="container">
        <h6 class="fw-bold py-2">Xin chào, <?= $user['username'] ?></h6>
        <h6 class="fw-bold py-1">Thông tin tài khoản</h6>
        <hr>
        <h6 style="font-size: 0.9rem">Tên: <?= $user['username'] ?></h6>
        <h6 style="font-size: 0.9rem">Email: <?= $user['email'] ?></h6>
        <h6 style="font-size: 0.9rem">Số điện thoại: <?= '0' . $user["phoneNumber"] ?></h6>
        <h6 style="font-size: 0.9rem">Ngày sinh: <?= date("d/m/Y",strtotime($user["dob"])) ?></h6>
        <a class="change-btn" href="/account/update">Thay đổi</a>
      </div>
    </div>
  </div>
</div>