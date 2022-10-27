<?php
    $title = 'Counting';
?>
<html>
    <head>
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <input type="number" id="numberIn" />
        <button onclick="" name="submit"></button>
        <script type="text/javascript">
            let a = "";
            const numberIn = document.getElementById("numberIn");
            let dic = [
            ["", "egy", "kettő", "három", "négy", "öt", "hat", "hét",
            "nyolc", "kilenc"],
            ["", "tíz", "húsz", "harminc", "negyven", "ötven",
             "hatvan", "hetven", "nyolcvan", "kilencven"]
            ];
        </script>
    </body>
</html>
<!-- END OF FILE -->
