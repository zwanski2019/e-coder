
     

         <div class="panel panel-default">
          <div class="panel-heading">
          <div class="row">
			  <div class="col-sm-11 panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#statOffers"><h4>Offers</h4></a></div>
          </div>
          </div>
          <div id="statOffers" class="panel-collapse collapse">
            <div class="panel-body">
              <!---------table------->
              
                
                <?php
				
				echo '<script language="JavaScript"> tinymce.init({selector:".offerCopy",
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
				
				
				
				if ($offers!=NULL){
					$offerinfo = explode("|",$offers);
				

				$x=0;
				foreach ($offerinfo as $infos) {
						if ($infos != NULL){
						$info = explode("##",$infos);
						
						?>
                    
                    <div class="col-md-12 offerEntry" id="<?=$x?>">
                     <span class="btn remove_bt pull-right" onClick="delRow()"><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></span>
                     <div class="row">
                     <div class="col-xs-4">
                     <?php 
					 
			
                    if ($info[1]!=NULL){
					echo '<img src="https://ooredoo.s3.amazonaws.com/business-news/img/'.$info[1].'.jpg" width="240" style="display:block;-ms-interpolation-mode:bicubic;outline:none;height:auto;border:none;" border="0" id="myImg" /><br />';
					echo '<input name="offerimage'.$x.'" type="hidden" id="offerimage'.$x.'" value="'.$info[1].'" />';
					echo '<input name="offerimage'.$x.'" id="offerimage'.$x.'" type="file" />';
					} 
					else {
      					echo '<input name="offerimage'.$x.'" id="offerimage'.$x.'" type="file" />';
                      } ?>
                      
                      <input type="hidden" name="offersSplit_<?=$x?>" id="offersSplit_<?=$x?>" value="1">
						 
                       </div>
                      <div class="col-xs-8">
                        <textarea name="offertext_<?=$x?>" id="offertext_ID" cols="" rows="" class="form-control offerCopy" placeholder="Offer Copy"><?=$info[0]?></textarea>
                        <input type="text" name="readMore_<?=$x?>" id="readMore_<?=$x?>" class="form-control offerLink" placeholder="Read More link" value="<?php if (isset($info[3])) echo $info[3];?>">                       
                        </div>                        
                    </div>
				</div>
					
                <?php
				}
				$x++;
								
				} 
				
				}
				else { 
					$x=1;
				?>
				
				
				<div class="col-md-12 offerEntry" id="1">
                     <span class="btn remove_bt pull-right" onClick="delRow()"><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></span>
                     <div class="row">
                     <div class="col-xs-4">
                     	 <input name="offerimage1" id="offerimage1" type="file" />
						 <input type="hidden" name="offersSplit_1" id="offersSplit_1" value="1">
                       </div>
                      <div class="col-xs-7">
                        <textarea name="offertext_1" id="offertext_1" cols="" rows="" class="form-control offerCopy" placeholder="Offer Copy"></textarea>
                        <input type="text" name="readMore_1" id="readMore_1" class="form-control" placeholder="Read More link" value="">                       
                        </div>
                    </div>
				</div>
					
					<?php
				}
				?>
              
              <!---------end table ------>
              

              <!----- script ------>
              <script type="text/javascript">

			function addRow() {
				var lastId = $('.offerEntry:last').attr('id');	
				var newID = parseInt(lastId) + 1;
				$('.offerEntry:last').after('<div class="col-md-12 offerEntry block" id="'+newID+'"><span class="btn remove_bt pull-right" onClick="delRow()"><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></span><div class="row"><div class="col-xs-4"><input name="offerimage'+newID+'" id="offerimage'+newID+'" type="file" /></div><div class="col-xs-7"><textarea name="offertext_'+newID+'" id="offertext_'+newID+'" cols="" rows="" class="form-control offerCopy" placeholder="Offer Copy"></textarea><input type="text" name="readMore_'+newID+'" id="readMore_'+newID+'" class="form-control" placeholder="Read More link" value=""></div></div></div>');
				var newID = 0;
				  $('.offerEntry').each(function(idx, el){
					  	$(this).attr('id',newID);
					    newID ++;
					})
				$('input[name=offersCount]').val(newID);
			};
				function delRow() {
					$('.panel-body').on('click','.remove_bt',function() {
						$(this).parent().remove();
					})
					var newID = 0;
				  $('.offerEntry').each(function(idx, el){
					  	$(this).attr('id',newID);
					    newID ++;
					})
				  $('input[name=offersCount]').val(newID);
				};
		</script>    
              <!----- end script --->
            </div>
            <div style="padding:20px;">
            <span class="btn btn-primary add" id="addBTid" onClick="addRow()">Add Offer</span>
            <input name="offersCount" type="hidden" id="offersCount" value="<?=$x-1?>" />
			  </div>
           
          </div>
        </div>
        