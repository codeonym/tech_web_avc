<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
  <link rel="stylesheet" href="<?php echo './assets/style.css' ?>">
</head>
<body>
  <header class="flx">
    <div class="container flx">
      <div class="logo flx"><span>U</span>call</div>
    <ul class="links flx">
      <li data-target="home.php"><a href="./"> Home</a></li>
      <li data-target="indexes.php"><a href="indexes.php"> Indexes</a></li>
      <li data-target="contacts.php"><a href="contacts.php"> Contacts</a></li>
      <li data-target="about.php"><a href="about.php"> About Us</a></li>
    </ul>
    <button id=slidebar></button>
      <script>
        let slideBarBtn= document.querySelector("#slidebar");
        let links=document.querySelectorAll("header .links li ");

        slideBarBtn.addEventListener("click", function(){
          if(slideBarBtn.classList.contains("open")){
            document.querySelector("header .container").classList.remove("expand");
            slideBarBtn.classList.remove("open");
          }else {
            document.querySelector(" header .container").classList.add("expand");
            slideBarBtn.classList.add("open");}
          
        });
        
        links.forEach((link) => {
          if(location.href.toString().includes(link.dataset.target)){
            link.classList.add("selected");
          }
          if(!location.href.toString().includes(".php")){
            document.querySelector("header .links li[data-target='home.php']").classList.add("selected");
          }

          link.addEventListener("click",(e)=>{
          links.forEach((entry)=>entry.classList.remove("selected"));
          link.classList.add("selected");
        })
        })
    
      </script>
    </div>
  </header>
