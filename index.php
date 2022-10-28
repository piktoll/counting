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
            /* Korean numbers */
            let kon = ["", "일", "이", "삼", "사", "오", "육", "칠", "팔", "구"];
            /* Powers of Ten in Korean */
            let kop = ["", "십", "백", "천", "만", "십", "백", "천", "억", "십", "백", "천", "조",
                       "십", "백", "천", "경", "십", "백", "천", "해", "십", "백", "천", "자", "십", "백", "천", "양"];
            
            let dic = [
            ["", "egy", "kettő", "három", "négy", "öt", "hat", "hét",
            "nyolc", "kilenc"],
            ["", "tíz", "húsz", "harminc", "negyven", "ötven",
             "hatvan", "hetven", "nyolcvan", "kilencven"],
            ["", "", "száz", "ezer"]
            ];
            
            function convert() {
                input = numberIn.value;
                let a = input.toString();
                for (i = a.length-1, j = 0; i >= 0, j < a.length; i--, j++) {
                    result += kon[a[j]];
                    if (a[j] != 0) {
                        result += kop[i];
                    }
                }
                resultP.innerText = `${input}, azaz ${result}`;
            }
        </script>
    </body>
</html>
<!-- END OF FILE -->
