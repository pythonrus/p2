<?php
error_reporting(-1); # Report all PHP errors
ini_set('display_errors', 1);
?>

<?php require 'logic.php'; ?>

<!doctype html>
<html lang="en">
<html>
<head>

    <title>DWA P2 xkcd Password Generator</title><br/>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel='stylesheet' href='//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css' type='text/css'>

</head>

<body>

    <div class="container">

        <h1><strong>xkcd Password Generator</strong></h1>

        <img src='images/password_strength.png'><br>

        <p><p><strong>Is a string of common words simultaneously hard to guess and easy to remember, making it a good password?  Get your own password now!<strong></p></p>

        <p><p><a href="https://xkcd.com/936/">Original article on xkcd.com</a></p></p>

        <h2><mark><?php echo getpassword();?></mark></h2>

            <form
            class="pure-form pure-form-stacked"
            method="POST"
            action="index.php">
            <fieldset>

                <input id="wordnum" maxlength="1" name="wordnum" type="text" value="<?php echo isset($_POST['wordCount']) ? htmlspecialchars($_POST['wordCount']) : '' ?>"><br/>

                <label for="addnum" class="pure-checkbox">
                    Add number? <input id="addnum" type="checkbox" name="addnum" data-option="addnum">
                </label><br/>

                <label for="addchar" class="pure-checkbox">
                    Add special character? <input id="addchar" type="checkbox" name="addchar" data-option="addchar">
                </label><br/><br/>

                <button type="submit" class="pure-button pure-button-primary">GENERATE</button>

            </fieldset>
            <form/>

    </div>

</body>
</html>
