<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style type="text/css">
.carousel{
    background: #FFFFFF;
    margin-top: 5px;
}

.carousel .item img{
    margin: 0 auto; /* Align slide image horizontally center */
    background: #FFFFFF;
}

.img-style{
  height:100px;
  width:190px;
  border-bottom:1px solid #000;
  margin: 2px;
}

</style>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
            <li data-target="#myCarousel" data-slide-to="6"></li>
        </ol>

        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="../images/vwinner.JPG" alt="First Slide">
            </div>
            <div class="item">
                <img src="../images/vrunner.jpg" alt="Second Slide">
            </div>
            <div class="item">
                <img src="../images/twinner.JPG" alt="Third Slide">
            </div>
            <div class="item">
                <img src="../images/trunner.JPG" alt="Fourth Slide">
            </div>
            <div class="item">
                <img src="../images/tsr.jpg" alt="Fifth Slide">
            </div>
            <div class="item">
                <img src="../images/tjr.jpg" alt="Sixth Slide">
            </div>
            <div class="item">
                <img src="../images/score.JPG" alt="Seventh Slide">
            </div>
        </div>

        <!-- Carousel controls -->
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>

        <a class="carousel-control right" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
</div>