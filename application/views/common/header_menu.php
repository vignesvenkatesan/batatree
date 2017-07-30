<!--- -->
		<nav class="navbar-default navbar-static-top" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="<?php echo base_url(); ?>index.php/Dashboard"><img src="<?php echo base_url(); ?>assets/images/OSOS-WEB-LOGO.png" alt="OSOS LOGO" width="250" height="70"/> </a>
			</div>
			<div class=" border-bottom">

				<!-- Brand and toggle get grouped for better mobile display -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="full-right">
					  <div class="clearfix"></div>
				 </div>
				<!-- /.navbar-collapse -->
				<div class="clearfix"></div>
				
				<?php $this->load->view('common/side_menu');?>
			</div>
		</nav>