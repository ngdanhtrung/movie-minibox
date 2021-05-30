<div class="container-fluid py-0 breadcrumb-container">
    <div class="container py-1">
        <nav class="px-5 mx-5" style="--bs-breadcrumb-divider: url(https://www.cgv.vn/skin/frontend/cgv/default/images/bg-cgv/bg-cgv-icon-arrow.png);" aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item "><a href="/" class="breadcrumb-home" title="go-to-home"></a></li>
                <li class="px-2 breadcrumb-item active" aria-current="page"><strong>Phim Đang chiếu</strong></li>
            </ol>
        </nav>
    </div>
</div>

<div class="container mt-5">
    <section class="test">
        <div class="container" style="width: 1100px">
            <div class="category-title">
                <h1 class="p-1 d-inline" style="color: #333">Phim Đang Chiếu</h1>
                <div class="sub-category">
                    <a href="/coming-soon">
                        <h4>Phim Sắp Chiếu</h4>
                    </a>
                </div>
            </div>
            <div class="row row-cols-4 m-auto">
                <?php if ($movieNowShowing) {
                    foreach ($movieNowShowing as $movieItem) : ?>
                        <div class="col my-3">
                            <div class="card h-100 m-3 mx-4 p-2 bg-transparent" style="width: 14rem; font-size: 0.9rem">
                                <a href="/default/<?= $movieItem["id"] ?>" style="text-decoration: none; color: inherit;" ;>
                                    <img class="card-img-top border border-dark border-5" style="height: 28vh; object-fit: cover;" src="<?= $movieItem["image"] ?>" alt="Card image cap">
                                    <div class="card-body" style="height: fit-content; overflow: hidden;">
                                        <p class="card-text fw-bold"><?= $movieItem["movieName"] ?></p>
                                </a>
                                <div style="font-size: 0.8rem">
                                    <p class="card-text m-0"><span class="fw-bold">Thể loại: </span><?= $movieItem["genre"] ?></p>
                                    <p class="card-text m-0"><span class="fw-bold">Thời lượng: </span><?= $movieItem["duration"] ?></p>
                                    <p class="card-text m-0"><span class="fw-bold">Khởi chiếu: </span><?= date("j-n-Y", strtotime($movieItem["premiereDate"])) ?></p>
                                </div>
                            </div>
                        </div>
            </div>
    <?php endforeach;
                } ?>
        </div>
</div>
</section>
</div>