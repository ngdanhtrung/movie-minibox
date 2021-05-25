<div class="container">
  <h1>This is an empty Home Page</h1>
  <section class="test">
    <div class="container">
      <?php if ($movie) {
        foreach ($movie as $movieItem) {
          echo "<h3>" . $movieItem["movieName"] . "</h3>";
        }
      } ?>
    </div>
  </section>
</div>