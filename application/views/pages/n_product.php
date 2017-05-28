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
        				Creazione <small>Articolo</small>
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
			<form class="newProduct" method="" action="">
				<div class="col-md-6">
					<div class="box box-blue">
						<div class="box-header">
							<h3 class="box-title">Informazioni Articolo</h3>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label>Titolo *</label>
							    <input class="form-control" name="productName" required="true">
							</div>
							<div class="form-group">
								<label>Cliente *</label>
							    <input class="form-control" name="clientName" required="true">
							</div>
							<div class="form-group">
								<label>Stato </label><br />
							    <input type="checkbox" name="status"> 
							    <label for="status" style="font-weight: normal;"> Attivo</label>
							</div>
						</div>
						<div class="box-footer">
							<button type="reset" class="btn btn-primary">Cancella</button>
							<button type="submit" class="btn btn-primary">Inserisci</button>
						</div>
					</div>
				</div>
			</form>	
		
			<form class="newImage" enctype="multipart/form-data" method="post" action="<?php echo base_url('/index.php/back/c_PRD_Photos'); ?>">
				<div class="col-md-6">
					<div class="box box-blue">
						<div class="box-header">
							<h3 class="box-title">Informazioni Gallery</h3>
						</div>
						<div class="box-body">
							<input type="hidden" name="idProduct" value="" />
							<div class="form-group">
						   		<label for="cover">Immagine Gallery *</label>
						    	<input type="file" name="files[]" value="" multiple />
						    	<p class="help-block">Formato richiesto JPEG</p>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary" disabled="true">Salva</button>
						</div>
					</div>
				</div>
			</form>
			
			<div class="col-md-12">
            	<div class="box box-blue">
                	<div class="box-header">
                  		<h3 class="box-title">Gallery</h3>
                	</div>
                
                  	<div class="box-body">
                  		<div class="row" id="gallery"></div>
                  	</div>
              	</div>
			</div>
			
		</div>

		
		<script>
			var idValues = new Array();
			
			$('form.newProduct').on('submit', function (e) {
				e.preventDefault();
				
				$.ajax({
			    	type: 'post',
			        url: '<?php echo base_url(); ?>/index.php/back/c_product',
			        data: $('form.newProduct').serialize(),
			        dataType: 'json',
			            
			        success: function (result) {
			        	$("form.newImage input[name='idProduct']").val( result );
			        	
			        	$("form.newProduct button[type='submit']").prop('disabled', true);
			        	$("form.newImage button[type='submit']").prop('disabled', false);
			        	
			        	alert('Articolo inserito con successo');
			        }, 
			        error: function (result) {
			        	alert('Errore 501:' + result);
			        }
			    });
			});
			
			$('form.newImage').on('submit', function (e) {
				e.preventDefault();
				var formData = new FormData(this);
				
				var id = $("form.newImage input[name='idProduct']").val();
				formData.append("idProduct", id);

				$.ajax({
					type:'POST',
		            url: '<?php echo base_url(); ?>/index.php/back/c_photo',
		            data: formData,
		            cache: false,
		            contentType: false,
		            processData: false,
		            success:function(data){
		                loadImages();
		                alert('Immagini caricate con successo');
		            },
		            error: function(data){
		                alert('Errore 406:' + result);
		            }
			    });
			});
			
			function loadImages() {
				var id = $("form.newImage input[name='idProduct']").val();
				
				$.ajax({
					type: 'post',
				    url: '<?php echo base_url(); ?>/index.php?/back/r_photo_byProduct',
				    data: {idProduct: id},
				    dataType: 'json',
					
				    success: function(result) {
				    	$.each(result, function(id) {
				    	     	$("#gallery").append('<div class="col-xs-6 col-lg-4"> <img style="margin-top: 10px; width: 100%; height: 150px;" src="<?php echo $resources_img ?>/product/' + result[id].photoName + '" class="img-responsive"></div>');
				    	 });
				    },
				    error: function(error) {
				    	alert('Errore 631:' + result);
				    }
				});
			}
		</script>
		
	</div>
</div>
