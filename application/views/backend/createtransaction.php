<div class="row" style="padding:1% 0">
<div class="col-md-12">
<div class="pull-right">
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
<section class="panel">
<header class="panel-heading">
transaction Details
</header>
<div class="panel-body">
<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createtransactionsubmit");?>' enctype= 'multipart/form-data'>
<div class="panel-body">
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">User to</label>
<div class="col-sm-4">
<?php echo form_dropdown("userto",$userto,set_value('userto'),"class='chzn-select form-control'");?>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">User From</label>
<div class="col-sm-4">
<?php echo form_dropdown("userfrom",$userfrom,set_value('userfrom'),"class='chzn-select form-control'");?>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Transaction Status</label>
<div class="col-sm-4">
<?php echo form_dropdown("transactionstatus",$transactionstatus,set_value('transactionstatus'),"class='chzn-select form-control'");?>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Reason</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="reason" value='<?php echo set_value('reason');?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Amount</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="amount" value='<?php echo set_value('amount');?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Payable Amount</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="payableamount" value='<?php echo set_value('payableamount');?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary">Save</button>
<a href="<?php echo site_url("site/viewpage"); ?>" class="btn btn-secondary">Cancel</a>
</div>
</div>
</form>
</div>
</section>
</div>
</div>
