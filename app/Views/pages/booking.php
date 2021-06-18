<div class="container">
    <?php
    session()->set('valid', 1);
    $seats = [];
    $letterArr = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
    $bookedSeatString = "";
    for ($i = 0; $i < 7; $i++) {
        for ($j = 1; $j <= 8; $j++) {
            array_push($seats, $letterArr[$i] . $j);
        }
    }
    /*echo '<pre>';
    print_r($showing);
    echo '</pre>';*/
    foreach ($bookedSeats as $bookedSeat) {
        $bookedSeatString = $bookedSeatString . $bookedSeat['seat'] . ', ';
    }
    $availSeats = [];
    ?>
    <div class="container mt-5" style="width: 800px">
        <div class="dashboard m-0">
            <h6 class="fw-bold fs-6 py-1 m-0" style="color: #fff">BOOKING ONLINE</h6>
        </div>
        <div class="top-content">
            <h6 class="fw-bold fs-6"><?= $showing['movieName'] . ' | ' . $showing['cinemaName'] . ' | Cinema ' . $showing['room'] ?></h6>
            <h6 class="fw-bold fs-6"><?= $showing['showtime'] ?> ~ <?= $showing['endtime'] ?></h6>
        </div>
    </div>

    <div class="container seats-selection my-5">
        <div class="screen"></div>
        <div class="row row-cols-8 g-2">
            <?php foreach ($seats as $seat) : ?>
                <div class="col">
                    <?php if (strpos($bookedSeatString, $seat) !== false) : //because I changed input data so we don't need double quote
                    ?>
                        <button class="btn btn-danger" style="width: 48px"><?= $seat ?></button>
                    <?php else : ?>
                        <button class="btn btn-light" style="width: 48px" onclick="addSeat('<?= $seat ?>')"><?= $seat ?></button>
                        <?php array_push($availSeats, $seat) ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php $js_array = json_encode($availSeats);
    //echo "var javascript_array = " . $js_array . ";\n"; 
    ?>
    <div class="container">
        <p id="result"></p>
    </div>

</div>
<script>
    $(document).ready(function() {
        $("#result").load(`${url}/<?= $showing["id"] ?>/`);
        $(".btn").click(function() {
            $(".btn").attr('disabled', 'disabled');
            setTimeout(enable, 1000);
            $.ajax({
                type: "POST",
                url: '<?= site_url('/handleAjax') ?>',
                data: {
                    action: 'call_this'
                },
                success: function(html) {
                    console.log(html);
                }
            });
            if (!seatMax) {
                if (this.className == "btn btn-light") {
                    $(this).removeClass("btn-light");
                    $(this).addClass("btn-success");
                } else if (this.className == "btn btn-success") {
                    $(this).removeClass("btn-success");
                    $(this).addClass("btn-light");
                }
            }
        });

        function enable() {
            $('.btn').removeAttr('disabled');
        }
        //console.log(`${url}/<?= $showing["id"] ?>/`);
    });

    function removeA(arr) {
        var what, a = arguments,
            L = a.length,
            ax;
        while (L > 1 && arr.length) {
            what = a[--L];
            while ((ax = arr.indexOf(what)) !== -1) {
                arr.splice(ax, 1);
            }
        }
        return arr;
    };
    const url = `<?= site_url('/default/getSeat') ?>`;
    var seats = '';
    var seatArr = [];
    var seatMax = false;
    const matchArr = <?php echo $js_array; ?>;

    function addSeat(value) {
        if (matchArr.includes(value) === false) {
            return;
        }
        var removedSeat = 0;
        var next = `${value}/`;
        if (seats.includes(next)) {
            seats = seats.replace(`${next}`, "");
            removeA(seatArr, next);
            seatMax = false;
            removedSeat = 1;
        } else if (seatArr.length > 7) {
            seatMax = true;
            alert('Bạn chỉ được đặt tối đa 8 ghế!');
            return;
        }
        if (!seats.includes(next) && removedSeat === 0) {
            seats = `${seats}` + `${next}`;
            seatArr.push(next);
        } else {
            seats = seats.replace(`${next}`, "");
            removeA(seatArr, next);
        }
        $("#result").load(`${url}/<?= $showing["id"] ?>/${seats}`);
        /*console.log(`${url}/<?= $showing["id"] ?>/${seats}`);
        console.log(seats);*/
    };
</script>