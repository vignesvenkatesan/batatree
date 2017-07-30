<!DOCTYPE HTML>
<html>
<head>
<title>Tree - Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $this->load->view('common/includes');?>
<script type="text/javascript" src="http://localhost/bata2/assets/js/addnode.js">
</script>
<script>
$(function () {
	$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

	if (!screenfull.enabled) {
		return false;
	}
	
	$('#toggle').click(function () {
		screenfull.toggle($('#container')[0]);
	});
});
</script>
</head>
<body>
	<div id="wrapper">
		<?php $this->load->view('common/header_menu');?>
		<div id="page-wrapper" class="gray-bg dashbard-1">
			<div class="content-main">
				<!--faq-->
				<div class="blank">
					<div class="blank-page">
						<div class="grid_3 grid_5">
							<!--h3 class="head-top">Tabs</h3-->
							<div class="but_list">
								<div class="bs-example bs-example-tabs" role="tabpanel"
									data-example-id="togglable-tabs">
									<h2 class="h2.-bootstrap-heading group-mail">Add New Node</h2>
                                    <form name="add_child" id="add_child">
                                    	<div class="row" id="adderror" class="div_disable">
                                    		Unable to add the Node.
                                    	</div>
                                        <div class="row">
                                            <div class="col-xs-6 col-md-4 group-mail">
                                                <label for="node_name">Node Name</label>
                                                <input id="node_name" name="node_name" class="form-control" required type="text" placeholder="Node name">
                                            </div>
                                            <div class="col-xs-6 col-md-4 group-mail">
                                            </div>
                                            <div class="col-xs-6 col-md-4 group-mail">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6 col-md-4 group-mail">
                                                <label for="node_name">Parent Node</label>
                                                <select class="form-control1" id="tree_parentnode" name="tree_parentnode">
                                                  <option value="">-- select one if not Parent Node --</option>
                                                 </select>
                                            </div>
                                            <div class="col-xs-6 col-md-4 group-mail">
                                            </div>
                                            <div class="col-xs-6 col-md-4 group-mail">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-6 col-md-4 group-mail">
                                                
                                            </div>
                                            <div class="col-xs-6 col-md-4 group-mail">
                                            </div>
                                            <div class="col-xs-6 col-md-4 group-mail">
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <div class="row">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <button id="node_add" name="node_add" class="btn-primary btn" type="button">Save</button>
                                                    <button class="btn-inverse btn" type="reset">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!--//faq-->
				<!---->
				<div class="copy">
					<p>
						&copy; 2016 Virtual Desk. All Rights Reserved | Developed by <a
							href="http://fomaxtech.com/" target="_blank">Avohi</a>
					</p>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>

	<!---->
	<!--scrolling js-->
	<script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"
		type="text/javascript" charset="utf-8"></script>
	<script src="<?php echo base_url(); ?>assets/js/scripts.js"
		type="text/javascript" charset="utf-8"></script>
	<!--//scrolling js-->
</body>
</html>

