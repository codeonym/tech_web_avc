onload = ()=>{

  const inputFields = document.querySelectorAll(".field .input");
  const  submitBtn=document.querySelector("#submit");
  const radioBox =document.querySelectorAll(".container .field .gender label input");
  const form=document.querySelector("form.container");
  radioBox.forEach((e)=>e.addEventListener("click",()=>{
    radioBox.forEach((e)=>e.parentElement.classList.remove("checked"));
    e.parentElement.classList.add("checked");
  }))

    //regex
  const validText= /[a-zA-Z]/ig;
  const validEmail=/[a-zA-Z0-9]@[a-zA-Z]/ig;
  let stats={};
  inputFields.forEach((entry)=>{
    stats[entry.name]=false;
  });
  stats[radioBox[0].name]=false;
  let invalidField = (field,error="required field",color="#f05454")=>{
    stats[field.name]=false;
    field.setAttribute("placeholder","*");
    field.closest(".field").classList.add("required");
    field.closest(".input").style.cssText = `
          border:${color} 2px solid;
          color:${color};
        `;
    field.closest(".field").dataset.capt=error;
    setTimeout(()=>{
      field.closest(".field").classList.remove("required");
    },3000);
  };
  let validField =(field)=>{
    stats[field.name]=true;
    field.closest(".field").classList.remove("required");
    field.closest(".input").style.cssText = "";
  }

  function fieldsValidation(fields){
    radioBox[0].closest(".input").addEventListener("click", ()=>{
      radioBox[0].checked||radioBox[1].checked?validField(radioBox[0]):invalidField(radioBox[0]);
    })
    fields.forEach((entry)=>{
      entry.addEventListener("blur", (e)=>{
        if(entry.value === ""){
          invalidField(entry);
        }else {
          validField(entry);
        switch(entry.getAttribute("type")){
          case "text" :
            entry.value.match(validText)?validField(entry):invalidField(entry,"invalid input");
            break;
          case "email" :
            entry.addEventListener("blur",()=>entry.value.match(validEmail)?validField(entry):invalidField(entry,"invalid email"));
            break;
          case "date" :
            (+(new Date()).getFullYear() - +(new Date(entry.value)).getFullYear()) >= 16 ? validField(entry):invalidField(entry,"age less than 16");
            break;
        }}
      })
    })
  }
  
  fieldsValidation(inputFields);
  submitBtn.addEventListener("click",(e)=>{
    radioBox[0].checked||radioBox[1].checked?validField(radioBox[0].closest(".gender")):invalidField(radioBox[0].closest(".gender"));
    inputFields.forEach((entry)=>{
      if(entry.value === ""){
        entry.parentElement.classList.add("required");
        invalidField(entry);
      }else {
        entry.parentElement.classList.remove("required");
        validField(entry);
      }
    })
  });
}