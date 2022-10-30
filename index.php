<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Counting</title>
    <style>
        :root {
            --primary: #b3c;
            --white: #fff;
            --primary-light: #ebe;
        }

        * {
            box-sizing: border-box;
            text-align: center;
            font-family: sans-serif;
        }

        body {
            margin: 0;
        }

        h1 {
            color: var(--primary);
        }

        button {
            padding: 1rem 2rem;
            background: var(--primary);
            color: var(--white);
            border-radius: 9px;
            border: 0px solid var(--white);
        }

        #numberIn {
            box-sizing: border-box;
            border: 0.05rem solid var(--primary);
            padding: 1rem 0rem;
            border-radius: 9px;
        }

        #resultP {
            padding: 1rem;
            background: var(--primary-light);
        }

        header {
            padding: 2rem;
        }

        footer {
            border-top: 0.05rem solid var(--primary);
        }
    </style>
</head>

<body>
    <header>
        <h1>🖐Counting</h1>
        <h3>A simple but super useful web applet to spell out numbers.</h3>
        <input id="numberIn" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="15" />
        <button onclick="convert(numberIn.value);" id="submitBtn">Convert</button>
    </header>

    <main>
        <p id="resultP">Enter a number and click the "Convert" button!</p>
    </main>

    <footer>
        <p>&copy; 2022 Karhut Group. All Rights Reserved.</p>
    </footer>

    <script type="text/javascript">
        const formatter = new Intl.NumberFormat('en-US', {
            maximumFractionDigits: 0
        });
        const numberIn = document.getElementById("numberIn");
        const submitBtn = document.getElementById("submitBtn");
        const resultP = document.getElementById("resultP");

        /* Korean numbers */
        let koz = "영";
        let kon = ["", "일", "이", "삼", "사", "오", "육", "칠", "팔", "구"];

        /* Seung or Powers of Ten in Korean */
        let kop = ["", "십", "백", "천", "만", "십", "백", "천", "억", "십", "백", "천", "조",
            "십", "백", "천", "경", "십", "백", "천", "해"
        ];

        /*
        Ha az adott szám 3-mal való osztása után maradék az 1, akkor
        Ha az utána álló szám nem nulla, a harmadik szettet kell használni
        "tizen", "huszon",

        Ha igen, akkor a második szettet "tíz", "húsz"

        if (n % 3 === 1) {
            if (a[n+1] != 0) {
            //harmadik szett
            } else {
            // masodik szett
            }
        }

        */

        /* Hungarian numbers */
        let hun = [
            ["", "egy", "kettő", "három", "négy", "öt", "hat", "hét", "nyolc", "kilenc"],
            ["", "tíz", "húsz", "harminc", "negyven", "ötven", "hatvan", "hetven", "nyolcvan", "kilencven"],
            ["", "tizen", "huszon", "harminc", "negyven", "ötven", "hatvan", "hetven", "nyolcvan", "kilencven"]
        ];

        /* Hatvany or Powers of Ten in Hungarian */
        let hup = ["", "", "száz", "ezer", "", "", "millió", "", "", "milliárd", "", "", "billió"];

        function convert(input) {
            let result = [
                "", "", ""
            ];
            let a = input.toString();



            // ENGLISH


            // HUNGARIAN
            /* for (i = a.length-1, j = 0; i >= 0, j < a.length; i--, j++) {

                 result[1] += hun[0][a[j]];
                 
                 if ((a[j] != 0) || (i % 4) === 0 && i < a.length || (i % 4) === 0 && a[j-1] != 0 && a[j-2] != 0 && a[j-3] != 0) { // Ki kell írni az n-t, ha az (a[n+1] + a[n+2] + a[n+3]) > 0... If i can be divided by four without a remainder, e.g. if (i == 4 || i == 8 || i == 12)
                     result[1] += kop[i];
                 }

                 if (j % 3 === 1) {
                     if (a[j+1] != 0) {
                         result[1] += hun[2][a[j]];
                     } else {
                         result[1] += hun[1][a[j]];
                     }
                 }
             } */

            // KOREAN
            if (input == 0 || input == null) {
                result[2] = koz;
            } else {
                for (i = a.length - 1, j = 0; i >= 0, j < a.length; i--, j++) {
                    // i: helyiertek, j: szamertek

                    result[2] += kon[a[j]];
                    // if ((a[j] != 0) || (a[j-1] != null) && ((i % 4) === 0) && (a[j-1] + a[j-2] + a[j-3]) > 0) { // Ki kell írni az n-t, ha az (a[n+1] + a[n+2] + a[n+3]) > 0... If i can be divided by four without a remainder, e.g. if (i == 4 || i == 8 || i == 12)

                    if (i % 4 == 0 && (a[j] + a[j - 1] + a[j - 2] + a[j - 3]) >= 1 || a[j] >= 1) {
                        result[2] += kop[i];
                        /* if (i % 4 == 0) {
                        result[2] += `${a[j-3]}, ${a[j-2]}, ${a[j-1]}`;
                        } */

                    }
                }

                input = formatter.format(input);
                resultP.innerHTML = `${input} equals to:<br/>${result[0]}<br/>${result[1]}<br/>${result[2]}`;
                /* for (i = 0; i < a.length; i++) {
                    resultP.innerHTML += `${a[i]} `;
                }
                 */
            }
        }
    </script>
</body>

</html>