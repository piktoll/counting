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
