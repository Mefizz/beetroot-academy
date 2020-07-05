<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .desk {
            width: 800px;
            height: 800px;
            display: block;
            position: absolute;
            top: 100px;
            left: 50%;
            transform: translateX(-50%);
        }

        .cell {
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            float: left;
            border: 1px solid sandybrown;
            font-size: 80px;
            -webkit-text-stroke-width: 1px;
        }

        .deck-edge {
            width: 1000px;
            height: 1000px;
            background-color: saddlebrown;
            display: block;
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .cell-edge {
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            float: left;
            font-size: 3rem;
            background-color: saddlebrown;
            color: sandybrown;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="deck-edge">
        <?php for ($i = 1; $i <= 100; $i++): ?>
            <?php if ($i == 11 || $i == 21 || $i == 31 || $i == 41 || $i == 51 || $i == 61 || $i == 71 || $i == 81): ?>
                <div class="cell-edge" style="transform: rotate(0deg)">
                    <?= 9 - ($i - 1) / 10 ?>
                </div>
            <?php elseif ($i == 20 || $i == 30 || $i == 40 || $i == 50 || $i == 60 || $i == 70 || $i == 80 || $i == 90): ?>
                <div class="cell-edge" style="transform: rotate(180deg)">
                    <?= 9 - ($i / 10 - 1); ?>
                </div>
            <?php elseif ($i == 92 || $i == 93 || $i == 94 || $i == 95 || $i == 96 || $i == 97 || $i == 98 || $i == 99): ?>
                <div class="cell-edge" style="transform: rotate(0deg)">
                    <?= chr(5 + $i); ?>
                </div>
            <?php elseif ($i == 2 || $i == 3 || $i == 4 || $i == 5 || $i == 6 || $i == 7 || $i == 8 || $i == 9): ?>
                <div class="cell-edge" style="transform: rotate(180deg)">
                    <?= chr(97 + ($i - 2)); ?>
                </div>
            <?php else : ?>
                <div class="cell-edge">
                </div>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
    <div class="desk">
        <?php for ($i = 1; $i <= 64; $i++): ?>
            <?php $color = 'sandybrown' ?>
            <?php if ((ceil($i / 8) % 2 === 0) && $i % 2 !== 0 || (ceil($i / 8) % 2 !== 0) && $i % 2 === 0) : ?>
                <?php $color = 'saddlebrown' ?>
            <?php endif; ?>
            <?php if (ceil($i / 8) == 2): ?>
                <div class="cell"
                     style="background-color: <?= $color ?>; -webkit-text-stroke-color: wheat; font-size: 50px;">
                    ♟
                </div>
            <?php elseif (ceil($i / 8) == 7)  : ?>
                <div class="cell" style="background-color: <?= $color ?>; -webkit-text-stroke-color: beige">
                    ♙
                </div>
            <?php elseif (ceil($i / 8) == 1): ?>
                <div class="cell" style="background-color: <?= $color ?>; -webkit-text-stroke-color: wheat">
                    <?php if ($i == 1 || $i == 8): ?>
                        ♜
                    <?php elseif ($i == 2 || $i == 7): ?>
                        ♞
                    <?php elseif ($i == 3 || $i == 6): ?>
                        ♝
                    <?php elseif ($i == 4): ?>
                        ♛
                    <?php elseif ($i == 5): ?>
                        ♚
                    <?php endif; ?>
                </div>
            <?php elseif (ceil($i / 8) == 8)  : ?>
                <div class="cell" style="background-color: <?= $color ?>; -webkit-text-stroke-color: beige">
                    <?php if ($i == 57 || $i == 64): ?>
                        ♖
                    <?php elseif ($i == 58 || $i == 63): ?>
                        ♘
                    <?php elseif ($i == 59 || $i == 62): ?>
                        ♗
                    <?php elseif ($i == 60): ?>
                        ♕
                    <?php elseif ($i == 61): ?>
                        ♔
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <div class="cell" style="background-color: <?= $color ?>">
                </div>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
</div>
</body>
</html>