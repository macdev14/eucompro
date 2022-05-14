<!DOCTYPE html>
<html class="no-js design2016">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>{module tag='module_title'}</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

		{head_html}
		
		<!--  This loads the RSS feed  -->
		<link rel="alternate" type="application/rss+xml" title="Newest Listing Feed" href="rss_listings.php" />
		
		{include file='head_common.tpl'}
	</head>
	<body>
		{include file='header.tpl'}
		<div class="wrapper three-column">
			<!--[if lt IE 9]>
				<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
			<![endif]-->
			{* NOTE: Unlike other templates, all the columns and the main body
				are defined in the sub-template for the listing.  Usually that
				is either listing_classifieds.tpl or listing_auctions.tpl. *}
			{body_html}
			
			{include file='footer.tpl'}
		</div>
	</body>
</html>