  <div class="nav flx off">
    <ul class="flx">
      <li><a href="<?php echo "/tech_web_avc/tp3/ex4/upl/index.php";?>"><img src="/tech_web_avc/tp3/ex4/assets/clipboard-user.svg" alt="" srcset=""></a></li>
      <li><a href="<?php echo  "/tech_web_avc/tp3/ex4/ins/index.php";?>"><img src="/tech_web_avc/tp3/ex4/assets/searchengin.svg" alt="" srcset=""></a></li>
      <!-- <li><a href="<?php #echo "/tech_web_avc/tp2/ex8/gallery/index.php";?>"><img src="/tech_web_avc/tp3/ex4/assets/file-invoice.svg" alt="" srcset=""></a></li> -->
    </ul>
    <img src="/tech_web_avc/tp2/ex8/chevron-up.svg" alt="" srcset="">
  </div>
  <script>
    document.querySelector(".nav").addEventListener("click",(e)=>{
      document.querySelector(".nav").classList.toggle("off");
    })
  </script>
  <style>
.nav {
  display:flex;
  align-items:center;
  justify-content:center;
  flex-direction:column;
  background-color:transparent;
  width:100px;
  height:200px;
  position:fixed;
  color:#555;
  inset:auto 20px 20px auto;
  transition:all 0.5s linear;
  z-index: 50;
  clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);
  ransform:translateY(0px);
}
.nav.off {
  clip-path: polygon(0 80%, 100% 80%, 100% 100%, 0% 100%);
  overflow:hidden;
}
.nav.off:hover {
  transform:translateY(-10px);
}
.nav.off > *:not(:last-child){
  visibility:hidden;

}
.nav ul {
  flex:1;
  flex-direction: column;
  gap:10px;
  list-style-type:none;
  display:flex;
  align-items:center;
  justify-content:center;
  padding:0px;
  position:relative;
}
.nav ul li {
  transition:all .5s linear;
  transform:translateY(0px);
  width:80px;
  padding:10px;
}
.nav.off ul li {
  transform:translateY(500%);
}
.nav ul li a {
  display:block;
  text-decoration: none;
  text-align: center;
  width:100%;
}
.nav img{
  font-size: 16px;
  width:30px;
  transition:all .3s linear;
  filter:invert(1);
}
.nav > img {
  filter:invert(1);
  transition:0.3s linear all;
  transform:rotate(180deg) scale(1);
}
.nav > img:hover {
  transform:rotate(180deg) scale(1.2);
}
.nav.off > img {
  transform:rotate(0) scale(1);
  margin-bottom:10px;
}

.nav.off > img:hover {
  transform:rotate(0) scale(1.2);
}
.nav ul img:hover {
  transform: scale(1.2);
}
  </style>