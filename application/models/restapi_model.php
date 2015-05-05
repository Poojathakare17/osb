<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class restapi_model extends CI_Model
{	
    public function home($user)
    {
        $query['userdetails']=$this->db->query("SELECT `id`,`name`,`password`,`email`,`accesslevel`,`timestamp`,`status`,`image`,`username`,`socialid`,`logintype`,`json`,`shopname`,`membershipno`,`address`,`description`,`website`,`shopcontact1`,`shopcontact2`,`shopemail`,`purchasebalance`,`salesbalance` FROM `user` WHERE `id`='$user'")->row();
	
//		find shops
		 $query['area']=$this->db->query("SELECT `name`,`id` FROM `osb_area`")->result();
		$query['category']=$this->db->query("SELECT `name`,`id` FROM `osb_category`")->result();
		
		
		return $query;
    }
  public function searchresult($area,$category,$membershipno){
  $query['searchresult']=$this->db->query("SELECT `user`.`id`,`user`.`shopname` as `name`,`user`.`salesbalance` as `sellbalance` FROM `user` LEFT OUTER JOIN `usercategory` ON `usercategory`.`user`=`user`.`id` LEFT OUTER JOIN `osb_category` ON `osb_category`.`id`=`usercategory`.`category` WHERE `user`.`area`='$area' AND `usercategory`.`category`='$category' OR `user`.`membershipno`='$membershipno'")->result();
	  return $query;
  }
//	 public function searchresult1($membershipno){
//  $query['searchresult1']=$this->db->query("SELECT `shopname`,`salesbalance` FROM `user` WHERE `membershipno`='$membershipno'")->row();
//	  return $query;
//  }
  public function shopprofile($user){
  $query['shopprofile']=$this->db->query("SELECT `user`.`purchasebalance`, `user`.`id`,`user`.`shopname`,`user`.`address`,`user`.`description`,`user`.`website`,`user`.`shopcontact1`,`user`.`shopcontact2`,`user`.`shopemail`,`user`.`area`,`osb_area`.`name` as `area`,`osb_shopphoto`.`photo` as `shopphoto`,`osb_shopproductphoto`.`photo` as `productphoto`,`osb_category`.`name` as `category` FROM `user` LEFT OUTER JOIN `osb_shopphoto` ON `osb_shopphoto`.`user`=`user`.`id` LEFT OUTER JOIN `osb_shopproductphoto` ON `osb_shopproductphoto`.`user`=`user`.`id` LEFT OUTER JOIN `usercategory` ON `usercategory`.`user`=`user`.`id` LEFT OUTER JOIN `osb_area` ON `osb_area`.`id`=`user`.`area` LEFT OUTER JOIN `osb_category` ON `osb_category`.`id`=`usercategory`.`category` WHERE `user`.`id`='$user'")->result();
	  return $query;
  }
 public function yourbalance($user){
$query['yourbalance']=$this->db->query("SELECT `purchasebalance`,`salesbalance` FROM `user` WHERE `id`='$user'")->result();
	  return $query;
  }	
 public function addbalance($user,$amount){
	 
	 $data=array("userfrom" => $user,"userto" => 1,"amount" => $amount,"requeststatus" => 1);
$query=$this->db->insert( "osb_request", $data );
$id=$this->db->insert_id();
	 
if(!$query)
return  0;
else
return  $id;
  }
	   public function transaction($user)
    {
        $query['purchased']=$this->db->query("SELECT `user`.`shopname`,`osb_transaction`.`amount`,DATE(`osb_transaction`.`timestamp`) AS `date` FROM `user` LEFT OUTER JOIN `osb_transaction` ON `osb_transaction`.`userto`=`user`.`id` WHERE `user`.`id`='$user'")->result();
		 $query['sales']=$this->db->query("SELECT `user`.`shopname`,`osb_transaction`.`amount`,DATE(`osb_transaction`.`timestamp`) AS `date` FROM `user` LEFT OUTER JOIN `osb_transaction` ON `osb_transaction`.`userfrom`=`user`.`id` WHERE `user`.`id`='$user'")->result();
		$query['admin']=$this->db->query("SELECT `osb_transaction`.`amount`,DATE(`osb_transaction`.`timestamp`) AS `date` FROM `user` LEFT OUTER JOIN `osb_transaction` ON `osb_transaction`.`userfrom`=`user`.`id` WHERE `user`.`accesslevel`='1' AND `user`.`id`='$user'")->result();
		return $query;
    }
	   public function sellingapproval($user)
    {
        $query['sellingapproval']=$this->db->query("SELECT `user`.`shopname`,`user`.`id`,`osb_request`.`amount` FROM `user` LEFT OUTER JOIN `osb_request` ON `osb_request`.`userfrom`=`user`.`id` WHERE `user`.`id`='$user'")->row();
		return $query;
		
    }
	 public function accepted($user,$amount)
    {
        $data=array("userfrom" => $user,"amount" => $amount);
$query=$this->db->insert( "osb_transaction", $data );
$id=$this->db->insert_id();
		 if(!$query)
         return  0;
		 else
		return  $id;
    }
		 public function decline($id)
    {
       $data = array(
               'requeststatus' => 3
            );

$this->db->where('userfrom', $id);
$this->db->update('osb_request', $data);
    }

	public function changepassword($id,$oldpassword,$newpassword,$confirmpassword){
		 $oldpassword=md5($oldpassword);
        $newpassword=md5($newpassword);
        $confirmpassword=md5($confirmpassword);
			
			if($newpassword==$confirmpassword){
        $useridquery=$this->db->query("SELECT `id` FROM `user` WHERE `password`='$oldpassword'");
        if($useridquery->num_rows()==0)
        {
            return 0;
        }
        else
        {
            $query=$useridquery->row();
            $userid=$query->id;
            $updatequery=$this->db->query("UPDATE `user` SET `password`='$newpassword' WHERE `id`='$userid'");
            return 1;
        }
			}
			else{
			echo "New password and old password do not match!!!";
			}
	 }
	public function getareacategory($area,$category){
	 $query['area']=$this->db->query("SELECT `name` FROM `osb_area` WHERE `id`='$area'")->row();
		$query['category']=$this->db->query("SELECT `name` FROM `osb_category` WHERE `id`='$category'")->row();
		return $query;
	}
	public function purchaserequest($userfrom,$userto,$amount){
	 $data=array("userfrom" => $userfrom,"userto" => $userto,"amount" => $amount,"requeststatus" => 1);
$query=$this->db->insert( "osb_request", $data );
$id=$this->db->insert_id();
		 if(!$query)
         return  0;
		 else
		return  $id;
	}
	public function updateprofile($id,$shopname,$area,$address,$description,$shopcontact1,$shopcontact2,$shopemail,$website){
	 $query=$this->db->query("UPDATE `user` SET `shopname`='$shopname',`area`='$area',`address`='$address',`description`='$description',`shopcontact1`='$shopcontact1',`shopcontact2`='$shopcontact2',`shopemail`='$shopemail',`website`='$website' WHERE `id`='$id'");
	}

}
?>