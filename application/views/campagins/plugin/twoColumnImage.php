<div class="panel panel-default">
          <div class="panel-heading">
          <div class="row">
            <div class="col-sm-11 panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#statOffers"> Partner Info </a></div>
            
          </div>
          </div>
          <div id="statOffers" class="panel-collapse collapse">
            <div class="panel-body">
              <!---------table------->
              
                
                <?php
				if ($offers!=NULL){
				$infos = explode("|",$offers);
				}
				  	for ($x=0; $x<=0; $x++) {						
						if (isset($infos[$x]) && $infos[$x]!=NULL){
						$info = explode("##",$infos[$x]);
						}
						else{
							$info[0]=NULL;$info[1]=NULL;
							}
						?>
                    
                    <div class="col-md-6">
                      <div class="offerEntry">
                     
                     <?php 
					 echo '<script language="JavaScript"> tinymce.init({selector:"#offertext_'.$x.'",
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
			
                     	if ($info[1]!=NULL){
					echo '<img src="http://enews.airmilesme.com/am/img/'.$info[1].'.jpg" width="240" style="display:block;-ms-interpolation-mode:bicubic;outline:none;height:auto;border:none;" border="0" id="myImg" /><br />';
					echo '<input name="offerimage'.$x.'" type="hidden" id="offerimage'.$x.'" value="'.$info[1].'" />';
					echo '<input name="offerimage'.$x.'" id="offerimage'.$x.'" type="file" />';
			} 
					else {
      					echo '<input name="offerimage'.$x.'" id="offerimage'.$x.'" type="file" />';
                      } ?>
                        <textarea name="offertext_<?=$x?>" id="offertext_<?=$x?>" cols="" rows="" class="form-control offerCopy" placeholder="Offer Copy"><?=$info[0]?></textarea>
                        
                       
                       
                        </div>
                    </div>
					
                <?php 
				
								
				} ?>
              
              <!---------end table ------>
            </div>
          </div>
        </div>