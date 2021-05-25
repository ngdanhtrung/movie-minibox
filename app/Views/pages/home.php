<div class="container">
  <h1>Hello, <?= session()->get('username') ?></h1>
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