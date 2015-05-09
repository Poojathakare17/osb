<div class="row" style="padding:1% 0">
	<div class="col-md-12">
		<div class="pull-right">
			<a href="<?php echo site_url('site/viewusers'); ?>" class="btn btn-primary pull-right"><i class="icon-long-arrow-left"></i>&nbsp;Back</a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
	    <section class="panel">
		    <header class="panel-heading">
				 User Details
			</header>
			<div class="panel-body">
			  <form class="form-horizontal tasi-form" method="post" action="<?php echo site_url('site/createusersubmit');?>" enctype= "multipart/form-data">
				<div class="form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Name</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="name" value="<?php echo set_value('name');?>">
				  </div>
				</div>
<!--
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Username</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="username" value="<?php echo set_value('username');?>">
				  </div>
				</div>
-->
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Email</label>
				  <div class="col-sm-4">
					<input type="email" id="normal-field" class="form-control" name="email" value="<?php echo set_value('email');?>">
				  </div>
				</div>
<!--
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="description-field">Password</label>
				  <div class="col-sm-4">
					<input type="password" id="description-field" class="form-control" name="password" value="">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="description-field">Confirm Password</label>
				  <div class="col-sm-4">
					<input type="password" id="description-field" class="form-control" name="confirmpassword" value="">
				  </div>
				</div>
-->
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">SocialId</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="socialid" value="<?php echo set_value('socialid');?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">logintype</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('logintype',$logintype,set_value('logintype'),'class="chzn-select form-control" 	data-placeholder="Choose a Logintype..."');
					?>
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">Status</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('status',$status,set_value('status'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Image</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image');?>">
				  </div>
				</div>
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label">Select Accesslevel</label>
				  <div class="col-sm-4">
					<?php 	 echo form_dropdown('accesslevel',$accesslevel,set_value('accesslevel'),'id="accesslevelid" onchange="operatorcategories()" class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
				
<!--
				<div class=" form-group categoryclass" style="display:none;">
				  <label class="col-sm-2 control-label">Category</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('category[]',$category,set_value('category'),'id="select10" class="chzn-select form-control" 	data-placeholder="Choose a category..." multiple');
					?>
				  </div>
				</div>
-->
				
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">json</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="json" value="<?php echo set_value('json');?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Shopname</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shopname" value="<?php echo set_value('shopname');?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Membership no</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="membershipno" value="<?php echo set_value('membershipno');?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Address</label>
				  <div class="col-sm-4">
					<textarea rows="4" cols="50" id="normal-field" class="form-control" name="address" value="<?php echo set_value('address');?>"></textarea>
				  </div>
				</div>
					<div class=" form-group">
				  <label class="col-sm-2 control-label">Area</label>
				  <div class="col-sm-4">
					<?php
						
						echo form_dropdown('area',$area,set_value('area'),'class="chzn-select form-control" 	data-placeholder="Choose a Accesslevel..."');
					?>
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Description</label>
				  <div class="col-sm-4">
					<textarea rows="4" cols="50" id="normal-field" class="form-control" name="description" value="<?php echo set_value('description');?>"></textarea>
				  </div>
				</div>
<!--
				<textarea rows="4" cols="50">
At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies. 
</textarea>
-->
					<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Website</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="website" value="<?php echo set_value('website');?>">
				  </div>
				</div>
					<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Shop contact1</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shopcontact1" value="<?php echo set_value('shopcontact1');?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Shop contact2</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="shopcontact2" value="<?php echo set_value('shopcontact2');?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Shop Email</label>
				  <div class="col-sm-4">
					<input type="email" id="normal-field" class="form-control" name="shopemail" value="<?php echo set_value('shopemail');?>">
				  </div>
				</div>
					<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Purchase Balance</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="purchasebalance" value="<?php echo set_value('purchasebalance');?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Sales Balance</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="salesbalance" value="<?php echo set_value('salesbalance');?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Shop Logo</label>
				  <div class="col-sm-4">
					<input type="file" id="normal-field" class="form-control" name="shoplogo" value="<?php echo set_value('shoplogo');?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label" for="normal-field">Percent Payment</label>
				  <div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="percentpayment" value="<?php echo set_value('percentpayment');?>">
				  </div>
				</div>
				<div class=" form-group">
				  <label class="col-sm-2 control-label">&nbsp;</label>
				  <div class="col-sm-4">
				  <button type="submit" class="btn btn-primary">Save</button>
				  <a href="<?php echo site_url('site/viewusers'); ?>" class="btn btn-secondary">Cancel</a>
				</div>
				</div>
			  </form>
			</div>
		</section>
	</div>
</div>
<script type="text/javascript">
    function operatorcategories() {
        console.log($('#accesslevelid').val());
        if($('#accesslevelid').val()==2)
        {
            $( ".categoryclass" ).show();
        }
       
        else
        {
            $( ".categoryclass" ).hide();
        }
       
    }
</script>