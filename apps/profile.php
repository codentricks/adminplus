 <div class="large-7 columns extra-padding">
 <div class="winbox-white">
  <h3>Profile Update</h3>
  
  <?php
    $name=(isset($_POST['name']))?$sp->real_escape_string(trim($_POST['name'])):'';
    $city=(isset($_POST['city']))?$sp->real_escape_string(trim($_POST['city'])):'';
    $country=(isset($_POST['country']))?$sp->real_escape_string(trim($_POST['country'])):'';
    $email=(isset($_POST['email']))?$sp->real_escape_string(trim($_POST['email'])):'';
   
   $update="update sanjay_plus set u_name='$name',u_city='$city',u_country='$country',u_mail='$email'
            where u_user='$user'" ;
            
    if(isset($_POST['update'])){
		
		if($sp->query($update)){
			echo '<div data-alert class="alert-box success radius">';
			  echo  '<b>Success !</b> Profile updated successfully';
			  echo  '<a href="#" class="close">&times;</a>';
			echo '</div>';
			header('refresh:2;url=dashboard.php?page=profile');
			
			}else{
			echo '<div data-alert class="alert-box warning radius">';
			  echo  '<b>Error !</b> '.$sp->error;
			  echo  '<a href="#" class="close">&times;</a>';
			echo '</div>';
			}
		
		
	}	        
    
  ?>
  <form action="" method="post" data-abide>
    <div class="row">
         <div class="large-12 columns">
			<label>Your name <small>required</small>
			  <input type="text" name="name" value="<?php echo $info->u_name;?>" required/>
			</label>
			<small class="error">Name is required</small>
		 </div>
	</div>	
	<div class="row"> 
		 <div class="large-6 columns">
			<label>City <small>optional</small>
			  <input type="text" name="city" value="<?php echo $info->u_city;?>" />
			</label>
		 </div>
		 <div class="large-6 columns">
			<label>Country <small>optional</small>
			  <input type="text" name="country" value="<?php echo $info->u_country;?>" />
			</label>
		 </div>
    </div>
    <div class="row">
		<div class="large-12 columns">
		<label>Email <small>required</small>
		  <input type="email" name="email" value="<?php echo $info->u_mail;?>" required />
		</label>
		<small class="error">An email address is required.</small>
        </div>
    </div>
    
    <div class="row">
		<div class="large-12 columns">
		 <button type="submit" name="update" class="small button expand success radius">Update</button>
		</div>
    </div>
    
  </form>      
 </div>
 </div>
 
 <div class="large-5 columns extra-padding">
 <div class="winbox-white ">
  <h3 class="text-right">Profile Picture</h3>
      <div class="row">
	   <?php
	        $output_dir = "img/";
		$allowedExts = array("jpg", "jpeg", "gif", "png","JPG");
		$extension = @end(explode(".", $_FILES["myfile"]["name"]));
		    if(isset($_POST['upload']))
		    {
			    //Filter the file types , if you want.
			    if ((($_FILES["myfile"]["type"] == "image/gif")
				    || ($_FILES["myfile"]["type"] == "image/jpeg")
				    || ($_FILES["myfile"]["type"] == "image/JPG")
				    || ($_FILES["myfile"]["type"] == "image/png")
				    || ($_FILES["myfile"]["type"] == "image/pjpeg"))
				    && ($_FILES["myfile"]["size"] < 504800)
				    && in_array($extension, $allowedExts)) 
			    {
				      if ($_FILES["myfile"]["error"] > 0)
					    {
					    echo "Return Code: " . $_FILES["myfile"]["error"] . "<br>";
					    }
				    if (file_exists($output_dir. $_FILES["myfile"]["name"]))
				      {
				      unlink($output_dir. $_FILES["myfile"]["name"]);
				      }	
					    else
					    {
					    $pic=$_FILES["myfile"]["name"];
					    $conv=explode(".",$pic);
					    $ext=$conv['1'];	
						    
					    //move the uploaded file to uploads folder;
				          move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$user.".".$ext);
					    
					    $pics=$output_dir.$user.".".$ext;
					  
					      
					    $url=$user.".".$ext;
					    
					    
					    $update="update sanjay_plus set u_imgurl='$url' where u_user='$user'";
					    
					    if($sp->query($update)){
						   echo '<div data-alert class="alert-box success radius">';
						      echo  '<b>Success !</b>  Image Updated' ;
						      echo  '<a href="#" class="close">&times;</a>';
						    echo '</div>';
						   header('refresh:3;url=dashboard.php'); 
					    }
					    else{
						    echo '<div data-alert class="alert-box alert radius">';
						      echo  '<b>Error !</b> ' .$sp->error ;
						      echo  '<a href="#" class="close">&times;</a>';
						    echo '</div>';
					    }
					    
					    
					    
					    }
					    
			    }	
			    else{
			    
			       echo '<div data-alert class="alert-box warning radius">';
			        echo  '<b>Warning !</b>  File not Uploaded, Check image' ;
			        echo  '<a href="#" class="close">&times;</a>';
				echo '</div>';
		 
			    }

		    }	    
	         ?>

		<div class="large-3 columns">
		<img src="img/<?php echo $info->u_imgurl; ?>" width="64" height="64" alt="User Image"/>
		</div> 
		
		<div class="large-9 columns">
		    <form action="" method="post" enctype="multipart/form-data">
		      <div class="large-12 columns">
			<span style="color:red;">Maximun Image Size 100KB</span><br/><br/>
			<input type="file" name="myfile"  required/>
			</div> 
			
			<div class="large-12 columns">
			<button type="submit" name="upload" class="tiny button radius success">Upload</button>
			</div> 
		    </form>
		</div>
      </div>
 </div>
 </div>
 
