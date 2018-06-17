
     

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
				
				
				echo '<table id="sortable" width="100%" ><tbody class="ui-sortable">';
				
				if ($offers!=NULL){
					$offerinfo = explode("|",$offers);
					//print_r($offerinfo);
					//exit;

				$x=0;
				
				foreach ($offerinfo as $infos) {
						if ($infos != NULL){
						$info = explode("##",$infos);
						echo '<tr class="ui-state-default" style=""><td id="tb-td">';
						?>
                    <div class="col-md-12 offerEntry" id="<?=$x?>">
                     <span id="close<?=$x?>" class="btn remove_bt pull-right hidden" onClick="delRow()" style=""><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></span>
                     <div class="row">
                     <div class="col-xs-4">
                     <?php 
					 
			
                    if ($info[1]!=NULL){
					echo '<img src="http://enews.airmilesme.com/am/img/'.$info[1].'.jpg" width="240" style="display:block;-ms-interpolation-mode:bicubic;outline:none;height:auto;border:none;" border="0" id="myImg" /><br />';
					echo '<input name="offerimage'.$x.'" type="hidden" id="offerimage'.$x.'" value="'.$info[1].'" />';
					echo '<input name="offerimage'.$x.'" id="offerimage'.$x.'" type="file" />';
					} 
					else {
      					echo '<input name="offerimage'.$x.'" id="offerimage'.$x.'" type="file" />';
                      } ?>
                      
                      
						 <div class="col-xs-8 required splitcheck" data-toggle="buttons">
						  <label class="btn btn-default radio_ButtonL <?php if (isset($info[2])){echo $info[2]=='2' ? 'active' : ''; }?>">
							<input type="radio" name="offersSplit_<?=$x?>" id="optionsRadios1" value="2" <?php if (isset($info[2])){ echo $info[2]=='2' ? ' checked' : '';} ?>>
							Double
						  </label>
						  <label class="btn btn-default radio_ButtonR <?php if (isset($info[2])){echo $info[2]=='1' ? 'active' : ''; }?>">
							<input type="radio" name="offersSplit_<?=$x?>" id="optionsRadios2" value="1" <?php if (isset($info[2])){echo $info[2]=='1' ? ' checked' : ''; }?>>
							Single
						  </label>
						</div>
                       </div>
                      <div class="col-xs-8">
                        <textarea name="offertext_<?=$x?>" id="offertext_ID" cols="" rows="" class="form-control offerCopy" placeholder="Offer Copy"><?=$info[0]?></textarea>
                        <input type="text" name="readMore_<?=$x?>" id="readMore_<?=$x?>" class="form-control offerLink" placeholder="Read More link" value="<?php if (isset($info[3])) echo $info[3];?>">
						   <input type="text" name="sortId_<?=$x?>" id="sortId_<?=$x?>" value="<?=$x+1?>">						  
                        </div>                        
                    </div>
				</div>
					
                <?php
					echo '</td></tr>';
				}
				$x++;
								
				} 
				echo '</tbody></table>';
				}
				else { 
					$x=2;
				?>
				
				
				<div class="col-md-12 offerEntry" id="1">
                     <span class="btn remove_bt pull-right" onClick="delRow()"><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></span>
                     <div class="row">
                     <div class="col-xs-4">
                     	<input name="offerimage1" id="offerimage1" type="file" />						 
						  <div class="col-xs-8 required splitcheck" data-toggle="buttons">
						  <label class="btn btn-default radio_ButtonL">
							<input type="radio" name="offersSplit_1" id="optionsRadios1" value="2" checked>
							Double
						  </label>
						  <label class="btn btn-default radio_ButtonR">
							<input type="radio" name="offersSplit_1" id="optionsRadios2" value="1">
							Single
						  </label>
						</div>
                       </div>
                      <div class="col-xs-8">
                        <textarea name="offertext_1" id="offertext_1" cols="" rows="" class="form-control offerCopy" placeholder="Offer Copy"></textarea>
                        <input type="text" name="readMore_1" id="readMore_1" class="form-control" placeholder="Read More link" value=""> 
						 <input type="text" name="sortId_1" id="sortId_1" value="1">
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
				var newID = parseInt(lastId) + 2;
				$('.offerEntry:last').after('<div class="col-md-12 offerEntry block" id="'+newID+'"><span class="btn remove_bt pull-right" onClick="delRow()"><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></span><div class="row"><div class="col-xs-4"><input name="offerimage'+newID+'" id="offerimage'+newID+'" type="file" /><div class="col-xs-8 required splitcheck" data-toggle="buttons"><label class="btn btn-default radio_ButtonL"><input type="radio" name="offersSplit_'+newID+'" id="optionsRadios1" value="2" checked>Double</label><label class="btn btn-default radio_ButtonR"><input type="radio" name="offersSplit_'+newID+'" id="optionsRadios2" value="1">Single</label></div></div><div class="col-xs-8"><textarea name="offertext_'+newID+'" id="offertext_'+newID+'" cols="" rows="" class="form-control offerCopy" placeholder="Offer Copy"></textarea><input type="text" name="readMore_'+newID+'" id="readMore_'+newID+'" class="form-control" placeholder="Read More link" value=""><input type="text" name="sortId_'+newID+'" id="sortId_'+newID+'" value="'+newID+'"></div></div></div>');
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
					newID--;
				  $('input[name=offersCount]').val(newID);
				  
				};
				  
			$(function () {
					var sortOrder = [];
					var $sortableTable  = $("#sortable tbody");

					$sortableTable.sortable({
						stop: function(event, element) {
							$.each($('tr [name^=sort]', $sortableTable), function(index, element){
								element.value = index+1;
								/*$("templateForm").submit();*/
							});
						}
					});

					$sortableTable.disableSelection();

					$('tr [name^=sort]', $sortableTable).on('keydown', function(){
						$(this).closest('tr').data();
						
					});
				});

		</script>
				<script >
						 /* if($("#tb-td").next().length == 0) {
										var closeID = 'close' +(document.getElementById('sortable').rows);
							  
							  			$("#"+closeID).removeClass('hidden');
							  
							 
									}*/
					var lastId = $('.offerEntry:last').attr('id');
					$("#close"+lastId).removeClass('hidden');
						  </script>
				
              <!----- end script --->
            </div>
            <div style="padding:20px;">
            <span class="btn btn-primary add" id="addBTid" onClick="addRow()">Add Offer</span>
            <input name="offersCount" type="hidden" id="offersCount" value="<?=$x-1?>" />
			  </div>
           
          </div>
        </div>
        