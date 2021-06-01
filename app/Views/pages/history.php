<div class="container mt-3">
  <div class="row m-auto">
    <div class="col-sm-3">
      <strong class="text-uppercase fs-4" style="color: #e71a0f"><span>Tài khoản</span></strong>
      <div class="m-1 block-content">
        <ul>
          <li><a href="/account/user">Thông tin chung</a></li>
          <li><a href="/account/update">Chi tiết tài khoản</a></li>
          <li class="active"><a href="/account/history">Lịch sử xem phim</a></li>
        </ul>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="dashboard">
        <h3>Lịch sử xem phim</h3>
      </div>
      <hr>
      <div class="container">
        <div class="array-test">
          <?php
            echo '<pre>';
            print_r($history);
            echo '</pre>';
          ?>
        </div>
        <div class="row row-cols-resize">
          <?php foreach ($history as $ticket) : ?>
            <div class="row border bg-light">
                <div class="col-6"><?= $ticket["cinemaName"] ?></div>
                <div class="col-6"><?= $ticket["cinemaAddress"] ?></div>
                <div class="col-6"><?= date("d-M-Y",strtotime($ticket["date"])) ?></div>
                <div class="col-6"><?= date("H:i:s",strtotime($ticket["date"])) ?></div>
                <div class="col-12"><br></div>
                <div class="col-12"><?= $ticket["movieName"] ?></div>
                <div class="col-6"><?= date("d/M/Y",strtotime($ticket["showtime"])) ?></div>
                <div class="col-6"><?= date("H:i",strtotime($ticket["showtime"])) ?></div>
                <div class="col-6">Rạp: <?= $ticket["room"] ?></div>
                <div class="col-6">Ghế: <?= str_replace("\"","",$ticket["seat"]) ?></div>
                <div class="col-12"><br></div>
                <div class="col-6">Total</div>
                <div class="col-6">VND <?= $ticket["amount"] ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>