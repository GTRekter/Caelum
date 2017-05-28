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
        				Modifica <small>Testo</small>
        			 </h1>
        			 <ol class="breadcrumb">
        			     <li class="active">
        			     	<i class="fa fa-dashboard"></i> Dashboard
        			     </li>
        			 </ol>
        		</div>
             </div>
        </div>
         
		<div class="row">
			<form class="modifyText" method="" action="">
				<div class="col-md-12">
					<div class="box box-blue">
						<div class="box-header">
							<h3 class="box-title">Informazioni Testo</h3>
						</div>
						<div class="box-body">
							<input type="hidden" name="idText" value="<?php echo $text->idText; ?>" />
							<div class="form-group">
								<label>Posizione *</label>
							    <input class="form-control" name="position" value="<?php echo ucwords($text->position); ?>" readonly="true">
							</div>
							<label>Testo Italiano *</label>
							<div class="form-group">
								<textarea class="form-control" rows="7" name="textIT"><?php echo $text->textIT; ?></textarea>
							</div>
							<label>Testo Inglese *</label>
							<div class="form-group">
								<textarea class="form-control" rows="7" name="textEN"><?php echo $text->textEN; ?></textarea>
							</div>
						</div>
						<div class="box-footer">
							<button type="reset" class="btn btn-primary">Cancella</button>
							<button type="submit" class="btn btn-primary">Salva</button>
						</div>
					</div>
				</div>
			</form>	
		</div>

		
		<script>
			$('form.modifyText').on('submit', function (e) {
				e.preventDefault();
				
				$.ajax({
			    	type: 'post',
			        url: '<?php echo base_url(); ?>/index.php/back/u_text',
			        data: $('form.modifyText').serialize(),
			            
			        success: function () {
			        	alert('Testo modificato con successo');
			        },
			        error: function (result) {
			        	alert('Errore 987: '+ result);
			        }
			    });
			});
		</script>
		
	</div>
</div>
