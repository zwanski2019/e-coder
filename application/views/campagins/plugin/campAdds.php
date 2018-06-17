<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
          Adds
        </a>
      </h4>
    </div>
    <div id="collapse5" class="panel-collapse collapse">
          
          
          <div class="panel-body">
          
          <?php 
		 if (!empty($addinfo)){
		  foreach ($addinfo as $adds) {
			  	echo '<label><input type="checkbox" name="camp_add[]" value="'.$adds->id.'" id="camp_add"';
				if (isset($camp_add_select)){
					foreach ($camp_add_select as $select){
						
					 if ($select == $adds->id) { echo ' checked ';}
					}
				}
				echo '> '.$adds->addName.'</label><br>';
			  }
		  }
		 
		  ?>
          </div>
          
          
      </div>
    </div>