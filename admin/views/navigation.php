<main class="container-fluid">
  
  <h1>Navigation</h1>
  
  <div class="row">
  	
  	<div class="col-md-3">
  		
  		<table class="table table-bordered">
  		  
  		  <thead>
  		    <tr>
  		      <th>ID</th>
  		      <th>Label</th>
  		      <th>Url</th>
  		      <th></th>
  		      <th></th>
  		    </tr>
  		  </thead>
  		
  			
  			<?
  
        $stmt = $dbc->query("SELECT * FROM navigation ORDER BY position ASC");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        while($data= $stmt->fetch()){?> 
  			
  			<form class="form-horizontal nav-form" action="index.php?page=navigation&id=<?=$data['id']?>" method="post" role="form">
  			<tr>
  			  <td><?=$data['id']?></td> 
  			  <td><input class="form-control input-sm" type="text" name="label" id="label" value="<?=$data['label']?>" placeholder="Label" autocomplete="off"></td>
  			  <td></td>
  			  <td></td>
  			  <td></td>
  			</tr>
  			</form>
  			
  			<!--
  			<li id="list_<?=$data['id']?>" class="list-group-item">
  				<a id="label_<?=$data['id']?>" data-toggle="collapse" data-target="#form_<?=$data['id']?>">
  					<?=$data['label']?> <i class="fa fa-chevron-down"></i>
  				</a>
  				<div id="form_<?=$data['id']?>" class="collapse">
  
  					
  	
  						<div class="form-group">
  							
  							<label class="col-sm-2 control-label" for="id">ID:</label>
  							<div class="col-sm-10">
  								<input class="form-control input-sm" type="text" name="id" id="id" value="<?=$data['id']?>" placeholder="id-name" autocomplete="off">
  							</div>
  							
  						</div>
  						
  						<div class="form-group">
  							
  							<label class="col-sm-2 control-label" for="label">Label:</label>
  							<div class="col-sm-10">
  								<input class="form-control input-sm" type="text" name="label" id="label" value="<?=$data['label']?>" placeholder="Label" autocomplete="off">
  							</div>
  							
  						</div>
  						
  						<div class="form-group">
  							
  							<label class="col-sm-2 control-label" for="value">Url:</label>
  							<div class="col-sm-10">
  								<input class="form-control input-sm" type="text" name="url" id="url" value="<?=$data['url']?>" placeholder="Url" autocomplete="off">
  							</div>
  							
  						</div>	
  						
  						<div class="form-group">
  							
  							<label class="col-sm-2 control-label" for="status">Status:</label>
  							<div class="col-sm-10">
  								<input class="form-control input-sm" type="text" name="status" id="status" value="<?=$data['status']?>" placeholder="" autocomplete="off">
  							</div>
  							
  						</div>																
  			
  						<button type="submit" class="btn btn-default">Save</button>
  						<input type="hidden" name="submitted" value="1">
  						
  						<input type="hidden" name="openedid" value="<?=$data['id']?>">
  						
  					</form>					
  					
  				</div>
  			</li>
  			-->
  			<?}?>
  
  		</table>
  
  	</div>
  
  	<div class="col-md-9">
  
  		<?if(isset($message)) { echo $message; }?>			
  
  	</div>
  		
  </div>
</main>