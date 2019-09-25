<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-center-mobile">
					
				</div>
				<div class="col-sm-6 text-center-mobile">
				
				</div>
			</div>
			<div class="row bottom-footer text-center-mobile">
				<div class="col-sm-8">
					<p>&copy; <?= date('Y'); ?> All Rights Reserved. Powered by SELP</p>
				</div>
				<div class="col-sm-4 text-right text-center-mobile">
					<ul class="social-footer">
						<li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- Holder for mobile navigation -->
	<div class="mobile-nav">
		<ul>
		</ul>
		<a href="#" class="close-link"><i class="arrow_up"></i></a>
	</div>
	<!-- Scripts -->
	
	<script src="<?= base_url() ?>public/js/jquery-1.11.1.min.js"></script>
	<script src="<?= base_url() ?>public/js/owl.carousel.min.js"></script>
	<script src="<?= base_url() ?>public/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>public/js/wow.min.js"></script>
	<script src="<?= base_url() ?>public/js/typewriter.js"></script>
	<script src="<?= base_url() ?>public/js/jquery.onepagenav.js"></script>
	<script src="<?= base_url() ?>public/js/main.js"></script>
	


	
</body>

</html>

<script type="text/javascript">
	
$(document).ready(function(){ 
$(document.body).on('click', '#gotop', function(){
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
    });

});

</script>

