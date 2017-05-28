<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>

	<!-- Footer -->
    <footer class="text-center">
    	<div class="container">
        	<div class="row">
            	<div class="col-lg-12 padding-v-20">
                	All Rights Reserved ® | Powered by <a href="www.webevolution.eu" target="_blank">Web Evolution</a>
            	</div>
        	</div>
    	</div>
    </footer>


    <!-- jQuery -->
    <script src="<?php echo $resources_js; ?>/jquery.js"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $resources_js; ?>/bootstrap.min.js"></script>
<!--
    <!-- Plugin JavaScript --*>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="<?php echo $resources_js; ?>/classie.js"></script>
    <script src="<?php echo $resources_js; ?>/cbpAnimatedHeader.js"></script>

    <!-- Custom Theme JavaScript --*>
    <script src="<?php echo $resources_js; ?>/freelancer.js"></script>-->

</body>

</html>
