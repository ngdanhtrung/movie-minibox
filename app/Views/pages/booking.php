<div class="container">
    <?php
    $seats = [];
    $letterArr = ['A', 'B', 'C', 'D', 'E'];
    for ($i = 0; $i < 5; $i++) {
        for ($j = 0; $j <= 10; $j++) {
            array_push($seats, $letterArr[$i] . $j);
        }
    }
    echo '<pre>';
    print_r($bookedSeats);
    echo '</pre>';
    ?>
    <?php foreach ($seats as $seat) : ?>
        <?php foreach ($bookedSeats as $bookedSeat) : ?>
            <?php if (str_contains($bookedSeat['seat'], '"' . $seat . '"')) : ?>
                <button style="background: red" onclick="addSeat('<?= $seat ?>')"><?= $seat ?></button>
            <?php else : ?>
                <button onclick="addSeat('<?= $seat ?>')"><?= $seat ?></button>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
    <div id="result"></div>
</div>
<script>
    $(document).ready(function() {
        $("#result").load(`${url}/<?= $showing["id"] ?>/`);
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

    function addSeat(value) {
        var removedSeat = 0;
        var next = `${value}/`;
        if (seats.includes(next)) {
            seats = seats.replace(`${next}`, "");
            removeA(seatArr, next);
            removedSeat = 1;
        } else if (seatArr.length >= 8) {
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