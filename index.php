<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="css/jcarousel.css" rel="stylesheet" />
<link href="css/flexslider.css" rel="stylesheet" />
<link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" />
<style>
#one {

	 height:800;
	width: 1080;
  float:left;
//background-color:red;
	 border:normal;
}
#two {
		 width:1080;
	 height:1050;
	 float:left;
 //background-color:green;
	
}
</style>
</head>
<body>
<div id="wrapper" class="home-page">
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="logo" width="100px" height="60px"/></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Home</a></li> 
						<li><a href="about.html">About Us</a></li>
						                      
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->
	<section id="banner">
	 
	<!-- Slider -->
        <div  id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="img/slides/2.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Best Design</h3> 
					<p>of the website</p> 
					 
                </div>
              </li>
              <li>
                <img src="img/slides/1.jpg" alt="" />
                <div class="flex-caption">
                    <h3>E-bay</h3> 
					<p>wish u a great day today</p>  
                </div>
              </li>
			  <li>
                <img src="img/slides/0.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Flipkart</h3> 
					<p>wish u the best shopping</p> 
					 
                </div>
              </li>
            </ul>
        </div>
	<!-- end slider -->
 
	</section>
	<section class="hero-text" style="background-color:#666699" >
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="aligncenter">
				
    <?php
	require_once('class.ebay.php');
	$ebay = new ebay('VVIT1109e-ef9e-4685-a140-e438d784b3d', 'EBAY-IN');
	
	?>
<form action="index.php"  method="post"><p style="font-family:vivaldi;font-size:50px;align:center" > Search for Better Choice</p><br/>
	<?php $minp=1; $maxp=1000000; ?>
	<input type="text" name="search" id="search" style="color:blue" size="100" placeholder="Search for products like mobiles,laptops,dresses...."><br/><br/><br/>
	MIN:<input type="text" name="minp" id="minp" style="color:blue" placeholder="enter min price"/>
	MAX:<input type="text" id="maxp" name="maxp" style="color:blue" placeholder="enter max price" /><br/><br/>
	<input type="image" src="img/search1.jpg" onmouseover="this.src='img/search.jpg'" onmouseout="this.src='img/search1.jpg'">
	<? if(empty($_POST['minp']) {$minp=1;} else $minp=$_POST['minp'];
	if(empty($_POST['maxp']) { $maxp=1000000;} else $maxp=$_POST['maxp']; ?>
</form>
<div id="one">
<?php
if(!empty($_POST['search'])){?>
	<h1>Ebay Results</h1>
	<?php
	$results = $ebay->findItemsAdvanced($_POST['search'], 'BestMatch');
	$item_count = $results['findItemsAdvancedResponse'][0]['searchResult'][0]['@count'];
	
	if($item_count > 0){
		$items = $results['findItemsAdvancedResponse'][0]['searchResult'][0]['item'];
		?>
		<table border="1" align="center" style="color:white" target="one" style="background-color:white" >
		<?php
		$count=0;
	$end=1;	
		foreach($items as $i){
		if($i['sellingStatus'][0]['currentPrice'][0]['__value__'] > $minp && $i['sellingStatus'][0]['currentPrice'][0]['__value__'] < $maxp)
{ 
			$count++;
	$end=0;
			if($count%3==1)
				echo '<tr><td align="center">';
			else if($count%3==2)
				echo '</td><td align="center">';
			else{
				echo '</td><td align="center">';
				$end =1;
			}?>
			
			<div class="item_title">
				<a href="<?php echo $i['viewItemURL'][0]; ?>"><?php echo $i['title'][0]; ?></a>
			</div>
			<div class="item_img">
				<img src="<?php echo $i['galleryURL'][0]; ?>" alt="<?php echo $i['title']; ?>">
			</div>
			<div class="item_price">
				<?php echo $i['sellingStatus'][0]['currentPrice'][0]['@currencyId']; ?>
				<?php echo $i['sellingStatus'][0]['currentPrice'][0]['__value__']; ?>
			</div>			
<?php
}
		}
		?>
		</table>
		<?php
	}
if($item_count ==0)
{
?>
<h1 style="color:red" align="center">NO SEARCH PRODUCTS FOUND</h1>	
</div>
<?php
}
?>
<div id="two">
<h1>Flipkart Results</h1>
<?php
require_once('demo.php');
}
?>
</div>
			</div>
		</div>
	</div>
	</section>
               </div>
             </div>
          </div>
      </div>
	<section class="testimonial-area">
    <div class="testimonial-solid">
        <div class="container">
            <div class="testi-icon-area">
                <div class="quote">
                    <i class="fa fa-microphone"></i>
                </div>
            </div>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="">
                        <a href="#"></a>
                    </li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class="">
                        <a href="#"></a>
                    </li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class="active">
                        <a href="#"></a>
                    </li>
                    <li data-target="#carousel-example-generic" data-slide-to="3" class="">
                        <a href="#"></a>
                    </li>
                </ol>
                <div class="carousel-inner">
                    <div class="item">
                        <p>Success is not final, failure is not fatal: it is COURAGE TO CONTINUE that matters.</p>
                        <p>
                            <b>- Winston Churchill -</b>
                        </p>
                    </div>
                    <div class="item">
                        <p>We are not a team because we work together,We are a team because we RESPECT,TRUST and CARE for each other.</p>
                        <p>
                            <b>- Vala Afshar -</b>
                        </p>
                    </div>
                    <div class="item active">
                        <p>Not all of us can do GREAT things. But we can do small things WITH GREAT LOVE.</p>
                        <p>
                            <b>- Mother Teresa -</b>
                        </p>
                    </div>
                    <div class="item">
                        <p>Take the whole responsibility on your OWN SHOULDERS, and know that you are the creator of your OWN DESTINY.</p>
                        <p>
                            <b>- Swami Vivekananda -</b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
	</section>
	<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Our Contact</h5>
					<address>
					<strong>VVIT</strong><br>
					Gollamudi Road, Pedakakani Mandal<br>
					 Pin-522508 Nambur, Guntur District, AP.</address>
					<p>
						<i class="icon-phone"></i> 0863 229 3336 <br>
						<i class="icon-envelope-alt"></i> vvitguntur.com
					</p>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Quick Links</h5>
					<ul class="link-list">
						<li><a href="index.html">Home</a></li>
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						<p>
							<span>&copy; VVIT 2015 All right reserved. By TOUGH CHALLENGERS</span>
						</p>
					</div>
				</div>
				<div class="col-lg-6">
					<ul class="social-network">
						<li><a href="https://www.facebook.com/pages/Vvit-Nambur/457383594348918?fref=ts&ref=br_tf" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://twitter.com/?lang=en" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://www.linkedin.com/uas/login" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="https://in.pinterest.com/login/" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="https://plus.google.com/" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script> 
<script src="js/portfolio/jquery.quicksand.js"></script>
<script src="js/portfolio/setting.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/animate.js"></script>
<script src="js/custom.js"></script>
<script src="js/owl-carousel/owl.carousel.js"></script>
</body>
</html>