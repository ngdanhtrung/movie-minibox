<div class="container">
    <section class="test">
        <div class="container">
            <div class="row row-cols-4 m-auto">
                <?php if ($movieNowShowing) {
                    foreach ($movieNowShowing as $movieItem) {
                        echo '
                            <div class="col card m-3 mx-4 p-2 bg-transparent" style="width: 14rem; font-size: 0.9rem">
                            <a href="/default/' . $movieItem["id"] . '" style="text-decoration: none; color: inherit;";>
                            <img class="card-img-top border border-dark border-5" style="height: 28vh; object-fit: cover;" src="' . $movieItem["image"] . '" alt="Card image cap">
                            <div class="card-body">
                            <p class="card-text fw-bold">' . $movieItem["movieName"] . '</p>
                            </a>
                            <div style="font-size: 0.8rem">
                            <p class="card-text m-0">
                            <span class="fw-bold" >Thể loại: </span>' . $movieItem["genre"] . '</p>
                            <p class="card-text m-0">
                            <span class="fw-bold" >Thời lượng: </span>' . $movieItem["duration"] . '</p>
                            <p class="card-text m-0">
                            <span class="fw-bold" >Khởi chiếu: </span>' . $movieItem["premiereDate"] . '</p>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                }
                ?>
            </div>
        </div>
    </section>
</div>