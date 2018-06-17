<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row">
			<div class="col-sm-11 panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#addBlock"><h4>Add Block</h4></a>
			</div>
		</div>
	</div>
	<div id="addBlock" class="panel-collapse collapse">
		<div class="panel-body">
			<!---------table------->


			<?php

			echo '<script language="JavaScript"> tinymce.init({selector:".addCopy",
			theme: "modern",
			skin: "lightgray",
			height : 50,
			menubar : false,
			statusbar : false,
			forced_root_block : false,
			force_p_newlines : false,
			paste_as_text: true,
			plugins: "paste link code",
			toolbar_items_size: "small",
			toolbar: "undo redo | styleselect | bold italic | bullist numlist | link code"});</script>';
			
			// ** Define Defaults
			$addInfo = NULL;
			
			// ** Define Defaults - END 

			if ( $addBlock != NULL ) {
				$addInfo = explode( "|", $addBlock );
				$addInfo = array_values( array_filter( $addInfo ) );
			}
			

			for ( $x = 0; $x <= 1; $x++ ) {
				if ($addInfo != NULL ){
				$info = explode( "##", $addInfo[ $x ] );
				}
				?>

			<div class="col-md-12 addEntry" id="<?=$x?>">
				<div class="row">
					<div class="col-xs-12">
						<input type="hidden" name="addSplit_<?=$x?>" id="addSplit_<?=$x?>" value="<?=$x?>">
						<textarea name="addText_<?=$x?>" id="addText_<?=$x?>" class="form-control addCopy" placeholder="Add Copy">
							<?php echo isset($info[0]) ? $info[0] : ''?>
						</textarea>
						<input type="text" name="readMore_<?=$x?>" id="readMore_<?=$x?>" class="form-control offerLink" placeholder="Read More link" value="<?php echo isset($info[2]) ? $info[2] : ''?>">
					</div>
				</div>
			</div>
			<?php  }	
                
				?>

		</div>

	</div>
</div>