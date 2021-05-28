<div class="container">
  <img src="<?= $movie['image'] ?>" class="img-fluid float-start img-about" alt="...">
  <div class="container" style="padding">
    <h4> <?= $movie['movieName'] ?></h4>
    <p> <strong> Đạo diễn: </strong><?= $movie['director'] ?></p>
    <p> <strong> Diễn viên: </strong><?= $movie['actors'] ?></p>
    <p> <strong> Thể loại: </strong><?= $movie['genre'] ?></p>
    <p> <strong> Khởi chiếu: </strong><?= $movie['premiereDate'] ?></p>
    <p> <strong> Thời lượng: </strong><?= $movie['duration'] ?></p>
    <p> <strong> Ngôn ngữ: </strong><?= $movie['language'] ?></p>
  </div>
</div>