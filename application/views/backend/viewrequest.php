<div class="row" style="padding:1% 0">
<div class="col-md-12">
<a class="btn btn-primary pull-right"  href="<?php echo site_url("site/createrequest"); ?>"><i class="icon-plus"></i>Create </a> &nbsp; 
</div>
</div>
<div class="row">
<div class="col-lg-12">
<section class="panel">
<header class="panel-heading">
Request Details
</header>
<div class="drawchintantable">
<?php $this->chintantable->createsearch("request List");?>
<table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0" >
<thead>
<tr>
<th data-field="id">ID</th>
<th data-field="userfrom">User From</th>
<th data-field="userto">User to</th>
<th data-field="requeststatus">Request Status</th>
<th data-field="amount">Amount</th>
<th data-field="reason">Reason</th>
<!--<th data-field="approvalreason">Approval Reason</th>-->
<th data-field="timestamp">Time stamp</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
<?php $this->chintantable->createpagination();?>
</div>
</section>
<script>
function drawtable(resultrow) {
	if(resultrow.requeststatus==1)
	{
	resultrow.requeststatus="Pending";
	}
	else if(resultrow.requeststatus==2)
	{
	resultrow.requeststatus="Accepted";
	}
	else if(resultrow.requeststatus==3)
	{
	resultrow.requeststatus="Rejected";
	}
return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.userfrom + "</td><td>" + resultrow.userto + "</td><td>" + resultrow.requeststatus + "</td><td>" + resultrow.amount + "</td><td>" + resultrow.reason + "</td><td>" + resultrow.timestamp + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editrequest?id=');?>"+resultrow.id+"'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deleterequest?id='); ?>"+resultrow.id+"'><i class='icon-trash '></i></a></td></tr>";
}
generatejquery("<?php echo $base_url;?>");
</script>
</div>
</div>
