

<!-- //new -->
<!-- //footer -->
<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
			<div class="col-md-3 w3_footer_grid">
					<h3>Contactos</h3>
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Rua Serpa Pinto nº105 <span>Rio Maior</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>DonsDoLar@hotmail.com</li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Número: 243 106 359</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Informação</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="help.php">Sobre nós</a></li>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="help.php">Contacte-nos</a></li>
			
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3></h3>
					<ul class="info"> 
						<li><i class="" aria-hidden="true"></i><a href="#"></a></li>
						<li><i class="" aria-hidden="true"></i><a href="#"></a></li>
						<li><i class="" aria-hidden="true"></i><a href="#"></a></li>
						<li><i class="" aria-hidden="true"></i><a href="#"></a></li>
						<li><i class="" aria-hidden="true"></i><a href="#"></a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Conta</h3>
					<ul class="info"> 
						
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="cart.php">Carrinho</a></li>
						<?php if(is_login()){
						?>
						<li>
						<i class="fa fa-arrow-right" aria-hidden="true"></i><a href="/profile.php"><?php echo  $_SESSION['name']; ?></a>
                        </li>
                        <li>
						<i class="fa fa-arrow-right" aria-hidden="true"></i><a href="/logout.php">Logout</a>
                        </li><?php
                        } else {
					
							?>
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="login.php">Login</a></li>

						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="regist.php">Criar conta</a></li> <?php	} ?>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		
		<div class="footer-copy">
			
			<div class="container">
				<p>© 2019 All rights reserved | Design by Rafael Figueiredo</a></p>
			</div>
		</div>
		
	</div>	
	<div class="footer-botm">
			<div class="container">
				<div class="w3layouts-foot">
					<ul>
						<li><a href="https://www.facebook.com/Dons-do-Lar-112679846803470/" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						
						
					</ul>
				</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
		
<?php require_once __DIR__ . "/../parts/cookies-modal.php"; ?>
<script src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- //footer -->	
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- top-header and slider -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="js/minicart.min.js"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>
<!-- main slider-banner -->
<script src="js/skdslider.min.js"></script>
<link href="css/skdslider.css" rel="stylesheet">
<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});
						
			jQuery('#responsive').change(function(){
			  $('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
</script>	

<!-- //main slider-banner --> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="/js/scripts.js"></script>
</body>
</html>