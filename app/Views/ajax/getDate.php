<?php

if ($showing) {
    foreach ($showing as $showingItem) : ?>
        <div class="containter-fluid mx-1 mb-5 border-bottom border-dark border-1 pb-3">
            <h6 class="mb-4 fs-4"><?= $showingItem["cinemaName"] ?></h6>
            <a href="#" style="text-decoration: none; color: inherit;">
                <div class="border border-1 d-inline p-2 px-4"><?= $showingItem["showtime"] ?></div>
            </a>
        </div>
<?php endforeach;
} else echo "Xin lỗi, không có xuất chiếu vào ngày này, hãy chọn một ngày khác."

?>