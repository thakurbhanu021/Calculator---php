<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <input type="number" name="num01" placeholder="number one">
        <select name="operator" id="operator">
            <option value="add">Plus (+)</option>
            <option value="subtract">Minus (-)</option>
            <option value="divide">Divide (/) </option>
            <option value="multiply">Multiply (*) </option>
        </select>
        <input type="number" name="num02" placeholder="number two">

        <button>Calculate</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // grab data from inputs
        $num01 = filter_input(INPUT_POST, 'num01', FILTER_SANITIZE_NUMBER_FLOAT);
        $num02 = filter_input(INPUT_POST, 'num02', FILTER_SANITIZE_NUMBER_FLOAT);
        $operator = htmlspecialchars($_POST['operator']);

        // error handler

        $error = false;

        if (empty($num01) || empty($num02) || empty($operator)) {
            echo '<p>Fill in all the fields!</p>';
            $error = true;
        }

        if (!is_numeric($num01) || !is_numeric($num02)) {
            echo '<p>Only write numbers!</p>';
            $error = true;
        }

        // calucation after no error

        if (!$error) {
            $value = 0;
            switch ($operator) {
                case 'add':
                    $value = $num01 + $num02;
                    break;
                case 'subtract':
                    $value = $num01 - $num02;
                    break;
                case 'multiply':
                    $value = $num01 * $num02;
                    break;
                case 'divide':
                    $value = $num01 / $num02;
                    break;

                default:
                echo " <p> Something went wrong!! </p> ";
            }
            echo "<p> Result = " . $value . "</p>";
        }
    }
    ?> 

</body>

</html>