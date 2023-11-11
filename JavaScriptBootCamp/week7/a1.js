// Test Case 1
let num1 = 9; // "009"

// Test Case 2
let num2 = 20; // "020"

// Test Case 3
let num3 = 110; // "110"

console.log(num1 <= 10 ? "00" + num1 : num1 >= 10 && num1 < 100 ? "0" + num1 : num1 >= 100 ? num1 : "");

console.log(num2 < 10 ? "00" + num2 : num2 >= 10 && num2 < 100 ? "0" + num2 : num2 >= 100 ? num2 : "");

console.log(num3 < 10 ? "00" + num3 : num3 >= 10 && num3 < 100 ? "0" + num3 : num3 >= 100 ? ""+num3:"");