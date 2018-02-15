<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lottokone</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
  </head>
  <body>
    <h1>LOTTO</h1>
    <form method="get">
      <?php
        for ($i=0; $i <= 5; $i++) {
          echo '<input type="number" min="0" max="30" name="number_' . $i . '" required>';
        }
      ?> <br />
      <input type="submit" value="Arvo lottorivi" />
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
    <h2>
      <?php
        $result = array_intersect($_GET, $lotteryNumbers);

        if (count($result) < 6) {
          echo '<strong>' . count($result) . '</strong>' . " oikein. Ei voittoa tällä kertaa.";
        } else {
          echo count($result) . " oikein. Olet ansainnut päävoiton!";
        }
      ?>
    </h2>
  </body>
</html>
