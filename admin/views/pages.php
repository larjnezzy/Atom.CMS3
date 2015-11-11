<header class="well clearfix">
  <h2>Page Manager</h2>
</header>
<main class="container-fluid">

  <div class="row">
  	
  	<div class="col-md-3">
  
  		<div class="list-group">
  			
  		<a class="list-group-item" href="?page=pages">
  			<i class="fa fa-plus"></i> New Page
  		</a>					
  						
  		<? 
  
        $stmt = $dbc->query("SELECT * FROM posts WHERE type = 1 ORDER BY title ASC");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        while($data= $stmt->fetch()){
  			
  				$blurb = substr(strip_tags($data['body']), 0, 160);
  					
  			?>
  
  			<div id="page_<?=$data['id']?>" class="list-group-item <?selected($data['id'], $opened['id'], 'active')?>">
  				<h4 class="list-group-item-heading"><?=$data['title']?>
  				<span class="pull-right">
  					<a href="#" id="del_<?=$data['id']?>" class="btn btn-danger btn-delete"><i class="fa fa-trash-o"></i></a>
  					<a href="index.php?page=pages&id=<?=$data['id']?>" class="btn btn-default"><i class="fa fa-chevron-right"></i></a>
  				</span>
  				
  				</h4>
  				<p class="list-group-item-text"><?=$blurb?></p>
  			</div>
  				
  				
  		<?}?>
  		
  		</div>
  		
  	</div>
  	
  	<div class="col-md-9">
  
  		<?if(isset($message)) { echo $message; }?>
  		
  		<form action="index.php?page=pages&id=<?=$opened['id']?>" method="post" role="form">
  			
  			
  			<div class="form-group">
  				
  				<label for="title">Title:</label>
  				<input class="form-control" type="text" name="title" id="title" value="<?=$opened['title']?>" placeholder="Page Title">
  				
  			</div>
  
  			<div class="form-group">
  				
  				<label for="user">User:</label>
  				<select class="form-control" name="user" id="user">
  					
  					<option value="0">No user</option>
  					
  					 <?
  					
  						$q = "SELECT id FROM users ORDER BY first ASC";
  						$r = mysqli_query($dbc, $q);
  						
  						while($user_list = mysqli_fetch_assoc($r)) { 
  						
  							$user_data = data_user($dbc, $user_list['id']);
  								
  						?>
  					
  							<option value="<?=$user_data['id']?>" 
  								<? 
  									if(isset($_GET['id'])){
  										selected($user_data['id'], $opened['user'], 'selected');
  									} else {												
  										selected($user_data['id'], $user['id'], 'selected');
  									}
  									
  								
  								?>><?=$user_data['fullname']?></option>
  					
  						<?}?>
  					
  				</select>
  				
  			</div>
  
  			<div class="form-group">
  				
  				<label for="slug">Slug:</label>
  				<input class="form-control" type="text" name="slug" id="slug" value="<?=$opened['slug']?>" placeholder="Page Slug">
  				
  			</div>
  
  			<div class="form-group">
  				
  				<label for="label">Label:</label>
  				<input class="form-control" type="text" name="label" id="label" value="<?=$opened['label']?>" placeholder="Page Label">
  				
  			</div>
  			
  			<div class="form-group">
  				
  				<label for="header">Header:</label>
  				<input class="form-control" type="text" name="header" id="header" value="<?=$opened['header']?>" placeholder="Page Header">
  				
  			</div>										
  
  			<div class="form-group">
  				
  				<label for="body">Body:</label>
  				<textarea class="form-control editor" name="body" id="body" rows="8" placeholder="Page Body"><?=$opened['body']?></textarea>
  				
  			</div>
  			
  			<button type="submit" class="btn btn-default">Save</button>
  			<input type="hidden" name="submitted" value="1">
  			<?if(isset($opened['id'])) {?>
  				<input type="hidden" name="id" value="<?=$opened['id']?>">
  			<?}?>
  			
  		</form>
  		
  	</div>
  		
  </div>
</main>