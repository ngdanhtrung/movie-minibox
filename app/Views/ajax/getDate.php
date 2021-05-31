<?php
$duplicateName = [];
if ($showing) {
    foreach ($showing as $showingItem) : ?>
        <?php if (!in_array($showingItem['cinemaName'], $duplicateName)) : ?>
            <div class="containter-fluid mx-1 mb-5 border-bottom border-dark border-1 pb-3">
                <h6 class="mb-4 fs-4"><?= $showingItem["cinemaName"] ?></h6>
                <?php foreach ($showing as $showingTime) {
                    if ($showingTime["cinemaName"] == $showingItem["cinemaName"]) {
                        echo '<a href="' . base_url() . '/default/booking/' . $showingTime["id"] . '" style="text-decoration: none; color: inherit;">';
                        echo '<div class="d-inline p-2 px-4 me-1 timebox">';
                        echo $showingTime["showtime"];
                        echo '</div>';
                        echo '</a>';
                    }
                } ?>
            </div>
            <?php array_push($duplicateName, $showingItem['cinemaName']); ?>
        <?php endif; ?>
<?php endforeach;
} else echo "Xin lỗi, không có xuất chiếu vào ngày này, hãy chọn một ngày khác.";
/*echo '<pre>';
print_r($showing);
echo '</pre>';*/
?>