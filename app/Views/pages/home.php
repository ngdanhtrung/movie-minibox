<div class="container">
  <!-- <h1>Hello, <?= session()->get('username') ?></h1> -->
  <div class="container" style="width: 1000px">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?php echo base_url() ?>./img/event-home-1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="<?php echo base_url() ?>./img/event-home-2.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="<?php echo base_url() ?>./img/event-home-3.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="<?php echo base_url() ?>./img/event-home-4.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="<?php echo base_url() ?>./img/event-home-5.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="<?php echo base_url() ?>./img/event-home-6.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <div class="container">
    <img src="<?php echo base_url() ?>./img/h3_movie_selection.gif" alt="movie selection" style="display: block; margin:5px auto 5px auto">
  </div>
  <h1>This is an empty Home Page</h1>
  <section class="test">
    <div class="container">
      <?php if ($movieNowShowing) {
        foreach ($movieNowShowing as $movieItem) {
          echo "<h3>" . $movieItem["movieName"] . "</h3>";
        }
      }
      echo date("Y-m-d H:i:s");
      echo "<pre>";
      print_r($movieNowShowing);
      echo "</pre>";
      ?>
    </div>
  </section>
</div>