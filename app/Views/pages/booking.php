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
    print_r($showing);
    echo '</pre>';
    ?>
    <?php foreach ($seats as $seat) : ?>
        <button onclick="addSeat('<?= $seat ?>')"><?= $seat ?></button>
    <?php endforeach; ?>
    <div id="result"></div>
    <script>
        console.log('is this working?');
        var url = `<?= site_url('/default/getSeat') ?>`;
        var seats = '';

        function addSeat(value) {
            var removedSeat = 0;
            var next = `${value}/`;
            if (seats.includes(next)) {
                seats = seats.replace(`${next}`, "");
                removedSeat = 1;
            } else if (seats.length >= 24) {
                alert('Bạn chỉ được đặt tối đa 8 ghế!');
                return;
            }
            if (!seats.includes(next) && removedSeat === 0) {
                seats = `${seats}` + `${next}`;
            } else {
                seats = seats.replace(`${next}`, "");
            }
            $("#result").load(`${url}/<?= $showing["id"] ?>/${seats}`);
            console.log(`${url}/<?= $showing["id"] ?>/${seats}`);

            ///seats = seats.concat(next);
            console.log(seats);
        };
    </script>
</div>