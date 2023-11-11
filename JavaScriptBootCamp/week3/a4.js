let points = 10;

points += +points.toString().length;
points++;

console.log(points); // 13

points = Math.ceil( points / +points.toString().length);
points++;


console.log(points); // 8;