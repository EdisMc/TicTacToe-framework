<?php


use App\src\services\MultiPlayerService;

$gameResult = new MultiPlayerService();
$gameResult->checkGameResult();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/styles.css">
    <title>Tic Tac Toe</title>
</head>
<body>
<main>
    <div class="d-flex flex-column align-items-center justify-content-center mt-5 mx-auto">
        <h2 class="fs-1 fw-bold">Tic Tac Toe</h2>
        <aside class="gap-5 d-flex align-items-center justify-content-center my-5 mx-auto">
            <h3 class="fs-3 fw-semibold">Player vs Player</h3>
        </aside>

        <?php
        if ($gameResult->checkGameResult()) {
            echo "<h2 class='d-flex align-items-center justify-content-center mb-3'>The winner is
                        <strong class='pl-2 fs-3 d-flex align-items-center justify-content-center'>{$gameResult->checkGameResult()}</strong>
                    </h2>";
        } else {
            echo "Game is running";
        }
        ?>

        <form action="" method="post" class="d-block align-content-center mx-auto">
            <div>
                <?php
                for ($i = 0; $i <= 2; $i++) {
                    for ($j = 0; $j <= 2; $j++) {
                        // value='" . $gameBoard[$i][$j] . "'
                        echo "<input type='submit' data-row='$i' data-col='$j' value='" . $gameBoard[$i][$j] . "'  class='box-model' name='cell[$i][$j]'/>";
                    }
                    echo "<br>";
                }
                ?>
            </div>
            <div class="row align-items-center justify-content-center my-3 mx-auto">
                <div class="col">
                    <a target="_parent" href="./reset" id='reset' class='btn btn-info'>Exit </a>
                </div>
                <button type='submit' name='reset' id='reset' class='btn btn-info'>Reset Game</button>
                <div class="col">
                    <a class="btn btn-warning" target="_parent" id="switch" href="./computer">Switch Mode</a>
                </div>
            </div>
        </form>
    </div>

</main>
</body>