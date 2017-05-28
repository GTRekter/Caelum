<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>

<body>
	<section class="header product">
		<div class="container">
			<div class="col-md-10">
		    	<div class="row border-blog"></div>
		    	<div class="blog-main">
		    		<h1><?php echo ucwords($product->productName); ?></h1>
					<p>Cliente: <span><?php echo ucwords($product->clientName); ?></span></p>
					<div class="padding-v-20">
					<?php if ($photos) : ?>
						<?php foreach ($photos as $photo) : ?>
							<?php if ($product->idProduct == $photo->idProduct) : ?>
								<img src="<?php echo $resources_img; ?>/product/<?php echo $photo->photoName; ?>" class="img-responsive full-width margin-b-20">
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>
					</div>
		    	</div>
		    </div>
		    <div class="col-md-2 right-column" data-sr='wait 0.2s, then enter left and hustle 50px over 1s'>
		    	<div class="row">
		    		<div class="col-xs-6 col-md-12">
				        <h2>Tags</h2>
				        <ul>
				            <li class="tags"><a href="#">#robertobaruffi</a></li>
				            <li class="tags"><a href="#">#artebaruffi</a></li>
				            <?php $pieces = explode(" ", $product->productName);
				            	foreach ($pieces as $piece) : ?>
				            		<li class="tags"><a href="#">#<?php echo $piece; ?></a></li>
				            <?php endforeach; ?>        
				        </ul>
			        </div>
			        <div class="col-xs-6 col-md-12">
				        <h2>Share</h2>
				        <ul>
				            <li class="icon-blog">
				                <a href="http://www.facebook.com/share.php?u=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>&title=<?php echo ucwords($product->productName); ?>" onClick='showPopup(this.href,"facebookShare");return(false);' class="btn-social facebook">
				                	<span><?php echo $product->facebookShare; ?></span>
				                	<i class="fa fa-fw fa-facebook"></i>
				                </a>
				            </li>
				            <li class="icon-blog">
				                <a href="https://plus.google.com/share?url=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" onClick='showPopup(this.href,"googleShare");return(false);' class="btn-social google">
				                	<span><?php echo $product->googleShare; ?></span>
				                	<i class="fa fa-fw fa-google-plus"></i>
				                </a>
				            </li>
				            <li class="icon-blog">
				                <a href="http://twitter.com/intent/tweet?status=<?php echo ucwords($product->productName); ?>+<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" onClick='showPopup(this.href,"twitterShare");return(false);' class="btn-social twitter">
				                	<span><?php echo $product->twitterShare; ?></span>
				                	<i class="fa fa-fw fa-twitter"></i>
				                </a>
				            </li>
				        </ul>
			        </div>
		        </div>
		    </div>
		</div>
	</section>
	
	<script type="text/javascript">
	function showPopup(url,social) {
		newwindow=window.open(url,'name','height=250,width=500,top=250,left=400,resizable');
		if (window.focus) {newwindow.focus()}
		
		$.ajax({
			type: 'post',
		    url: '<?php echo base_url(); ?>/index.php/front/i_productShare/',
		    data: {idProduct: <?php echo $product->idProduct; ?>, socialName: social},
		        
		    success: function () {
		    }, 
		    error: function (result) {
		    	alert('Errore 501:' + result);
		    }
		});
	}
	</script>
