<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="CSS/slide-show.css">

<link rel="stylesheet" href="CSS/ionicons.min.css">
<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:300,400,800" rel="stylesheet">
        <title>Train with Danish |Customized meal plans and work-out plans</title>
</head>
<body>

    <header class="header">

      
<div class="row">

         <div class="logo">
             <a href="https://danishfit.com/"><img src="danish/danishlogo.png" alt="logo-pic"></a>
         </div>
        <nav>
                
                <ul class="main-nav js-main-nav">
                <li> <a href="index.php">home</a></li> 
                        <li> <a href="training.php">Training</a></li>
                        <li> <a href="about.php">about</a></li>   
                    
                        <li> <a href="gallery.php">Gallery</a></li>
                        <li> <a href="slide-show2.php">Gym-partners</a></li>   
                        <li> <a href="slide-show1.php">Happy-clients</a></li>  
                </ul>                       
                </nav>
                <a  class="mobile-navi js-navi"href="#"><i class="ion-navicon-round"></i></a>  
                      

</div>
                




<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 4</div>
  <img src="clients/tranformation1.jpg" style="width:100%">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 4</div>
  <img src="clients/tranformation2 (1).jpg" style="width:100%">
  <div class="text">Caption Two</div>
</div>




<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 

</div>

<script>
    var slideIndex = 0;
    showSlides();
    
    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
           slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
<script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//cdn.jsdelivr.net/selectivizr/1.0.3b/selectivizr.min.js"></script>
<script src="javascript/home.js"></script>
</body>
</html> 
