<h1>Site Settings</h1>

<div class="row">
	
	<div class="col-md-12">

		<?php if(isset($message)) { echo $message; } ?>
			
		<?php 

      $stmt = $dbc->query("SELECT * FROM settings ORDER BY id ASC");
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
          
      while($data = $stmt->fetch()){?>

				<form class="form-inline" action="index.php?page=settings&id=<?php echo $data['id']; ?>" method="post" role="form">

					<div class="form-group">
						
						<label class="sr-only" for="id">ID:</label>
						<input class="form-control" data-id="<?php echo $data['id']; ?>" data-label="Setting ID" data-db="settings-id" type="text" name="id" id="id" value="<?php echo $data['id']; ?>" placeholder="id-name" autocomplete="off" disabled>
						
					</div>
					
					<div class="form-group">
						
						<label class="sr-only" for="label">Label:</label>
						<input class="form-control blur-save" data-id="<?php echo $data['id']; ?>" data-label="Setting Label" data-db="settings-label" type="text" name="label" id="label" value="<?php echo $data['label']; ?>" placeholder="Label" autocomplete="off">
						
					</div>
					
					<div class="form-group">
						
						<label class="sr-only" for="value">Value:</label>
						<input class="form-control blur-save" data-id="<?php echo $data['id']; ?>" data-label="Setting Value" data-db="settings-value" type="text" name="value" id="value" value="<?php echo $data['value']; ?>" placeholder="Value" autocomplete="off">
						
					</div>						
		
					<button type="submit" class="btn btn-default">Save</button>
					<input type="hidden" name="submitted" value="1">
					
					<input type="hidden" name="openedid" value="<?php echo $data['id']; ?>">
					
				</form>

		<?php } ?>

	</div>
		
</div>