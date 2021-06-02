<div class="container-fluid py-0 breadcrumb-container">
  <div class="container py-1">
    <nav class="px-5 mx-5" style="--bs-breadcrumb-divider: url(https://www.cgv.vn/skin/frontend/cgv/default/images/bg-cgv/bg-cgv-icon-arrow.png);" aria-label="breadcrumb">
      <ol class="breadcrumb m-0">
        <li class="breadcrumb-item"><a href="/" class="breadcrumb-home" title="go-to-home"></a></li>
        <li class="pl-2 breadcrumb-item" aria-current="page">
          <?php
          if ($movie['isShowing'] == 1)
            echo "<a href='/now-showing'>Phim đang chiếu</a>";
          else echo "<a href='/coming-soon'>Phim sắp chiếu</a>"; ?>
        </li>
        <li class="px-2 breadcrumb-item active" aria-current="page">
          <strong>
            <?= $movie['movieName'] ?>
          </strong>
        </li>
      </ol>
    </nav>
  </div>
</div>

<div class="container mt-5">
  <div class="container" style="width: 1100px">
    <div class="container-fluid m-0 p-0">

      <div class="product-desc">
        <span>Nội Dung Phim</span>
      </div>

      <div class="container-fluid m-0 p-0 mt-4">
        <div class="row m-auto">
          <div class="col-sm-2 p-0">

            <img src="<?= $movie['bigImage'] ?>" class="img-fluid float-start img-about p-0" alt="...">
          </div>
          <div class="col ms-2 pe-0">
            <div class="container-fluid m-0 p-0 product-name">
              <span class="h4"><?= $movie['movieName'] ?></span>
            </div>
            <div class="container-fluid m-0 p-0 mt-5 pt-1 movie-info" style="color: #333">
              <p> <strong> Đạo diễn: </strong><?= $movie['director'] ?></p>
              <p> <strong> Diễn viên: </strong><?= $movie['actors'] ?></p>
              <p> <strong> Thể loại: </strong><?= $movie['genre'] ?></p>
              <p> <strong> Khởi chiếu: </strong><?= $movie['premiereDate'] ?></p>
              <p> <strong> Thời lượng: </strong><?= $movie['duration'] ?></p>
              <p> <strong> Ngôn ngữ: </strong><?= $movie['language'] ?></p>
              <?php if ($movie['isShowing'] == 1) : ?>
                <button type="button" class="button booking-btn mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <span>
                    <span class="book">Đặt vé</span>
                  </span>
                </button>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <button type="button" class="box-close" data-bs-dismiss="modal">Đóng</button>
      <div class="modal-header">
        <?php
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $startdate = time();
        $enddate = strtotime("+13 days", $startdate);
        ?>
        <ul class="day-list">
          <?php while ($startdate <= $enddate) : ?>
            <li>
              <div class="day" onclick="getDate('<?= date($startdate) ?>')">
                <span><?= date("m", $startdate) ?></span>
                <em><?= date("D", $startdate) ?></em>
                <strong><?= date("d", $startdate) ?></strong>
              </div>
            </li>
            <?php $startdate = strtotime("+1 day", $startdate); ?>
          <?php endwhile; ?>
        </ul>
      </div>
      <div class="modal-body">
        <div id="result"></div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $("#result").load(`<?= site_url('default/getDate/' . $movie['id']) . '/' . date(time()) ?>`);
    //console.log(`<?= site_url('default/getDate/' . $movie['id']) . '/' . date(time()) ?>`);
    $('.day').first().addClass('border border-dark');

    $('.day').on('click', function() {
      $('.day').removeClass('border border-dark');
      $(this).addClass('border border-dark');
    });

  });

  function getDate(value) {
    $("#result").load(`<?= site_url('default/getDate/' . $movie['id']) . '/'  ?>${value}`);
    //console.log(`<?= site_url('default/getDate/' . $movie['id']) . '/'  ?>${value}`);
  };
</script>