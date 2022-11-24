document.title = "Counting";

const formatter = new Intl.NumberFormat("en-US", {
    maximumFractionDigits: 0
});
const numberIn = document.getElementById("numberIn");
const submitBtn = document.getElementById("submitBtn");
const resultP = document.getElementById("resultP");
