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
          /*echo '<pre>';
            print_r($history);
            echo '</pre>';*/
          date_default_timezone_set('Asia/Ho_Chi_Minh');
          ?>
        </div>
        <div class="row row-cols-1">
          <?php foreach ($history as $ticket) : ?>
            <?php if (strtotime($ticket["showtime"]) >= time()) : ?>
              <div class="col h-100 mb-2">
                <div class="row bg-transparent h-100">
                  <div class="col my-1 p-0">
                    <h6 class="fw-bold m-0 my-1" style="font-size: 0.8rem; color: #666">Mã đặt vé: <?= $ticket["id"] ?></h6>
                  </div>
                  <div class="row m-auto p-0 py-2 border-bottom border-dark">
                    <div class="col-sm-3 p-0"><img style="width: 85%;" src="<?= $ticket["image"] ?>" alt=""></div>
                    <div class="col p-0 m-0" style="font-size: 0.8rem">
                      <p class="m-0 fw-bold"><?= $ticket["movieName"] ?></p>
                      <p class="m-0"><?= date("d-M-Y", strtotime($ticket["showtime"])) ?></p>
                      <p class="m-0"><?= date('H:i A', strtotime($ticket["showtime"])) ?></p>
                      <p class="m-0">Cinema <?= $ticket["room"] ?> (<?= str_replace("\"", "", $ticket["seat"]) ?>)</p>
                      <p class="m-0 fw-bold"><?= number_format($ticket["amount"]) ?> ₫</p>
                      <hr>
                      <p class="m-0 fw-bold"><?= $ticket["cinemaName"] ?></p>
                      <p class="m-0"><?= $ticket["cinemaAddress"] ?></p>
                      <hr>
                      <p class="fw-light fst-italic text-muted">Vé được đặt vào lúc <?= date("H:i:s d/m/Y", strtotime($ticket["date"])) ?></p>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
          <?php foreach ($history as $ticket) : ?>
            <?php if (strtotime($ticket["showtime"]) < time()) : ?>
              <div class="col h-100 mb-2">
                <div class="row bg-transparent h-100">
                  <div class="col my-1 p-0">
                    <h6 class="fw-bold m-0 my-1" style="font-size: 0.8rem; color: #666">Mã đặt vé: <?= $ticket["id"] ?></h6>
                  </div>
                  <div class="row m-auto p-0 py-2 border-bottom border-dark">
                    <div class="col-sm-3 p-0"><img style="width: 85%; -webkit-filter: grayscale(100%); filter: grayscale(100%);" src="<?= $ticket["image"] ?>" alt=""></div>
                    <div class="col p-0 m-0" style="font-size: 0.8rem">
                      <p class="m-0 fw-bold"><?= $ticket["movieName"] ?></p>
                      <p class="m-0"><?= date("d-M-Y", strtotime($ticket["showtime"])) ?></p>
                      <p class="m-0"><?= date('H:i A', strtotime($ticket["showtime"])) ?></p>
                      <p class="m-0">Cinema <?= $ticket["room"] ?> (<?= str_replace("\"", "", $ticket["seat"]) ?>)</p>
                      <p class="m-0 fw-bold"><?= number_format($ticket["amount"]) ?> ₫</p>
                      <hr>
                      <p class="m-0 fw-bold"><?= $ticket["cinemaName"] ?></p>
                      <p class="m-0"><?= $ticket["cinemaAddress"] ?></p>
                      <hr>
                      <p class="fw-light fst-italic text-muted">Vé được đặt vào lúc <?= date("H:i:s d/m/Y", strtotime($ticket["date"])) ?></p>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>