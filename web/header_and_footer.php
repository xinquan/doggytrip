<?php
   function headerGetMarkUp()
   {
	return <<<HTML
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"> 
	<head> 
		<title>DoggyTrip.com, 小狗旅行网 - 马尔代夫、巴厘岛、爱琴海、澳大利亚、新西兰、斐济精品旅游网站</title> 
		<meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
		<meta name="description" content="小狗旅行网" /> 
		<meta name="keywords" content="马尔代夫 巴厘岛 爱琴海 澳大利亚 新西兰 斐济" /> 
		<!--
		<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon" />
		<link  href="/css/original.css" type="text/css" rel="stylesheet"> 

		<link  href="/css/niftyCorners.css" type="text/css" rel="stylesheet"> 
		-->
		<link  href="/css/prototype.css" type="text/css" rel="stylesheet"> 

		<style>
		</style>
	</head> 

	<body> 
		<div id="page">
			<div id="header">




			</div> <!-- /page/header -->


			<div id="container" class="clear-block" style="padding-left:450px;">


HTML;
   }
   function footerGetMarkUp()
   {
	  return <<<HTML

				<div style="clear:both"></div> <!-- fixes both short right and left sidebar -->

			 </div> <!-- /page/container -->


		<div id="footer-wrapper" class="clear-block">
			<div id="footer">


				<div id="block-menu-93" class="block block-menu">  
					<div class="blockinner">
						<div class="content clear-block">

							<ul class="menu">
								<li class="leaf"><a href="/travel-guide">Travel Guide</a></li>
								<li class="leaf"><a href="/page/about_us" title="About Us">About Us</a></li>
								<li class="leaf"><a href="/contact">Contact Us</a></li>
								<li class="leaf"><a href="/blogs" title="Blog">Blog</a></li>

							</ul>
						</div>    
					</div>
				</div>
			</div> 
		</div> <!-- /page/footer-wrapper -->

		</div>  <!-- /page -->

	</body> 
</html>
HTML;
   }

?>
