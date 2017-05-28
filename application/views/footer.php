<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>

</div>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $resources_js; ?>/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <?php if ($page == 'index') : ?>
	    <script src="<?php echo $resources_js; ?>/plugins/morris/raphael.min.js"></script>
	    <script src="<?php echo $resources_js; ?>/plugins/morris/morris.min.js"></script>
	    <!--<script src="<?php echo $resources_js; ?>/plugins/morris/morris-data.js"></script>-->
	<?php endif; ?>
	
	<!-- FUNZIONA PER GRAFICI --> 
	<?php if($page == 'index') : ?>     
		<script type="text/javascript">
		$(document).ready(function() {
			  /* Morris.js Charts */
			  Morris.Area({
			    element: 'morris-area-chart',
			    resize: true,
			    data: [
			    	<?php for ($i = 1; $i <= 12; $i++) : ?>
			    		<?
			    		$productViews = 0;
			    		$year = date("Y");	
			    		$totLike = 0;	
			    		    		
			    		foreach ($products as $product) {
			    			if ( (date("Y",strtotime($product->createdOn)) == $year) && (date("m",strtotime($product->createdOn)) == $i) ) {
			    				$totLike += $product->facebookShare; 
			    				$totLike += $product->googleShare; 
			    				$totLike += $product->twitterShare; 
			    			}
			    		}
			    		?>
			    		{date: '<?php echo $year ?>-<?php echo $i ?>', art: <?php echo $totLike ?>},
					<?php endfor; ?>
			    ],
			    xkey: 'date',
			    ykeys: ['art'],
			    labels: ['Articoli'],
			    lineColors: ['#3c8dbc'],
			    hideHover: 'auto'
			  }); 
			  
			  // Donut Chart
			  Morris.Donut({
			      element: 'morris-donut-chart',
			      data: [{
			          label: "Articoli",
			          value: <?php echo count($products); ?>
			      }, {
			          label: "Fotografie",
			          value: <?php echo count($photos); ?>
			      }],
			      resize: true
			  });
			  
		 });
		</script>
	<? endif; ?>
</body>

</html>