<div class="large-7 columns extra-padding">		 
	<div class="winbox-white ">
	 <h4 class="text-left" style="color:#333"><i class="fi fi-lock"></i> Change Password</h4>
		<?php
		  $old=(isset($_POST['old']))?$sp->real_escape_string(trim($_POST['old'])):'';
		  $new=(isset($_POST['new']))?$sp->real_escape_string(trim($_POST['new'])):'';
		        
		  $old=$sanjay->hashPass($old);
		  $new=$sanjay->hashPass($new);
		 $check="select * from sanjay_plus where u_user='$user' and u_pass='$old'"; 
		 $check=$sp->query($check) or die ($sp->error);
		  
		 
		  if(isset($_POST['submit'])){
		   $count=$check->num_rows;
		   
		      if($count>0){
		      
		      $update="update sanjay_plus set u_pass='$new' where u_user='$user'";
			if($sp->query($update)){
			echo '<div data-alert class="alert-box success radius">';
			  echo  '<b>Success !</b> password updated successfully';
			  echo  '<a href="#" class="close">&times;</a>';
			echo '</div>';
			
			}else{
			echo '<div data-alert class="alert-box warning radius">';
			  echo  '<b>Error !</b> '.$sp->error;
			  echo  '<a href="#" class="close">&times;</a>';
			echo '</div>';
			}
		    
		      }else{
			echo '<div data-alert class="alert-box alert radius">';
			  echo  '<b>Error !</b> Wrong Current Password...';
			  echo  '<a href="#" class="close">&times;</a>';
			echo '</div>';
			}
		  
		  }
		        
		?>
	<form action="" method="post" data-abide>
		
		    <div class="row">
		      <div class="large-12 columns">
			  <label for="password">Current Password <small>required</small>
			      <input id="password" type="password"  name="old" placeholder="current password" required></input>
			  </label>
			  <small class="error">Passwords must be at least 4 character alphanumeric.</small>
		      </div>
		    </div>
			
		    <div class="row">
		      <div class="large-12 columns">
			  <label for="password">New Password <small>required</small>
			      <input id="password" type="password"  name="new" placeholder="new password" required></input>
			  </label>
			  <small class="error">Passwords must be at least 4  character alphanumeric.</small>
		      </div>
		    </div>
			
			<div class="row">
			<div class="large-12 columns">
			<button type="submit" name="submit" class="button expand radius">Update</button>
			</div>
			</div>
			</form>   
		</div>
</div>


<div class="large-5 columns extra-padding">		 
		<div class="winbox-white text-center">
	
			<h4 class="text-right" style="color:#333"><i class="fi fi-info"></i> Password</h4>
			<p>
			We have tried to hash your password  with the combination of 
			md5,sha256 and with some custom string but it is advisible to
			change your password regularly to remain protected.
			</p>
			   
		</div>
</div>

