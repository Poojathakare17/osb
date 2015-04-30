<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class transaction_model extends CI_Model
{
public function create($userto,$userfrom,$transactionstatus,$amount,$reason,$payableamount,$timestamp)
{
$data=array("userto" => $userto,"userfrom" => $userfrom,"transactionstatus" => $transactionstatus,"amount" => $amount,"reason" => $reason,"payableamount" => $payableamount,"timestamp" => $timestamp);
$query=$this->db->insert( "osb_transaction", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("osb_transaction")->row();
return $query;
}
function getsingletransaction($id){
$this->db->where("id",$id);
$query=$this->db->get("osb_transaction")->row();
return $query;
}
public function edit($id,$userto,$userfrom,$transactionstatus,$amount,$reason,$payableamount,$timestamp)
{
$data=array("userto" => $userto,"userfrom" => $userfrom,"transactionstatus" => $transactionstatus,"amount" => $amount,"reason" => $reason,"payableamount" => $payableamount,"timestamp" => $timestamp);
$this->db->where( "id", $id );
$query=$this->db->update( "osb_transaction", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `osb_transaction` WHERE `id`='$id'");
return $query;
}
	
}
?>
