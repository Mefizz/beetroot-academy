<?php
$figure = null;

function makeWhiteCell($figure)
{
    echo "<div class=\"cell white\">
          <div class=\"figure\">$figure</div>
          </div>";
}

function makeEmptyWhiteCell()
{
    echo "<div class=\"cell white\"></div>";
}

function makeBlackCell($figure)
{
    echo "<div class=\"cell black\">
                                 <div class=\"figure\">$figure</div>
                                 </div>";
}

function makeEmptyBlackCell()
{
    echo "<div class=\"cell black\"></div>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
<div class="container">
    <div class="desk">
        <?php
        for ($row = 1; $row <= 8; $row++) {
            echo "<cell>";
            for ($col = 1; $col <= 8; $col++) {
                $total = $row + $col;
                if ($total % 2 == 0) {


                    switch ($row) {
                        case $row % 2 === 0 && $row <= 2:
                            makeWhiteCell('&#9823');
                            break;
                        case $row % 7 === 0:
                            makeWhiteCell('&#9817');
                            break;
                        case $row % 1 === 0 & $col % 5 === 0:
                            makeWhiteCell('&#9818');
                            break;
                        case $row % 1 === 0 & $col % 7 === 0:
                            makeWhiteCell('&#9822');
                            break;
                        case $row % 1 === 0 & $col % 3 === 0:
                            makeWhiteCell('&#9821');
                            break;
                        case $row % 1 === 0 & $col % 1 === 0:
                            makeWhiteCell('&#9820');
                            break;
                        case $row % 8 === 0 && $col % 2 === 0 & $col <= 2 :
                            makeWhiteCell('&#9816');
                            break;
                        case $row % 8 === 0 && $col % 4 === 0 & $col <= 4 :
                            makeWhiteCell('&#9813');
                            break;
                        case $row % 8 === 0 && $col % 6 === 0 & $col <= 6 :
                            makeWhiteCell('&#9815');
                            break;
                        case $row % 8 === 0 && $col % 8 === 0 & $col <= 8 :
                            makeWhiteCell('&#9814');
                            break;

                        default:
                            makeEmptyWhiteCell();
                    }
                } else {
                    switch ($row) {
                        case $row % 2 === 0 && $row <= 2:
                            makeBlackCell('&#9823');
                            break;
                        case $row % 7 === 0:
                            makeBlackCell('&#9817');
                            break;
                        case $row % 1 === 0 & $col % 2 === 0 & $col <= 2:
                            makeBlackCell('&#9822');
                            break;
                        case $row % 1 === 0 & $col % 4 === 0 & $col <= 4:
                            makeBlackCell('&#9819');
                            break;
                        case $row % 1 === 0 & $col % 6 === 0:
                            makeBlackCell('&#9821');
                            break;
                        case $row % 1 === 0 & $col % 8 === 0 & $row <= 1:
                            makeBlackCell('&#9820');
                            break;
                        case $row % 8 === 0 && $col % 1 === 0 & $col <= 1 :
                            makeBlackCell('&#9814');
                            break;
                        case $row % 8 === 0 && $col % 3 === 0 & $col <= 3 :
                            makeBlackCell('&#9815');
                            break;
                        case $row % 8 === 0 && $col % 5 === 0 & $col <= 5 :
                            makeBlackCell('&#9812');
                            break;
                        case $row % 8 === 0 && $col % 7 === 0 & $col <= 7 :
                            makeBlackCell('&#9816');
                            break;

                        default:
                            makeEmptyBlackCell();
                    }
                }
            }
            echo "</cell>";
        }
        ?>
    </div>
</div>
</body>
</html>
