let num1 = 9;
let str = "9";
let str2 = "20";

// Output
// "{num1} Is The Same Value As {str}"
// "{num1} Is The Same Value As {str} But Not The Same Type"
// "{num1} Is Not The Same Value Or The Same Type As {str2}"
// "{str} Is The Same Type As {str2} But Not The Same Value"

console.log( num1 + (num1 == str ?" Is The Same Value As ":" Is Not The Same Value As ")  + str);
console.log(num1 + (num1 == str ? " Is The Same Value As " + str + (num1 === str ? " And The Same Type" : " But Not The Same Type") : " Is Not The Same Value As " + str));
console.log(num1 + (num1 === str2 ? " Is The Same Value And The Same Type As " : " Is Not The Same Value Or The Same Type As ") + str2);
console.log(str + (typeof str == typeof str2 ? " Is The Same Type As " + str2 + (str === str2 ? " And The Same Value" : " But Not The Same Value") : " Is Not The Same Type As " + str2));
