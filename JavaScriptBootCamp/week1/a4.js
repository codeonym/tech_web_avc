
console.group("%cGroup 1","font-weight:bold");
console.log("Message One");
console.log("Message Two");

console.group("%cGroup Child","font-weight:bold");
console.log("Message One");
console.log("Message Two");

console.group("%cGroup Grand Child","font-weight:bold");
console.log("Message One");
console.log("Message Two");

console.groupEnd();
console.groupEnd();
console.groupEnd();

console.group("%cGroup 2","font-weight:bold");
console.log("Message One");
console.log("Message Two");
