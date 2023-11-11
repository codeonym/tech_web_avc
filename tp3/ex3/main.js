onload = ()=>{

  const inputFields = document.querySelectorAll(".field .input");
  const  submitBtn=document.querySelector("#submit");
  const radioBox1 = document.querySelectorAll(".container .field .gender input[type='radio']");
  const radioBox2 = document.querySelectorAll(".container .field .stud input[type='radio']");
  const checkBox =document.querySelectorAll(".container .field .div input[type='checkbox']");
  const form = document.querySelector("form.container");
  
  radioBox1.forEach((e)=>e.addEventListener("click",()=>{
    radioBox1.forEach((e) => {
      e.classList.remove("selected");
      e.parentElement.classList.remove("checked")
    });
    e.parentElement.classList.add("checked");
    e.classList.add("selected");
  }))

  radioBox2.forEach((e)=>e.addEventListener("click",()=>{
    radioBox2.forEach((e) => {
      e.classList.remove("selected");
      e.parentElement.classList.remove("checked")
    });
    e.parentElement.classList.add("checked");
    e.classList.add("selected");
  }))
  checkBox.forEach((e)=>e.addEventListener("click",()=>{
    e.parentElement.classList.toggle("checked");
    e.classList.toggle("selected");
  }))
    //regex
  // const validText= /[a-zA-Z]/ig;
  // const validEmail=/[a-zA-Z0-9]@[a-zA-Z]/ig;

  let stats={};
  inputFields.forEach((entry)=>{
    stats[entry.name]=false;
  });
  stats[radioBox1[0].name] = false;
  stats[radioBox2[0].name] = false;
  stats[checkBox[0].name] = false;
  let invalidField = (field,error="required field",color="#f05454")=>{
    stats[field.name]=false;
    field.setAttribute("placeholder", "*");
    field.closest(".field").classList.add("required");
    field.closest(":is(.input,.div)").style.cssText = `
          border:${color} 1px solid;
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
    radioBox1[0].closest(".input").addEventListener("click", () => {
      radioBox1[0].checked || radioBox1[1].checked ? validField(radioBox1[0]) : invalidField(radioBox1[0]);
    });

    radioBox2[0].closest(".input").addEventListener("click", () => {
      radioBox2[0].checked || radioBox2[1] || radioBox2[2].checked ? validField(radioBox2[0]) : invalidField(radioBox2[0]);
    });
    checkBox[0].closest(".input").addEventListener("click", () => {
        if (checkBox[0].checked || checkBox[1].checked ||checkBox[2].checked ||checkBox[3].checked) {
          validField(checkBox[0]);
        } else {
          invalidField(checkBox[0]);
        }
      });
    // radioBox1[0].checked || radioBox1[1].checked ? validField(radioBox1[0]) : invalidField(radioBox1[0]);
    // radioBox2[0].checked||radioBox2[1].checked||radioBox2[2].checked?validField(radioBox2[0]):invalidField(radioBox2[0]);
    // if (checkBox[0].checked || checkBox[1].checked ||checkBox[2].checked ||checkBox[3].checked) {
    //       validField(checkBox[0]);
    //     } else {
    //       invalidField(checkBox[0]);
    // };
    fields.forEach((entry) => {
      entry.addEventListener("blur", (e) => {
        if (entry.value === "") {
          invalidField(entry);
        } else {
          validField(entry);
        };
      });
    });
  };
  
  fieldsValidation(inputFields);
  submitBtn.addEventListener("click", (e) => {
    
    if (radioBox1[0].checked || radioBox1[1].checked) {
      validField(radioBox1[0]);
    } else {
      invalidField(radioBox1[0]);
    }
    // radioBox1[0].checked || radioBox1[1].checked ? validField(radioBox1[0]) : invalidField(radioBox1[0]);

    if (radioBox2[0].checked || radioBox2[1].checked || radioBox2[2].checked) {
      validField(radioBox2[0]);
    }else {
      invalidField(radioBox2[0]);
    }
    // radioBox2[0].checked||radioBox2[1].checked||radioBox2[2].checked?validField(radioBox2[0]):invalidField(radioBox2[0]);
    
    if (checkBox[0].checked || checkBox[1].checked || checkBox[2].checked || checkBox[3].checked) {
      validField(checkBox[0]);
    }else {
      invalidField(checkBox[0]);
    };
    inputFields.forEach((entry) => {
      if (entry.value === "") {
        invalidField(entry);
      } else {
        validField(entry);
      }
    });
    console.log(stats);
  });
  form.onsubmit=()=>{
  let status=true;
  for(let stat in stats){
    if(stats[stat] === false)
    status=false;
  }
  return  status === true;
  };
}