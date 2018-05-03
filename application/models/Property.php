<?php
 class Property extends CI_Model{
	 public function __construct(){
		 parent::__construct();
		 $this->db = $this->load->database('default',TRUE);
	 }
	public function connection_test(){
		$this->load->database('default',TRUE);
		
	}
	public function getLoginDetails($uname){
		$query = $this->db->query("SELECT * FROM user where email = '$uname'");
		$row = $query->row_array();
		return $row;
	}

	public function getParentNames($id){
		$query = $this->db->query("SELECT * FROM user where userid != '$id'");
		$row = $query->result_array();
		return $row;
	}

	public function getParentDetails($pname){
		$query = $this->db->query("SELECT fname,lname,email,cfname,age FROM user LEFT JOIN child ON user.userid=child.userid where user.fname='$pname'");
		$row = $query->row_array();
		return $row;
	}
	public function getChildDetails($childid){
		$query = "SELECT cfname,clname,dob,sex FROM child WHERE childid='$childid'";
		$result=$this->db->query($query);  
		$row = $result->row_array();
		return $row;
	}
	public function addChildDetails($cfname,$clname,$sex,$birthdate,$userid){
		$sql = $this->db->query("INSERT INTO child (cfname, clname, dob, sex, userid) VALUES('$cfname','$clname','$birthdate','$sex','$userid')");
		$childid = $this->db->insert_id();
		return $childid;
	}

	public function registerUser($fname,$lname,$email,$age,$sex,$password){
		$sql = $this->db->query("INSERT INTO user (fname, lname, email, age, sex, password) VALUES('$fname','$lname','$email','$age','$sex','$password')");
		//$userid = $this->db->insert_id();
		//return $userid;
	}

	public function forgotPass($email,$password,$code){
		$sql = $this->db->query("INSERT INTO passwordcode (email, password,code) VALUES('$email','$password','$code')");
	}

	public function getCommonvaccines($childid){
		$query = $this->db->query("SELECT vaccinename,description,dosagedate,symptom1,symptom2,symptom3 FROM vaccine,vacc_child where childid='$childid' and vaccineid=vid");
		$row1 = $query->result_array();
		return $row1;
	}
	public function getExternalvaccines($childid){
		$query = $this->db->query("SELECT evaccname,evaccdesc,dosagedate,symptom1,symptom2,symptom3 FROM externalvacc,evacc_child where childid='$childid' and evaccid=evid");
		$row2 = $query->result_array();
		return $row2;
	}
	public function deleteSchedule($childid){
		$query3 = "delete from vacc_child where childid='$childid'";
		$sql = $this->db->query($query3);	 
		$query3 = "delete from evacc_child where childid='$childid'";
		$sql = $this->db->query($query3);	 
		$query3 = "delete from child where childid='$childid'";
		$sql = $this->db->query($query3);
		return true;
	
	}
	public function addIntVaccine($vaccname,$symptom1,$symptom2,$symptom3,$dosagedate,$childid){ 
		 //get vaccination id from vaccine table
		$query = "SELECT vaccineid FROM vaccine WHERE vaccinename='$vaccname'";
		$result=$this->db->query($query);  
		$row = $result->row_array();
		$vaccineid=$row['vaccineid'];
		//insert this info into vacc_child table
		 $query3 = "INSERT INTO vacc_child (symptom1, symptom2, symptom3, vid, dosagedate, childid) VALUES('$symptom1','$symptom2','$symptom3','$vaccineid','$dosagedate','$childid')";
		 $sql = $this->db->query($query3);
		 return true;
	
	
	}
	public function addExtVaccine($vaccname,$description,$symptom1,$symptom2,$symptom3,$dosagedate,$childid){ 
		 //insert it into the database
		 $query3 = "INSERT INTO externalvacc (evaccname, evaccdesc) VALUES('$vaccname','$description')";
		 $sql = $this->db->query($query3);
		$query = "SELECT evaccid FROM externalvacc WHERE evaccname='$vaccname'";
		$result=$this->db->query($query);  
		$row = $result->row_array();
		$vaccineid=$row['evaccid'];
			 
		//get childid similarly
		//for now let childid be 1
		//$childid=1;

		//insert this info into vacc_child table-working
		 $query3 = "INSERT INTO evacc_child (symptom1, symptom2, symptom3, evid, dosagedate, childid) VALUES('$symptom1','$symptom2','$symptom3','$vaccineid','$dosagedate','$childid')";
		 $sql = $this->db->query($query3);
		 return true;
	
	
	}
	public function deleteIntVaccines($vaccinename,$dosagedate,$symptom1,$symptom2,$symptom3,$childid){

		$result=$this->db->query("SELECT vaccineid FROM vaccine WHERE vaccinename='$vaccinename'");  
		$row = $result->row_array();
		$vaccineid=$row['vaccineid'];
		$query3 = "DELETE FROM vacc_child WHERE vid='$vaccineid' and symptom1='$symptom1' and symptom2='$symptom2' and symptom3='$symptom3' and dosagedate='$dosagedate' and childid='$childid'";
		$sql = $this->db->query($query3);
		return true;
	}
	
	public function modifyIntVaccines($vaccinename,$dosagedate,$symptom1,$symptom2,$symptom3,$childid){

		$query = "SELECT vaccineid FROM vaccine WHERE vaccinename='$vaccinename'";
		$result=$this->db->query($query);  
		$row = $result->row_array();
		$vaccineid=$row['vaccineid'];
		$query = "UPDATE vacc_child SET symptom1='$symptom1' WHERE vid='$vaccineid' and dosagedate='$dosagedate' and childid='$childid' ";
		$result=$this->db->query($query);
		$query = "UPDATE vacc_child SET symptom2='$symptom2' WHERE vid='$vaccineid' and dosagedate='$dosagedate' and childid='$childid' ";
		$result=$this->db->query($query);
		$query = "UPDATE vacc_child SET symptom3='$symptom3' WHERE vid='$vaccineid' and dosagedate='$dosagedate' and childid='$childid' ";
		$result=$this->db->query($query);
		return true;
	}
	public function deleteExtVaccines($vaccinename,$dosagedate,$symptom1,$symptom2,$symptom3,$childid){

		$query = "SELECT evaccid FROM externalvacc WHERE evaccname='$vaccinename'";
		$result=$this->db->query($query);  
		$row = $result->row_array();
		$vaccineid=$row['evaccid'];
		$query3 = "DELETE FROM evacc_child WHERE evid='$vaccineid' and symptom1='$symptom1' and symptom2='$symptom2' and symptom3='$symptom3' and dosagedate='$dosagedate' and childid='$childid'";
		$sql = $this->db->query($query3);
		return true;
	}
	public function modifyExtVaccines($vaccinename,$dosagedate,$symptom1,$symptom2,$symptom3,$childid){

		$query = "SELECT evaccid FROM externalvacc WHERE evaccname='$vaccinename'";
		$result=$this->db->query($query);  
		$row = $result->row_array();
		$vaccineid=$row['evaccid'];
		$query = "UPDATE evacc_child SET symptom1='$symptom1' WHERE evid='$vaccineid' and dosagedate='$dosagedate' and childid='$childid' ";
		$result=$this->db->query($query);
		$query = "UPDATE evacc_child SET symptom2='$symptom2' WHERE evid='$vaccineid' and dosagedate='$dosagedate' and childid='$childid' ";
		$result=$this->db->query($query);
		$query = "UPDATE evacc_child SET symptom3='$symptom3' WHERE evid='$vaccineid' and dosagedate='$dosagedate' and childid='$childid' ";
		$result=$this->db->query($query);
		return true;
	}
	 
	public function getScheduleDetails($userid){
		$query = $this->db->query("SELECT C.cfname,C.childid from child C, user U where C.userid=U.userid and U.userid='$userid'");
		$row = $query->result_array();
		return $row;
	}

	public function getVaccineDetails($childid){
	$query = $this->db->query("SELECT V.vaccinename from vaccine V, vacc_child VC where V.vaccineid=VC.vid and VC.childid='$childid'");
	$row1 = $query->result_array();
	return $row1;

	}

	public function eVaccineDetails($childid)
	{
	$query = $this->db->query("SELECT V.evaccname from externalvacc V, evacc_child VC where V.evaccid=VC.evid and VC.childid='$childid'");	
	$row2 = $query->result_array();
	return $row2;
	}
	
	public function comparesymp($vname){
		$result = $this->db->query("SELECT * FROM vaccine where vaccinename like '%".$vname."%'");
		$row = $result->result_array();
		return $row;
	}
	public function comparesymp1($vname){
		$result = $this->db->query("SELECT * FROM externalvacc where evaccname like '%".$vname."%'");
		$row = $result->result_array();
		return $row;	
	}

	public function compareResults($vaccinename,$vaccineid,$userid){
		$result = $this->db->query("SELECT C.cfname as cfname, V.vaccinename as vaccinename, VC.symptom1 as symptom1, VC.symptom2 as symptom2, VC.symptom3 as symptom3 FROM vaccine V,child C, vacc_child VC where C.childid=VC.childid and C.userid='$userid' and V.vaccineid=VC.vid  and V.vaccinename='$vaccinename'");
		$row = $result->result_array();
		return $row;
	}
	public function compareeResults($vaccinename,$vaccineid,$userid){
		$result = $this->db->query("SELECT C.cfname as cfname, V.evaccname as vaccinename, VC.symptom1 as symptom1, VC.symptom2 as symptom2, VC.symptom3 as symptom3 FROM externalvacc V,child C, evacc_child VC where C.childid=VC.childid and C.userid='$userid' and V.evaccid=VC.evid  and V.evaccname='$vaccinename'");
		$row = $result->result_array();
		return $row;
	}
	public function getCommonResults($vaccinename){
		$result = $this->db->query("select symptom
         from(
         select symptom1 as symptom, vaccineid from vacc_child, vaccine where vaccineid=vid and vaccinename='$vaccinename'
         union all
		 select symptom2 as symptom,vaccineid from vacc_child, vaccine where vaccineid=vid and vaccinename='$vaccinename'
		 union all
		 select symptom3 as symptom, vaccineid from vacc_child, vaccine where vaccineid=vid and vaccinename='$vaccinename')t
		 GROUP BY symptom
         ORDER BY COUNT(*) DESC
		 LIMIT 3");
		$row = $result->result_array();
		return $row;
	}
	
	public function getCommoneResults($vaccinename){
		$result = $this->db->query("select symptom
         from(
         select symptom1 as symptom, evaccid from evacc_child, externalvacc where evaccid=evid and evaccname='$vaccinename'
         union all
		 select symptom2 as symptom,evaccid from evacc_child, externalvacc where evaccid=evid and evaccname='$vaccinename'
		 union all
		 select symptom3 as symptom, evaccid from evacc_child, externalvacc where evaccid=evid and evaccname='$vaccinename')t
		 GROUP BY symptom
         ORDER BY COUNT(*) DESC
		 LIMIT 3");
		$row = $result->result_array();
		return $row;
	}
	public function vacccompare1($vaccinename){
		$result = $this->db->query("SELECT C.cfname as cfname, V.evaccname as vaccinename, VC.symptom1 as symptom1, VC.symptom2 as symptom2, VC.symptom3 as symptom3 FROM externalvacc V,child C, evacc_child VC where C.childid=VC.childid and C.userid='$userid' and V.evaccid=VC.evid  and V.evaccname='$vaccinename'");
		return $result;
	}
	public function deleteaccount($id){

//	$query = "SELECT childid from child where userid='$id'";
//	$result=$this->db->query($query); 
	$query = $this->db->query("SELECT childid from child where userid='$id'");
	foreach ($query->result() as $row):
          
			 $childid=$row->childid;
			 $query3 = "DELETE FROM vacc_child WHERE childid='$childid'";
             $sql = $this->db->query($query3); 
			 $query3 = "DELETE FROM evacc_child WHERE childid='$childid'";
             $sql = $this->db->query($query3); 
			 $query3 = "DELETE FROM child WHERE childid='$childid'";
             $sql = $this->db->query($query3); 
			 
			  
	      endforeach; 
		  $query3 = "DELETE FROM user WHERE userid='$id'";
             $sql = $this->db->query($query3); 
          return true;
}
	
}
?>