<header class="well clearfix">
  <h2>User Manager</h2>
</header>
<main class="container-fluid">
  
  <?if(isset($opened['id'])) { ?>
  	<script>
  		
  		$(document).ready(function() {
  			
  			Dropzone.autoDiscover = false;
  			
  			var myDropzone = new Dropzone("#avatar-dropzone");
  			
  			myDropzone.on("success", function(file){
  				
  				$("#avatar").load("ajax/avatar.php?id=<?=$opened['id']?>");
  				
  			});
  	
  		});
  	
  	</script>
  <?}?>
  
  <div class="row">
  	
  	<div class="col-md-3">
  
  		<div class="list-group">
  			
  		<a class="list-group-item" href="?page=users">
  			<i class="fa fa-plus"></i> New User
  		</a>					
  						
  		<?
  		
        $stmt = $dbc->query("SELECT * FROM users ORDER BY last ASC");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        while($data= $stmt->fetch()){
  			
  				$list = data_user($dbc, $data['id']);
  					
  			?>
  
  			<a class="list-group-item <?selected($data['id'], $opened['id'], 'active')?>" href="index.php?page=users&id=<?=$data['id']?>">
  				<h4 class="list-group-item-heading"><?=$list['fullname_reverse']?></h4>
  				<!--<p class="list-group-item-text"><?php //echo $blurb?></p>-->
  			</a>
  				
  				
  		<?}?>
  		
  		</div>
  		
  	</div>
  	
  	<div class="col-md-9">
  
  		<?if(isset($message)) { echo $message; } ?>
  		
  		<div class="col-md-8">
  		  
  		  <form action="index.php?page=users&id=<?=$opened['id']?>" method="post" role="form">

          <div class="form-group">
            <div class="col-md-6">
              <label for="first">First Name:</label>
              <input class="form-control" type="text" name="first" id="first" value="<?=$opened['first']?>" placeholder="First Name" autocomplete="off">
            </div>
            <div class="col-md-6">
              <label for="last">Last Name:</label>
              <input class="form-control" type="text" name="last" id="last" value="<?=$opened['last']?>" placeholder="Last Name" autocomplete="off">
            </div>
            
          </div>
          
          <div class="form-group">
            <div class="col-md-6">
              <label for="email">Email Address:</label>
              <input class="form-control" type="text" name="email" id="email" value="<?=$opened['email']?>" placeholder="Email Address" autocomplete="off">
            </div>
            <div class="col-md-6">
              <label for="status">Status:</label>
              <select class="form-control" name="status" id="status">
                
                <option value="0" <?if(isset($_GET['id'])){ selected('0', $opened['status'], 'selected'); } ?>>Inactive</option>
                <option value="1" <?if(isset($_GET['id'])){ selected('1', $opened['status'], 'selected'); } ?>>Active</option>
                          
              </select>
            </div>
          </div>
          
    
          <div class="form-group">
            <div class="col-md-6">
              <label for="password">Password:</label>
              <input class="form-control" type="password" name="password" id="password" value="" placeholder="Password" autocomplete="off">
            </div>
            <div class="col-md-6">
              <label for="passwordv">Verify Password:</label>
              <input class="form-control" type="password" name="passwordv" id="passwordv" value="" placeholder="Type Password Again" autocomplete="off">
            </div>  
          </div>
          <div class="form-group form-btn-row">
            <div class="col-md-12">
              <button type="submit" class="btn btn-default">Save</button>
            </div>
          </div>
		
  			
    			
    			<input type="hidden" name="submitted" value="1">
    			<?if(isset($opened['id'])) { ?>
    				<input type="hidden" name="id" value="<?=$opened['id']?>">
    			<?} ?>
    		  </form>
        </div>
        
        <div class="col-md-4">
          
          <?if($opened['avatar'] != ''){?>
    
            <div class="avatar-container" style="background-image: url('../uploads/<?=$opened['avatar']?>')"></div>
    
          <?}?>
         		
  		    <?if(isset($opened['id'])) {?>
  			
  		      <form action="uploads.php?id=<?=$opened['id']?>" class="dropzone" id="avatar-dropzone"></form>
  		
  		    <?}?>         
        </div> 
        
        <div id="avatar"></div>
        
  		</div>
  </div>

</main>