<?php
    class Application {
        public $title;
        public $desc;
    
        function __construct($title, $desc) {
            $this->title = $title;
            $this->desc = $desc;
        }
    }

$app = new Application('🖐Counting', 'A simple but super useful web applet to spell out numbers.');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $app->title; ?></title>
        <link rel="stylesheet" type="text/css" href="./assets/css/main.css">
    </head>
    <body>
        <header>
            <h1><?php echo $app->title; ?></h1>
            <h3><?php echo $app->desc; ?></h3>
            <input id="numberIn" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="15" />
            <button onclick="convert(numberIn.value);" id="submitBtn">Convert</button>
        </header>
        <main>
            <p id="resultP">Enter a number and click the "Convert" button!</p>
        </main>
        <footer>
            <p>&copy;&nbsp;2022 Karhut Group. All Rights Reserved.</p>
        </footer>
        <script src="./assets/js/counting.js" type="text/javascript"></script>
    </body>
</html>
