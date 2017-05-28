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
						Esporta <small>CSV</small>
					 </h1>
					 <ol class="breadcrumb">
					     <li class="active">
					     	<i class="fa fa-dashboard"></i> Dashboard
					     </li>
					 </ol>
				</div>
			</div>
		</div>

<!--         <div class="row">
         	<div class="col-lg-12">
           	    <div class="alert alert-info alert-dismissable">
                	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out 
                    <a href="#" class="alert-link">SB Admin 2</a> for additional features!
                </div>
            </div>
         </div>-->

         <div class="row">
         	<form method="post" action="<?php echo site_url('back/exportcsv'); ?>">
				<div class="col-md-12">
					<div class="box box-success">
						<div class="box-header">
							<h3 class="box-title">Visualizzazioni</h3>
						</div>
						<div class="box-body">
							<div class="form-group">
								<label>Tabella da esportare</label>
								<select class="form-control" name="tableName">
							        <option value="product">Articoli</option>
							        <option value="text">Testi</option>
							        <option value="photo">Fotografie</option>
							     </select>
							</div>
				        </div>
						<div class="box-footer">
							<button type="submit" class="btn btn-default">Genera CSV</button>
						</div>
				    </div>
				</div>	
         	</form>
		</div>
	</div>
</div>
