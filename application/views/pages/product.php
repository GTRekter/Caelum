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
        				Modifica <small>Articolo</small>
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
			<form class="modifyProduct" method="" action="">
				<div class="col-md-6">
					<div class="box box-blue">
						<div class="box-header">
							<h3 class="box-title">Informazioni Articolo</h3>
						</div>
						<div class="box-body">
							<input type="hidden" name="idProduct" value="<?php echo $product->idProduct; ?>" />
							<div class="form-group">
								<label>Titolo *</label>
							    <input class="form-control" name="productName" required="true" value="<?php echo ucwords($product->productName); ?>">
							</div>
							<div class="form-group">
								<label>Cliente *</label>
							    <input class="form-control" name="clientName" required="true">
							</div>
							<div class="form-group">
								<label>Visibilità in HP </label><br />
								<input type="checkbox" name="status" value="1" <?php echo($product->status == 1 ? 'checked' : '');?> > 
								<label for="status" style="font-weight: normal;"> Attivo</label>
							</div>
						</div>
						<div class="box-footer">
							<button type="reset" class="btn btn-primary">Cancella</button>
							<button type="submit" class="btn btn-primary">Salva</button>
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
							<input type="hidden" name="idProduct" value="<?php echo $product->idProduct; ?>" />
							<div class="form-group">
						   		<label for="cover">Immagine Gallery *</label>
						    	<input type="file" name="files[]" value="" multiple />
						    	<p class="help-block">Formato richiesto JPEG</p>
							</div>
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Salva</button>
						</div>
					</div>
				</div>
			</form>
			
			<form class="removeImage" method="" action="">
				<div class="col-md-12">
	            	<div class="box box-blue">
	                	<div class="box-header">
	                  		<h3 class="box-title">Gallery</h3>
	                	</div>
                
	                  	<div class="box-body">
	                  		<div class="row" id="gallery">
	                  			<?php if($photos) : ?>
			                  		<?php foreach ($photos as $photo) : ?>
			                  			<?php if($photo->idProduct == $product->idProduct) : ?>
			                  			<div id="<?php echo $photo->idPhoto ?>" class="col-xs-6 col-lg-3"> 
			                  				<img style="width: 100%; height: 150px;" src="<?php echo $resources_img.'/product/'.$photo->photoName; ?>" alt="" />
			                  				
			                  				<input type="checkbox" name="idPhoto[]" value="<?php echo $photo->idPhoto ?>" />
			                  				Cancella
			                  				
			                  			</div>
			                  			<?php endif; ?>
			                  		<?php endforeach; ?>
		                  		<?php endif; ?>
	                  		</div>
	                  	</div>
                  	
	                  	<div class="box-footer">
	                  		<button type="submit" class="btn btn-primary">Cancella</button>
	                  	</div>
	              	</div>
				</div>
			</form>
			
		</div>

		
		<script>
			var idValues = new Array();
			
			$('form.modifyProduct').on('submit', function (e) {
				e.preventDefault();
				
				$.ajax({
			    	type: 'post',
			        url: '<?php echo base_url(); ?>/index.php/back/u_product',
			        data: $('form.modifyProduct').serialize(),
			            
			        success: function (result) {
			        	$("form.newProduct button[type='submit']").prop('disabled', true);
			        	
			        	alert("Modifica effettuata con successo");
			        },
			        error: function (result) {
			        	alert("Error 726: "+ result);
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
		            error: function (result) {
		            	alert("Error 076: "+ result);
		            }
			    });
			});
			
			$('form.removeImage').on('submit', function (e) {
				e.preventDefault();
				
				$.ajax({
			    	type: 'post',
			        url: '<?php echo base_url(); ?>/index.php/back/d_photo',
			        data: $('form.removeImage').serialize(),
			        dataType: 'json',
			            
			        success: function (result) {
						$.each(result, function(id) {
							var child = document.getElementById(result[id]);
							var parent = document.getElementById("gallery");
							
							// Delete child
							parent.removeChild(child);
							
						});
			        },
			        error: function (result) {
			        	alert("Error 686: "+ result);
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
				    	$("#gallery").empty();
				    	$.each(result, function(id) {
				    	     	$("#gallery").append('<div id="' + result[id].idPhoto + '" class="col-xs-6 col-lg-3"> <img style="width: 100%; height: 150px;" src="<?php echo $resources_img ?>/product/' + result[id].photoName + '"> <input type="checkbox" name="idPhoto[]" value=' + result[id].idPhoto + ' /> Cancella </div>');
				    	 });
				    	 console.log(result);
				    },
				    error: function(error) {
				    	alert('ERROR');
				    	console.log(error);
				    }
				});
			}
		</script>
		
	</div>
</div>
