<div class="container">
    <?php if ($movieComingSoon) {
        foreach ($movieComingSoon as $movieItem) {
            echo "<h3>" . $movieItem["movieName"] . "</h3>";
        }
    }
    echo date("Y-m-d H:i:s");
    echo "<pre>";
    print_r($movieComingSoon);
    echo "</pre>";
    ?>
</div>