 <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Main Images
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
          
          
          <div class="panel-body">

<div class="col-sm-6">
            <div id="imageupdate">
            <h3>Main Image</h3>
            
          
			<?php
			
			if (!empty($images)){
				if ($images[0]->image01!=NULL){
					echo '<img src="'.$_SESSION['imagePath'].$images[0]->image01.'.jpg" width="490" style="display:block;-ms-interpolation-mode:bicubic;outline:none;height:auto;border:none;" border="0" id="myImg" /><br />';
					echo '<input name="image01" type="hidden" id="image01" value="'.$images[0]->image01.'" />';
					echo '<input name="image01File" id="image01File" type="file" />';
			} 
				else { 
					echo '<div id="myImg"></div>';
					echo '<input name="image01File" id="image01File" type="file" />';
					}
			}
			
			else {
				echo '<input name="image01File" id="image01File" type="file" />';
				}
			?>
            <div id="myImg"></div>
            <div>
				<input type="text" class="form-control" name="image01_link" id="image01_link" placeholder="Banner Link" value="<?php if (isset($images[0]->image01_link)) { echo $images[0]->image01_link;}  ?>">
				</div>
            
            </div>
            </div>
            <div class="col-sm-6">
            <div id="imageupdate">
            <h3>2nd Image</h3>
            
          
			<?php
			
			if (!empty($images)){
				if ($images[0]->image02!=NULL){
					echo '<img src="'.$_SESSION['imagePath'].$images[0]->image02.'.jpg" width="490" style="display:block;-ms-interpolation-mode:bicubic;outline:none;height:auto;border:none;" border="0" id="myImg" /><br />';
					echo '<input name="image02" type="hidden" id="image02" value="'.$images[0]->image02.'" />';
					echo '<input name="image02File" id="image02File" type="file" />';
			} 
				else { 
					echo '<div id="myImg"></div>';
					echo '<input name="image02File" id="image02File" type="file" />';
					}
			}
			
			else {
				echo '<input name="image02File" id="image02File" type="file" />';
				}
			?>
            <div id="myImg"></div>
            
            </div>
			
      		
            </div>
         
                  </div>
          
          
      </div>
    </div>
            