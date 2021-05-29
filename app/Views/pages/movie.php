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

            <img src="<?= $movie['image'] ?>" class="img-fluid float-start img-about p-0" alt="...">
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
            </div>

          </div>

        </div>

      </div>

    </div>
  </div>
</div>