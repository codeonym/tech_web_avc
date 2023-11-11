  // handling ajax fetch method
  function fetchData() {
    $.ajax({
  url: 'fetch.php', // the URL of your PHP script that runs the query
  method: 'POST', // the HTTP method (POST or GET) to use
  data: { // any data to send along with the request
    fetch:true
  },
  success: function(response) { // the callback function to run if the request is successful
    let json = JSON.parse(response);
    let html = "";
    json.forEach((entry) => {
      html += `
      <tr>
        <td>${entry['firstname']}</td>
        <td>${entry['lastname']}</td>
        <td>${entry['reg_date']}</td>
        <td>${entry['email']}</td>
        <td>
          <button data-user="${entry['email']}" class="update-btn">Update</button>
          <button data-user="${entry['email']}" class="delete-btn">Delete</button>
          <button data-user="${entry['email']}" class="print-btn">Print</button>
        </td>
      </tr>`;
      document.querySelector("table tbody").innerHTML = html;
    });
  },
  error: function(xhr, status, error) { // the callback function to run if the request fails
    console.log(xhr.responseText); // the error message
    // do something to handle the error, like show an error message to the user
  }
  });
  
  }
function deleteUser(user) {
  $.ajax({
  url: 'fetch.php', // the URL of your PHP script that runs the query
  method: 'POST', // the HTTP method (POST or GET) to use
  data: { // any data to send along with the request
    delete: true, 
    user_id:user
  },
  success: function(response) { // the callback function to run if the request is successful
    // let data = JSON.parse(response);
    // showSuccessAlert(response);
    console.log(response);
    fetchData();
  },
  error: function(xhr, status, error) { // the callback function to run if the request fails
    showFailAlert("failed to delete");
    // do something to handle the error, like show an error message to the user
  }
  });
  
}
function updateUser(user) {
$.ajax({
url: 'fetch.php', // the URL of your PHP script that runs the query
method: 'POST', // the HTTP method (POST or GET) to use
data: { // any data to send along with the request
  delete: user, 
},
success: function(response) { // the callback function to run if the request is successful
  // let data = JSON.parse(response);
  // showSuccessAlert(response);
  console.log(response);
  fetchData();
},
error: function(xhr, status, error) { // the callback function to run if the request fails
  showFailAlert("failed to delete");
  // do something to handle the error, like show an error message to the user
}
});

}
  fetchData();

  // functions
  function showSuccessAlert(message) {
			var alertDiv = document.createElement("div");
			alertDiv.className = "alert alert-success";
			alertDiv.innerHTML = message;
			document.body.appendChild(alertDiv);
			setTimeout(function() {
				alertDiv.style.opacity = 1;
			}, 100);
			setTimeout(function() {
				alertDiv.style.opacity = 0;
				setTimeout(function() {
					document.body.removeChild(alertDiv);
				}, 300);
			}, 3000);
  }
    
    function showFailAlert(message) {
			var alertDiv = document.createElement("div");
			alertDiv.className = "alert alert-fail";
			alertDiv.innerHTML = message;
			document.body.appendChild(alertDiv);
			setTimeout(function() {
				alertDiv.style.opacity = 1;
			}, 100);
			setTimeout(function() {
				alertDiv.style.opacity = 0;
				setTimeout(function() {
					document.body.removeChild(alertDiv);
				}, 300);
			}, 3000);
		}
onload = () => {

  const inputFields = document.querySelectorAll(".field .input");
  const  submitBtn=document.querySelector("#submit");
  const form = document.querySelector("form.container");
  const menuToggle = document.querySelector('.menu-toggle');
  const sidebar = document.querySelector('.sidebar');
  const sidebarLinks = document.querySelectorAll(".sidebar li");
  const insertContainer = document.querySelector('.insert');
  const fetchContainer = document.querySelector(".fetch");
  const actionBtnsParent = document.querySelector(".fetch tbody");

  sidebarLinks.forEach((link) => {
    link.addEventListener('click', () => {
      console.log("clicked");
      switch (link.dataset.cap) {
        case insertContainer.dataset.cap:
          insertContainer.classList.add("open");
          fetchContainer.classList.remove("open");
          break;
        case fetchContainer.dataset.cap:
          fetchContainer.classList.add("open");
          insertContainer.classList.remove("open");
          break;
      }
      menuToggle.classList.toggle('show');
      sidebar.classList.toggle('show');
  });
  })

  menuToggle.addEventListener('click', () => {
    menuToggle.classList.toggle('show');
    sidebar.classList.toggle('show');
  });
    //regex
  // const validText= /[a-zA-Z]/ig;
  // const validEmail=/[a-zA-Z0-9]@[a-zA-Z]/ig;

  let stats={};
  inputFields.forEach((entry)=>{
    stats[entry.name]=false;
  });
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

  function fieldsValidation(fields) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const letterRegex = /^[a-zA-Z]+$/;

    fields.forEach((entry) => {
      entry.addEventListener("blur", (e) => {
        if (entry.value === "") {
          invalidField(entry);
        } else {
          validField(entry);
        };
        switch (entry.getAttribute("type")) {
        case "email": emailRegex.test(entry.value) ? validField(entry): invalidField(entry);
          break;
        case "text": letterRegex.test(entry.value) ? validField(entry): invalidField(entry);
          break;
      }
      });
    });
  };
  
  fieldsValidation(inputFields);
  submitBtn.addEventListener("click", (e) => {

    inputFields.forEach((entry) => {
      if (entry.value === "") {
        invalidField(entry);
      } else {
        validField(entry);
      }
    });
  });
  form.onsubmit=()=>{
  let status=true;
  for(let stat in stats){
    if(stats[stat] === false)
    status=false;
  }
  return  status === true;
  };
  actionBtnsParent.addEventListener("click", (e) => {
    if (e.target.matches(".delete-btn"))
      deleteUser(e.target.dataset.user);
  })
}