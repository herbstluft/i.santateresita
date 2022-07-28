<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/proyecto/farmacia.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.rtl.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<style>
@import url(//fonts.googleapis.com/css?family=Lato:300:400);

body {
  margin:0;
}

h1 {
  font-family: 'Lato', sans-serif;
  font-weight:300;
  letter-spacing: 2px;
  font-size:48px;
}
p {
  font-family: 'Lato', sans-serif;
  letter-spacing: 1px;
  font-size:14px;
  color: #333333;
}

.header {
  position:relative;
  text-align:center;
  backdrop-filter: blur(15px);
  color:white;
}
.logo {
  width:50px;
  fill:white;
  padding-right:15px;
  display:inline-block;
  vertical-align: middle;
}

.inner-header {
  height:65vh;
  width:100%;
  margin: 0;
  padding: 0;
}

.flex { /*Flexbox for containers*/
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.waves {
  position:relative;
  width: 100%;
  height:15vh;
  margin-bottom:-7px; /*Fix for safari gap*/
  min-height:100px;
  max-height:150px;
  backdrop-filter: blur(10px);
}

.content {
  position:relative;
  height:20vh;
  text-align:center;
  background-color: white;

}

/* Animation */

.parallax > use {
  animation: move-forever 25s cubic-bezier(.55,.5,.45,.5)     infinite;
}
.parallax > use:nth-child(1) {
  animation-delay: -2s;
  animation-duration: 7s;
}
.parallax > use:nth-child(2) {
  animation-delay: -3s;
  animation-duration: 10s;
}
.parallax > use:nth-child(3) {
  animation-delay: -4s;
  animation-duration: 13s;
}
.parallax > use:nth-child(4) {
  animation-delay: -5s;
  animation-duration: 20s;
}
@keyframes move-forever {
  0% {
   transform: translate3d(-90px,0,0);
  }
  100% { 
    transform: translate3d(85px,0,0);
  }
}
/*Shrinking for mobile*/
@media (max-width: 768px) {
  .waves {
    height:40px;
    min-height:40px;
  }
  .content {
    height:30vh;
  }
  h1 {
    font-size:24px;
  }
}


.boton {
    border-radius: 10px;
    border: 2px solid rgb(214, 214, 214);;
    background-color: rgba(250, 235, 215, 0.568);
    backdrop-filter: blur(20px);
    color: #333;
    display: block;
    font-family: ubuntu;
    font-size: 2em;
    margin: auto;
    overflow: hidden;
    padding: 20px;
    position: relative;
    text-align: center;
    text-decoration: none;
    text-transform: uppercase;
    transition: .3s;
    width: 370px;
    top:-100px;
}
.boton:after {
    content: "";
    background-color: #333;
    display: block;
    height: 0;
    left: 50%;
    position: absolute;
    top: 50%;
    transition: .3s;
    width: 0;
    z-index:-1;
}
.boton:hover {

    border-color: rgb(214, 214, 214);
    color: #FFFFFF;
}

</style>
<body>

<!-- Fondo de video -->
<div class="fullscreen-container">
    <video loop muted autoplay poster="dist/img/office.jpg" class="fullscreen-video">
        <source src="https://player.vimeo.com/external/641767478.hd.mp4?s=d1e3f6e09192708d3ac42cc85979c361242f11f5&profile_id=174&oauth_token_id=1027659655" type="video/mp4">

    </video>
</div>
<!-- fin de video -->
 

        <!--Hey! This is the original version
of Simple CSS Waves-->

<div class="header">

    <!--Content before waves-->
    <div class="inner-header flex">
    <!--Just the logo.. Don't mind this-->
    
    <h1>Lo sentimos ha habido un error.</h1>

    </div>
    <a href="registro/login.php" class="boton">Iniciar Sesion</a>

       
      
    
    <!--ondas Container-->
    <div>
    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
    viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
    <defs>
    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
    </defs>
    <g class="parallax">
    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
    </g>
    </svg>
    </div>
    <!--ondas end-->
    
    </div>
    <!--Header ends-->
    
    <!--Content starts-->
    <div class="content flex">
      <p> <img src="bootstrap/img/logo.png" alt="" height="0px"></p>
    </div>
    <!--Content ends-->


</body>
</html>