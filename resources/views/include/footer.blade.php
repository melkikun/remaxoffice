<footer style="background-image: url('{{ asset('/') }}images/remax_footer.jpg');">
	<div class="container-fluid">
		<div class="upper-footer clearfix">
			<div class="widgets" style="margin-left: 10%;">
				<div class="col-md-12">
					<div class="about-widget" style="margin-top: 15px;"> 
						<img src="{{ asset('/') }}images/remax_logo.png" class="img-responsive" alt="#" style="width: 200px;" />
					</div>
					<div class="col-sm-3">
					<li style="float: left;margin-right: 20px;">{!!$company['data'][0]['compAddress']!!}</li>
					</div>
					<div class="col-sm-3">
					 <li style="float: left;"><i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;{!!$company['data'][0]['compPhone1']!!}<br><i class="fa fa-fax"></i>&nbsp;&nbsp;{!!$company['data'][0]['compFax1']!!}<br><i class="fa fa-envelope"></i><a href="mailto:{!!$company['data'][0]['compEmail']!!}" style="color: white;">&nbsp;&nbsp;&nbsp;{!!$company['data'][0]['compEmail']!!}</a></li>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>