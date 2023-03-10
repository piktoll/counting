window.onload = function () {
    class NumberSet {
        constructor({ lang, zero, numerals, powers }) {
            this.lang = lang;
            this.zero = zero;
            this.numerals = numerals;
            this.powers = powers;
        }
    }

    const app = {
        title: '🖐Counting',
        desc: 'Spell it',
        year: 2022,
        publisher: 'Senrima Team',
        developer: 'Viktor Szrenka',
        convert: function (num) {
            const digits = Array.from(num.toString(), n => parseInt(n)).reverse();
            const result = [];
            result.push(`${app.formatter.format(num).toString()} is equal to`);
            
            /* for every language we have in our numbersets array */
            for (let l = 0; l < app.numbersets.length; l++) {
                const converted = [];
                
                if (num === 0) {
                    converted.push(app.numbersets[l].zero);
                } else {
                    for (let i = 0; i < digits.length; i++) {
                        if (digits[i] > 0) {
                            converted.push(`${app.numbersets[l].numerals.single[digits[i]]}${app.numbersets[l].powers[i]}`);
                        } else if (i > 0 && i % 4 === 0) {
                            /*
                            * If it's not the last digit (i > 0) and a ten thousand unit (a myriad) such as 만 or 조
                            * we only spell it out if its 4 digits are more than 0.
                            */
                            console.log(`Myriad found at index ${i}`);
                            let myriad = [];
                            for (let j = 0; j < 4; j++) {
                                myriad.push(digits[i+j]);
                                console.log(`${digits[i+j]} pushed at index ${i-j}`);
                            }
                            console.log(`Myriad parsed as ${parseInt(myriad.join(''))}`);
                            if (parseInt(myriad.join('')) > 0)
                                converted.push(app.numbersets[l].powers[i]);
                        }
                    }
                }
                result.push(`${converted.reverse().join('')} (in ${app.numbersets[l].lang})`);
            }
            return result.join(' ');
        },
        formatter: new Intl.NumberFormat('en-US', {
            maximumFractionDigits: 0
        }),
        numbersets: [
            new NumberSet({
                lang: 'Korean',
                zero: '영',
                numerals: {
                    single: ["", "일", "이", "삼", "사", "오", "육", "칠", "팔", "구"],
                    tens: ["", "일", "이", "삼", "사", "오", "육", "칠", "팔", "구"],
                    tenplus: ["", "일", "이", "삼", "사", "오", "육", "칠", "팔", "구"],
                },
                powers: ["", "십", "백", "천", "만", "십", "백", "천", "억", "십", "백", "천", "조", "십", "백", "천", "경", "십", "백", "천", "해"],
            })
        ],
        returnNotice: function () {
            return `CC-BY-SA&nbsp;3.0 ${app.year} ${app.publisher}. Developed by: ${app.developer}. All Rights Reserved.`;
        },
        returnTitle: function () {
            return `${this.title}`;
        },
        returnFullTitle: function () {
            return `${this.title} | ${this.desc}`;
        },
    }

    /* DOM */
    document.title = app.returnFullTitle();

    const headingEl = document.querySelector('#heading-el');
    headingEl.innerText = app.returnTitle();

    const resultEl = document.querySelector('#result-el');
    resultEl.innerText = `Enter a number and click the "Convert" button!`;
    const descEl = document.querySelector('#desc-el');
    descEl.innerText = `A simple but super useful web applet to spell out numbers.`;
    const numberEl = document.querySelector('#number-el');
    numberEl.addEventListener('input', function() {
        if (numberEl.value.length > numberEl.maxLength)
            numberEl.value = numberEl.value.slice(0, numberEl.maxLength);
    });
    const noticeEl = document.querySelector('#notice-el');
    noticeEl.innerHTML = app.returnNotice();

    const buttonEl = document.querySelector('#submit-btn');
    buttonEl.innerText = `Convert`;
    buttonEl.addEventListener('click', function () {
        const inputNumber = Math.max(Math.floor(numberEl.value), 0);
        resultEl.innerText = app.convert(inputNumber);
    });
}
