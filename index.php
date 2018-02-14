<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lottokone</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <h1>Tervetuloa lauantain lottoon!</h1>
    <form method="get">
      <?php
        for ($i=0; $i <= 5; $i++) {
          echo '<input type="number" min="0" max="30" name="number_' . $i . '" required>';
        }
      ?>
      <input type="submit" />
    </form>
    <p>
    <?php
      if (count($_GET) !== count(array_unique($_GET)) && $_GET !== null) {
        echo '<span class="warning">Kaikkien numeroiden tulee olla uniikkeja!</span>';
      } else {
        echo 'Täyttämäsi rivi: ';
        foreach ($_GET as $key => $value) {
          echo $value . " ";
        };
      }
    ?>
    </p>
    <p> Oikea lottorivi:
      <?php
        $lotteryNumbers = array();

        while (count($lotteryNumbers) <= 6) {
          while (in_array($randomNumber, $lotteryNumbers)) {
            $randomNumber = rand(0,30);
          }
          array_push($lotteryNumbers, $randomNumber);
        }

        for ($i=0; $i < count($lotteryNumbers); $i++) {
          echo $lotteryNumbers[$i] . " ";
        }
      ?>
    </p>
    <p>
      <?php
        $result = array_intersect($_GET, $lotteryNumbers);

        if (count($result) < 6) {
          echo count($result) . " oikein. Ei voittoa tällä kertaa.";
        } else {
          echo count($result) . " oikein. Olet ansainnut päävoiton!";
        }
      ?>
    </p>
  </body>
</html>
