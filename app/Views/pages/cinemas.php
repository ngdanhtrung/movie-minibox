<div class="container border p-2 mt-3 float-center">
    <div class="container m-2">
        <div class="row row-cols-3">
            <?php
            foreach ($cinemas as $cinema) : ?>
                <div class="col">
                    <p style="color: #666;"><strong><?= $cinema['cinemaName']; ?></strong></p>
                    <p style="color: initial; font-size: 0.8rem"><?= $cinema['cinemaAddress']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>