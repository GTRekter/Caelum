<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>

<body>
	<section class="header index">
		<div class="container full-width no-padding no-margin">
			<div class="row no-padding no-margin">
			<?php foreach ($products as $product) : ?>
				<?php if ($photos) : ?>
				<?php $productsPhoto = array();
					foreach ($photos as $photo) {
						if ($product->idProduct == $photo->idProduct) {
							array_push($productsPhoto, $photo->photoName);
						}
					}
				?>
				<?php if ($productsPhoto) : ?>
					<div class="col-sm-6 col-md-4 no-margin no-padding">
					 <div class="box-img" style="background-image: url(<?php echo $resources_img ?>/product/<?php echo $productsPhoto[0]; ?>)">
					
						<div class="overlay">
							<div class="overlay-text">
						      <p><?php echo ucwords($product->productName); ?></p>
						      <a href="<?php echo site_url('front/product/'. $product->idProduct); ?>">View Project</a>
						    </div>
						</div>
						</div>
					</div>
					<?php else : ?>
						<img style="width: 70px; height: 50px"  src="<?php echo $resources_img ?>/product/default.jpg" alt="" />
					<?php endif; ?>
				<?php endif; ?>
			<?php endforeach; ?>	
			</div>
		</div>
	</section>
