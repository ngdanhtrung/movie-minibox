<div class="container-fluid p-0">
  <!-- <h1>Hello, <?= session()->get('username') ?></h1> -->
  <div class="container-fluid my-5 banner-carousel-container">
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
  </div>
  <div class="container my-5">
    <div class="home-title"><img src="<?php echo base_url() ?>./img/h3_movie_selection.gif" alt="movie selection" style="display: block; margin:5px auto 5px auto"></div>
  </div>

  <section class="test">
    <div class="container">
      <div class="wrapper">
        <div class="jcarousel-wrapper">

          <div class="jcarousel" data-jcarousel="true">
            <ul style="left: 0px; top: 0px;">
              <?php foreach ($movieNowShowing as $movie) {
                echo '<li><a href="/default/' . $movie['id'] . '"><img class="img-loading" src=' .  $movie['bigImage'] . ' alt="Image" loading="lazy"></a></li>';
              } ?>
            </ul>
          </div>
          <a href="#" class="jcarousel-control-prev inactive" data-jcarouselcontrol="true"></a>
          <a href="#" class="jcarousel-control-next" data-jcarouselcontrol="true"></a>
        </div>
        <?php
        echo date("Y-m-d H:i:s");
        ?>
      </div>
  </section>
</div>
<script>
  $('.img-carousel').load(function() {
    $('#loading').hide();
  });
</script>