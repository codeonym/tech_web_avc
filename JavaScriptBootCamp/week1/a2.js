onload=()=>{
  let h1=document.createElement("h1");
  let h1TextNode=document.createTextNode("Elzero");
  h1.append(h1TextNode);
  h1.style.cssText=`
  color: blue;
  font-size: 80px;
  font-weight: bold;
  text-align: center;
  font-family: Arial`;
  document.body.prepend(h1);

}