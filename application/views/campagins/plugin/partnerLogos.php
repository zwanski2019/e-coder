<div class="panel panel-default">
    <div class="panel-heading">
     <div class="row">
      <div class="col-sm-8 panel-title">
       
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
          Partner Selection
        </a>
		  
      </div>
		<div class="col-sm-4 checkbox">
  <label class="pull-right"><input name="partnerEnable" type="checkbox" value="Y" <?php 
	  echo (isset($htmlConfig[0]->partners) && $htmlConfig[0]->partners == 'Y') ? 'checked' :'';
	  ?>>Enable </label>
</div>
		</div>
    </div>
    <div id="collapse4" class="panel-collapse collapse">
          
          
          <div class="panel-body">
            
            
            
            <div class="col-sm-12">
            <div class="row">
            	<div class="col-sm-3">
                	<div><img src="http://enews.airmilesme.com.s3.amazonaws.com/am/logos/all/<?=$partner1?>.jpg" width="100" height="38" style="display:block;" hspace="1" /></div>
                    <div><input name="pt1" type="text" id="pt1" placeholder="Partner 1" class="form-control"/><input name="partner1" type="hidden" id="partner1" value="<?=$partner1?>"/></div>
                    </div>
                <div class="col-sm-3">
                	<div><img src="http://enews.airmilesme.com.s3.amazonaws.com/am/logos/all/<?=$partner2?>.jpg" width="100" height="38" style="display:block;" hspace="1" /></div>
                	<div><input name="pt2" type="text" id="pt2" placeholder="Partner 2" class="form-control"/><input name="partner2" type="hidden" id="partner2" value="<?=$partner2?>"/></div>
                </div>
                <div class="col-sm-3">
	                <div><img src="http://enews.airmilesme.com.s3.amazonaws.com/am/logos/all/<?=$partner3?>.jpg" width="100" height="38" style="display:block;" hspace="1" /></div>
	                <div><input name="pt3" type="text" id="pt3" placeholder="Partner 3" class="form-control"/><input name="partner3" type="hidden" id="partner3" value="<?=$partner3?>"/></div>
                </div>
                <div class="col-sm-3">
                	<div><img src="http://enews.airmilesme.com.s3.amazonaws.com/am/logos/all/<?=$partner4?>.jpg" width="100" height="38" style="display:block;" hspace="1" /></div>
                	<div><input name="pt4" type="text" id="pt4" placeholder="Partner 4" class="form-control"/><input name="partner4" type="hidden" id="partner4" value="<?=$partner4?>"/></div>
                </div>
            </div>
            </div>
            
            <div class="col-sm-12" id="prt8">
            <div class="row">
            	<div class="col-sm-3">
                <div><img src="http://enews.airmilesme.com.s3.amazonaws.com/am/logos/all/<?=$partner5?>.jpg" width="100" height="38" style="display:block;" hspace="1" /></div>
                <div><input name="pt5" type="text" id="pt5" placeholder="Partner 5" class="form-control"/><input name="partner5" type="hidden" id="partner5" value="<?=$partner5?>"/></div>
                </div>
                <div class="col-sm-3">
                <div><img src="http://enews.airmilesme.com.s3.amazonaws.com/am/logos/all/<?=$partner6?>.jpg" width="100" height="38" style="display:block;" hspace="1" /></div>
                <div><input name="pt6" type="text" id="pt6" placeholder="Partner 6" class="form-control"/><input name="partner6" type="hidden" id="partner6" value="<?=$partner6?>"/></div>
                </div>
                <div class="col-sm-3">
                <div><img src="http://enews.airmilesme.com.s3.amazonaws.com/am/logos/all/<?=$partner7?>.jpg" width="100" height="38" style="display:block;" hspace="1" /></div>
                <div><input name="pt7" type="text" id="pt7" placeholder="Partner 7" class="form-control"/><input name="partner7" type="hidden" id="partner7" value="<?=$partner7?>"/></div>
                </div>
                <div class="col-sm-3">
                <div><img src="http://enews.airmilesme.com.s3.amazonaws.com/am/logos/all/<?=$partner8?>.jpg" width="100" height="38" style="display:block;" hspace="1" /></div>
                <div><input name="pt8" type="text" id="pt8" placeholder="Partner 8" class="form-control"/><input name="partner8" type="hidden" id="partner8" value="<?=$partner8?>"/></div>
                </div>
            </div>
            </div>
              
            </div>
          
          
      </div>
    </div>