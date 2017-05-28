<?php 
	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$resources_path = $this->config->item('resources_url');
	$resources_css = $resources_path . "/css";
	$resources_js = $resources_path . "/js";
	$resources_img = $resources_path . "/img";
?>

<div id="page-wrapper">
	<div class="container-fluid">

		<div class="row">
			<div class="col-sm-12">
				<div class="page-header">
					<h1>
						Testi <small>Lista testi inseriti</small>
					 </h1>
					 <ol class="breadcrumb">
					     <li>
					     	<i class="fa fa-dashboard"></i> Dashboard
					     </li>
					     <li class="active">
					     	Testi
					     </li>
					 </ol>
				</div>
		     </div>
		</div>	
         
        <div class="row">
			<div class="col-md-12">
				<div class="box box-blue">
					<div class="box-header">
						<h3 class="box-title">Lista Testi</h3>
					</div>
					
					<div class="box-body">
						<div class="table-responsive">
							<table class="table table-hover">
						    	<thead>
						        	<tr>
							        	<td>Posizione</td>
						            	<td>Testo</td>
						                <td>Modifica</td>
						                <td></td>
						            </tr>
						        </thead>
						        <?php if($texts) : ?>
						        	<?php foreach ($texts as $text) : ?>
								    	<tr>
								    		<td href="<?php echo site_url('back/text/' . $text->idText); ?>"><?php echo ucfirst($text->position); ?></td>
								    		<td href="<?php echo site_url('back/text/' . $text->idText); ?>"><?php echo ucfirst( substr($text->textIT,0,100). '...'); ?></td>
								    		<td href="<?php echo site_url('back/text/' . $text->idText); ?>"><?php echo ucfirst($text->updatedOn); ?></td>
								        	<td href="<?php echo site_url('back/d_text/'.$text->idText); ?>">
								        		<i class="flaticon-delete96"></i>
								        	</td>
								    	</tr>
								    	
						    		<?php endforeach; ?>
						    	<?php endif; ?>
						    </table>
					    </div>
				    </div>
				</div>	
					
				</div>
			</div>	
		</div>
		
		<script type="text/javascript">
		$(document).ready(function(){
		    $('table tr td').click(function(){
		        window.location = $(this).attr('href');
		        return false;
		    });
		});
		</script>
		
	</div>
</div>
