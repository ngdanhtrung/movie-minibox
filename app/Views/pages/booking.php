<div class="container">
    <?php
    $seats = [];
    $letterArr = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
    $bookedSeatString = "";
    for ($i = 0; $i < 7; $i++) {
        for ($j = 1; $j <= 8; $j++) {
            array_push($seats, $letterArr[$i] . $j);
        }
    }
    // echo '<pre>';
    // print_r($bookedSeats);
    // echo '</pre>';
    foreach ($bookedSeats as $bookedSeat) {
        $bookedSeatString = $bookedSeatString . $bookedSeat['seat'] . ', ';
    }
    //echo $bookedSeatString;
    ?>
    <div class="container seats-selection">
        <h4 style="text-align:center">Màn Hình</h4>
        <div class="row row-cols-8 g-2">
            <?php foreach ($seats as $seat) : ?>
                <div class="col">
                    <?php if (str_contains($bookedSeatString, '"' . $seat . '"')) : ?>
                        <button class="btn btn-danger"><?= $seat ?></button>
                    <?php else : ?>
                        <button class="btn btn-light" onclick="addSeat('<?= $seat ?>')"><?= $seat ?></button>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>                    
    <div class="container">
        <p id="result"></p>
    </div>

</div>
<script>
    $(document).ready(function() {
        $("#result").load(`${url}/<?= $showing["id"] ?>/`);
        $(".btn").click(function(){
            if (seatMax){
                if (this.className == "btn btn-light"){
                    $(this).removeClass("btn-light");
                    $(this).addClass("btn-success");
                }else{
                    $(this).removeClass("btn-success");
                    $(this).addClass("btn-light");
                }
            }
        });
        console.log(`${url}/<?= $showing["id"] ?>/`);
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
    console.log('is this working?');
    var url = `<?= site_url('/default/getSeat') ?>`;
    var seats = '';
    var seatArr = [];
    var seatMax = true;

    function addSeat(value) {
        var removedSeat = 0;
        var next = `${value}/`;
        if (seats.includes(next)) {
            seatMax = true;
            seats = seats.replace(`${next}`, "");
            removeA(seatArr, next);
            removedSeat = 1;
        } else if (seatArr.length > 7) {
            seatMax = false;
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
        console.log(`${url}/<?= $showing["id"] ?>/${seats}`);
        console.log(seats);
    };
</script>