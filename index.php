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
        <input class="client_data" type="text" id="height" name="height" placeholder="Height in meters"><br>

        <label for="weight">Weight:</label><br>
        <input class="client_data" type="text" id="weight" name="weight" placeholder="Weight in kilograms"><br>

        <input class="button" type="submit" value="Calculate BMI"><br>
    </form>

    <div class="php">
        <?php
        error_reporting(E_ERROR | E_PARSE);
        $height = $_POST['height'];
        $weight = $_POST['weight'];

        $BMI = $weight / pow($height, 2);

        $BMI = number_format($BMI, 2);

        if (empty($height) || empty($weight)) {
            return '';
        } else if ($BMI < 18.5) {
            echo '<script>alert("Your BMI: ' . $BMI . '. You\'re in the underweight range.")</script>';
            print("<img src=\"./img/underweight.gif\" alt=\"underweight\">");
        } else if ($BMI < 25) {
            echo '<script>alert("Your BMI: ' . $BMI . '. You\'re in the healthy weight range.")</script>';
            print("<img src=\"./img/healthy.gif\" alt=\"healthy\">");
        } else if ($BMI < 30) {
            echo '<script>alert("Your BMI: ' . $BMI . '. You\'re in the overweight range.")</script>';
            print("<img src=\"./img/overweight.gif\" alt=\"overweight\">");
        } else {
            echo '<script>alert("Your BMI: ' . $BMI . '. You\'re in the obese range.")</script>';
            print("<img src=\"./img/obese.gif\" alt=\"obese\">");
        }
        ?>
    </div>
</body>

</html>