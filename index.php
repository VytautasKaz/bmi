<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <form class="form_bmi" action="./index.php" method="POST">
        <label for="height">Height:</label><br>
        <input class="client_data" type="text" id="height" name="height" placeholder="Height in meters, eg. 1.8"><br>

        <label for="weight">Weight:</label><br>
        <input class="client_data" type="text" id="weight" name="weight" placeholder="Weight in kilograms, eg. 70"><br>

        <input class="button" type="submit" value="Calculate BMI"><br>
    </form>

    <div class="php">
        <?php

        error_reporting(E_ERROR | E_PARSE);

        $height = $_POST['height'];
        $weight = $_POST['weight'];

        if (isset($height) && isset($weight)) {

            if ($weight === '0' || $height === '0' || empty($weight) || empty($height)) {
                echo 'Your weight and/or height cannot be 0 or empty.<br>';
            }
            if (!isset($height)) {
                echo 'Height field cannot be empty';
            }
            if (!isset($weight)) {
                echo 'Weight field cannot be empty';
            }

            $BMI = $weight / pow($height, 2);

            $BMI = number_format($BMI, 2);


            if ($BMI <= 0) {
                echo 'Height and weight inputs have to be positive numbers.';
            } else if ($BMI < 18.5) {
                echo '<p style="text-align: center">Your BMI: ' . $BMI . '. You\'re in the underweight range, get something to eat.</p>';
                print("<img src=\"./img/underweight.gif\" alt=\"underweight\">");
            } else if ($BMI < 25) {
                echo '<p style="text-align: center">Your BMI: ' . $BMI . '. You\'re in the healthy weight range, keep it going.</p>';
                print("<img src=\"./img/healthy.gif\" alt=\"healthy\">");
            } else if ($BMI < 30) {
                echo '<p style="text-align: center">Your BMI: ' . $BMI . '. You\'re in the overweight range.</p>';
                print("<img src=\"./img/overweight.gif\" alt=\"overweight\">");
            } else {
                echo '<p style="text-align: center">Your BMI: ' . $BMI . '. You\'re in the obese range.</p>';
                print("<img src=\"./img/obese.gif\" alt=\"obese\">");
            }
        }
        ?>
    </div>
</body>

</html>