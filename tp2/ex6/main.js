onload = ()=>{

  const inputFields = document.querySelectorAll(".field .input");
  const  submitBtn=document.querySelector("#submit");
  const form=document.querySelector(".form.container");
  
  //regex
  const validText= /[a-zA-Z]/ig;
  const validNumber= /[0-9]/ig;
  let stats={};
  inputFields.forEach((entry)=>{
    stats[entry.name]=false;
  });
  let invalidField = (field,error="required field",color="#ff5722;")=>{
    stats[field.name]=false;
    field.setAttribute("placeholder","*");
    field.parentElement.classList.add("required");
    field.style.cssText = `
          border:${color} 2px solid;
          color:${color};
        `;
    field.parentElement.dataset.capt=error;
    setTimeout(()=>{
      field.parentElement.classList.remove("required");
    },3000);
  };
  let validField =(field)=>{
    stats[field.name]=true;
    field.parentElement.classList.remove("required");
    field.style.cssText = "";
  }

  function fieldsValidation(fields){
    fields.forEach((entry)=>{
      entry.addEventListener("blur", (e)=>{
        if(entry.value === ""){
          invalidField(entry);
        }else {
          validField(entry);
        switch(entry.getAttribute("gen")){
          case "name" :
            entry.value.match(validText)?validField(entry):invalidField(entry,"invalid input");
            break;
          case "number" :
            entry.value.match(validNumber)?validField(entry):invalidField(entry,"invalid input");
            break;
        }}
      })
    })
  }
  
  fieldsValidation(inputFields);
  submitBtn.addEventListener("click",(e)=>{
    inputFields.forEach((entry)=>{
      if(entry.value === ""){
        entry.parentElement.classList.add("required");
        invalidField(entry);
      }else {
        entry.parentElement.classList.remove("required");
        validField(entry);
      }
    });
  })

  form.onsubmit=()=>{
    let status=true;
    for(let stat in stats){
      if(stats[stat] === false)
      status=false;
    }
    return  status === true;
};
}