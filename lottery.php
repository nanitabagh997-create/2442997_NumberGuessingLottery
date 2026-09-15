<?php

// Generate 6 unique lottery numbers
$lottery = [];

while (count($lottery) < 6) {

    $number = rand(1, 49);

    if (!in_array($number, $lottery)) {
        $lottery[] = $number;
    }
}

// Check form submission
if (isset($_POST['submit'])) {

    $user = [
        $_POST['num1'],
        $_POST['num2'],
        $_POST['num3'],
        $_POST['num4'],
        $_POST['num5'],
        $_POST['num6']
    ];

    // Find matching numbers
    $matches = array_intersect($user, $lottery);

    $total = count($matches);
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Number Guessing Lottery</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            margin: 0;
            padding: 0;
        }

        .container {
            width: 600px;
            margin: 70px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 10px 30px rgba(0,0,0,0.3);
            text-align: center;
        }

        h1 {
            color: #4b3f72;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 25px;
        }

        .numbers {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        input[type="number"] {
            width: 55px;
            height: 45px;
            border: 2px solid #ccc;
            border-radius: 8px;
            text-align: center;
            font-size: 16px;
        }

        input[type="number"]:focus {
            border-color: #667eea;
            outline: none;
        }

        input[type="submit"] {
            margin-top: 25px;
            padding: 12px 30px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #4f5fc4;
        }

        .result {
            margin-top: 30px;
            padding: 20px;
            background: #f5f6ff;
            border-radius: 10px;
            text-align: left;
        }

        .result h2 {
            text-align: center;
            color: #4b3f72;
        }

        .result p {
            font-size: 16px;
            padding: 8px;
        }

        .matches {
            color: #008000;
            font-weight: bold;
        }

        .total {
            text-align: center;
            background: #667eea;
            color: white;
            padding: 12px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
        }

        .footer {
            margin-top: 25px;
            color: #999;
            font-size: 13px;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>🎟️ Number Guessing Lottery</h1>

    <p class="subtitle">
        Enter 6 unique numbers between 1 and 49
    </p>

    <form method="post">

        <div class="numbers">

            <input type="number" name="num1" min="1" max="49" required>

            <input type="number" name="num2" min="1" max="49" required>

            <input type="number" name="num3" min="1" max="49" required>

            <input type="number" name="num4" min="1" max="49" required>

            <input type="number" name="num5" min="1" max="49" required>

            <input type="number" name="num6" min="1" max="49" required>

        </div>

        <input type="submit" name="submit" value="Check Lottery">

    </form>


    <?php

    if (isset($_POST['submit'])) {

    ?>

        <div class="result">

            <h2>🎯 Lottery Result</h2>

            <p>
                <b>Generated Numbers:</b>
                <?php echo implode(", ", $lottery); ?>
            </p>

            <p>
                <b>Your Numbers:</b>
                <?php echo implode(", ", $user); ?>
            </p>

            <p class="matches">
                <b>Matching Numbers:</b>

                <?php

                if ($total > 0) {
                    echo implode(", ", $matches);
                } else {
                    echo "No matching numbers";
                }

                ?>
            </p>

            <div class="total">

                Total Matches: <?php echo $total; ?>

            </div>

        </div>

    <?php

    }

    ?>

    <div class="footer">
        Number Guessing Lottery System
    </div>

</div>

</body>
</html>