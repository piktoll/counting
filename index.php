<?php
    $title = 'Counting';
?>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <style>* { box-sizing: border-box; text-align: center; }</style>
    </head>
    <body>
        <input type="number" id="numberIn" />
        <button onclick="convert();" id="submitBtn"></button>
        <p id="resultP"></p>
        <script type="text/javascript">
            let input = 0;
            let result = "";
            const numberIn = document.getElementById("numberIn");
            const submitBtn = document.getElementById("submitBtn");
            const resultP = document.getElementById("resultP");
            
            let dic = [
            ["", "egy", "kettő", "három", "négy", "öt", "hat", "hét",
            "nyolc", "kilenc"],
            ["", "tíz", "húsz", "harminc", "negyven", "ötven",
             "hatvan", "hetven", "nyolcvan", "kilencven"]
            ];
            
            let kodic = ["", "십", "백", "천", "만", "백만", "천만", "억"];
            
            function convert() {
                input = numberIn.value;
                resultP.innerText = `${input}, azaz ${result}`;
            }
        </script>
    </body>
</html>
<!-- END OF FILE -->
