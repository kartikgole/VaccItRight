<?php

class Pages extends CI_Controller {
	public function index(){
		$this->load->view("pages/layouts/siteheader_blogin");
		$this->load->view("pages/home");
	}
	public function faq(){
		$this->load->view("pages/layouts/siteheader_blogin");
		$this->load->view("pages/faqpage");
	}
	public function about(){
		$this->load->view("pages/layouts/siteheader_blogin");
		$this->load->view("pages/about");
	}
	public function location(){
		$this->load->view("pages/layouts/siteheader_blogin");
		$this->load->view("pages/location");
	}
	public function feedback(){
		$this->load->view("pages/layouts/siteheader_blogin");
		$this->load->view("pages/feedback");
	} 
	public function login(){
		$data['msg'] = '';
		$this->load->view("pages/layouts/siteheader_blogin");
		$this->load->view("pages/login",$data);
	}
	public function register(){
		$this->load->library('form_validation');
		$this->load->view("pages/layouts/siteheader_blogin");
		$this->load->view("pages/register");
	}
	public function comparepageopen(){
		$this->load->library('session');
		$datauid['session_user']= $this->session->userdata('userid');
		$this->load->view("pages/layouts/siteheader_alogin");
		$this->load->view("pages/comparesymptoms",$datauid);
	}
	public function loginaction(){
		
		/* $this->db->Property->getLoginDetails($uname); */
		if('_POST'){
			$uname = $this->input->post('uname');
			$pass = $this->input->post('pass');
			if($uname =='' || $pass ==''){
				$data['msg'] = 'please enter the details';
				$this->load->view("pages/layouts/siteheader_blogin");
				$this->load->view("pages/login",$data);
			}
			else{
				$this->load->model('Property');
				$logindetails = $this->Property->getLoginDetails($uname);
				json_encode($logindetails);
				if($pass != $logindetails['password']){
					$data['msg'] = 'Password is Incorrect';
					$this->load->view("pages/layouts/siteheader_blogin");
					$this->load->view("pages/login",$data);	
				}else{
					$this->load->library('session');
					$this->session->set_userdata('userid', $logindetails['userid']);
					if(($logindetails['userid'])==1){
						redirect('index.php/Pages/adminHome', 'refresh');
					}
					else{
						redirect('index.php/Pages/loginHome', 'refresh');
					}
				}

			}
		}
		else{
			echo "Access Denied";exit;
		}
	}
	
	public function printSchedule(){
		$this->load->library('session');
		$this->load->model('Property');
		$data['childDetails'] =  $this->Property->getChildDetails($this->session->userdata('childid'));
		$data['intVaccines'] = $this->Property->getCommonVaccines($this->session->userdata('childid'));
		$data['extVaccines'] = $this->Property->getExternalVaccines($this->session->userdata('childid'));
		$this->load->view("pages/layouts/siteheader_alogin");
		$this->load->view("pages/printschedule",$data);

	}
	
	public function viewSchedules(){
		$this->load->library('session');
		$data['session_user']= $this->session->userdata('userid');
		$this->load->view("pages/layouts/siteheader_alogin",$data);
		$this->load->view("pages/parentlogin",$data);
		// just for test redirect('index.php/Pages/loginHome', 'refresh');
	}
	
	public function addnewschedule(){
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cfname', 'First Name', 'required|alpha');
		$this->form_validation->set_rules('clname', 'Last Name', 'required|alpha');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->helper('url');
			$data['msg']='set error';
			$this->load->view("pages/layouts/siteheader_alogin");
			$this->load->view("pages/group_childschedule",$data);		
		}
		else
		{
			$cfname = $this->input->post('cfname');
			$clname = $this->input->post('clname');
			$sex = $this->input->post('sex');
			$birthdate = $this->input->post('birthdate');
			$userid = $this->session->userdata('userid');
			$this->load->model('Property');
			$childid = $this->Property->addChildDetails($cfname,$clname,$sex,$birthdate,$userid);
			$this->session->set_userdata('childid',  $childid);
			redirect('index.php/Pages/childVaccineAdd', 'refresh');
		}
	}
	
	public function viewInfo(){
		$this->load->library('session');
		$this->load->view("pages/layouts/siteheader_alogin");
		$this->load->view("pages/sche");
		
	}
	public function goToEdit(){
		
		$this->load->library('session');
		$this->load->model('Property');
		$childid = $this->input->post('dfchildid');
		$data['intVaccines'] = $this->Property->getCommonVaccines($childid);
		$data['extVaccines'] = $this->Property->getExternalVaccines($childid);
		$this->load->view("pages/layouts/siteheader_alogin");
		$this->load->view("pages/addnewschedule",$data);
	
	}
	public function childVaccineAdd(){
		
		$this->load->library('session');
		$this->load->model('Property');
		$data['intVaccines'] = $this->Property->getCommonVaccines($this->session->userdata('childid'));
		$data['extVaccines'] = $this->Property->getExternalVaccines($this->session->userdata('childid'));
		$this->load->view("pages/layouts/siteheader_alogin");
		$this->load->view("pages/addnewschedule",$data);
	}
	
	public function deleteSchedule(){
		$this->load->library('session');
		$this->load->model('Property');
		$result = $this->Property->deleteSchedule($this->session->userdata('childid'));
		redirect('index.php/Pages/loginHome', 'refresh');
	}
	
	public function addIntVaccine(){
		$this->load->library('session');
		$this->load->model('Property');
		$vaccname=$this->input->post('vname');
		$symptom1=$this->input->post('symptom1');
		$symptom2=$this->input->post('symptom2');
		$symptom3=$this->input->post('symptom3');
		$dosagedate = $this->input->post('dosagedate');
		$result = $this->Property->addIntVaccine($vaccname,$symptom1,$symptom2,$symptom3,$dosagedate,$this->session->userdata('childid'));
		redirect('index.php/Pages/childVaccineAdd', 'refresh');
	}
	public function addExtVaccine(){
		$this->load->library('session');
		$this->load->model('Property');
		$vaccname=$this->input->post('evaccname');
		$symptom1=$this->input->post('esymptom1');
		$symptom2=$this->input->post('esymptom2');
		$symptom3=$this->input->post('esymptom3');
		$description=$this->input->post('evaccdesc');
		$dosagedate = $this->input->post('edosagedate');
		$result = $this->Property->addExtVaccine($vaccname,$description,$symptom1,$symptom2,$symptom3,$dosagedate,$this->session->userdata('childid'));
		redirect('index.php/Pages/childVaccineAdd', 'refresh');
	}
	
	public function changeIntVaccines(){
		$this->load->library('session');
		$this->load->model('Property');
		$formSubmit = $this->input->post('changevaccine');
		$vaccinename=$this->input->post('vaccinename');
		$dosagedate=$this->input->post('dosagedate');
		$symptom1=$this->input->post('symptom1');
		$symptom2=$this->input->post('symptom2');
		$symptom3=$this->input->post('symptom3');
//if delete vaccine is selected
		if ($formSubmit == 'DELETE' ) 
		{
			$result = $this->Property->deleteIntVaccines($vaccinename,$dosagedate,$symptom1,$symptom2,$symptom3,$this->session->userdata('childid'));
			redirect('index.php/Pages/childVaccineAdd', 'refresh');
		}	 
//if modify vaccine is selected
		if ( $formSubmit == 'MODIFY' ) 
		{
			$result = $this->Property->modifyIntVaccines($vaccinename,$dosagedate,$symptom1,$symptom2,$symptom3,$this->session->userdata('childid'));
			redirect('index.php/Pages/childVaccineAdd', 'refresh');
		}	
	}
	
	public function changeExtVaccines(){
		$this->load->library('session');
		$this->load->model('Property');
		$formSubmit = $this->input->post('changeevaccine');
		$vaccinename=$this->input->post('evaccinename');
		$dosagedate=$this->input->post('edosagedate');
		$symptom1=$this->input->post('esymptom1');
		$symptom2=$this->input->post('esymptom2');
		$symptom3=$this->input->post('esymptom3');
//if delete vaccine is selected
		if ($formSubmit == 'DELETE' ) 
		{
			$result = $this->Property->deleteExtVaccines($vaccinename,$dosagedate,$symptom1,$symptom2,$symptom3,$this->session->userdata('childid'));
			redirect('index.php/Pages/childVaccineAdd', 'refresh');
		}	 
//if modify vaccine is selected
		if ( $formSubmit == 'MODIFY' ) 
		{
			$result = $this->Property->modifyExtVaccines($vaccinename,$dosagedate,$symptom1,$symptom2,$symptom3,$this->session->userdata('childid'));
			redirect('index.php/Pages/childVaccineAdd', 'refresh');
		}	
	}
	
	public function loginHome(){
		$this->load->library('session');
		$data['session_user']= $this->session->userdata('userid');
		$this->load->view("pages/layouts/siteheader_alogin",$data);
		$this->load->view("pages/group_childschedule",$data);
	}
	public function adminHome(){
		$this->load->library('session');
		$data['session_user']= $this->session->userdata('userid');
		$this->load->model('Property');
		$data['parent']=$this->Property->getParentNames($data['session_user']);
		$this->load->view("pages/layouts/siteheader_admin",$data);
		$this->load->view("pages/admin.php",$data);
	}

	public function sitemap(){

		$this->load->view("pages/sitemap");

	}

	public function getParentDetails(){
		$this->load->library('session');
		$pname= $this->input->post('pname');
		$this->load->model("Property");
		$data=$this->Property->getParentDetails($pname);
		$this->load->view("pages/layouts/siteheader_admin",$data);
		$this->load->view("pages/parent.php",$data);
	}

	public function registration(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fname', 'First Name', 'required|alpha');
		$this->form_validation->set_rules('lname', 'Last Name', 'required|alpha');
		$this->form_validation->set_rules('age', 'Age', 'numeric');
		$this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
		$this->form_validation->set_rules('pass', 'Password', 'required');
		$this->form_validation->set_rules('cpass', 'Password Confirmation', 'required|matches[pass]');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->helper('url');
			$this->load->view("pages/layouts/siteheader_blogin");
			$data['message']='';
			$this->load->view("pages/register.php",$data);	
		}
		else
		{
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$sex = $this->input->post('sex');
			$age = $this->input->post('age');
			$email = $this->input->post('email');
			$password = $this->input->post('pass');
			$this->load->model('Property');
			$result = $this->Property->getLoginDetails($email);
			if($result==''){
				$result = $this->Property->registerUser($fname,$lname,$email,$age,$sex,$password);
				$this->load->view("pages/layouts/siteheader_blogin");
				$data['message']='Registration Succesfull,please login to continue...';
				$this->load->view("pages/register.php",$data);
			}
			else{
				$this->load->helper('url');
				$this->load->view("pages/layouts/siteheader_blogin");
				$data['message']='Email already exists';
				$this->load->view("pages/register.php",$data);	
			}
			
		}
		//redirect('index.php/Pages/register', 'refresh');
	}

	public function forgotPassword(){
		$email=$this->input->post('email');
		echo $email;
		$this->load->model('Property');
		$result=$this->Property->getLoginDetails($email);
		if($result ==''){
			$data['msg'] = 'Email doesnt exist';
			$this->load->view("pages/layouts/siteheader_blogin");
			$this->load->view("pages/login",$data);
		}

		else{
			$alphaLength = strlen($result['password']) - 1; //put the length -1 in cache
			for ($i = 0; $i < 8; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $result['password'][$n];
			}
			$code=implode($pass);
			$this->load->model('Property');
			$this->Property->forgotPassword($pass);
			require 'PHPMailerAutoload.php';
			$mail = new PHPMailer;
// SMTP configuration
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'sakshyaraghavan@gmail.com';
			$mail->Password = 'incorrect@0';
			$mail->SMTPSecure = 'tls';
			$mail->Port = 587;

			$mail->setFrom('no-reply-email@vaccitright.com', 'VaccitRight');
			$mail->addReplyTo('no-reply-email@vaccitright.com', 'Vaccitright');

// Add a recipient
			$mail->addAddress($email);

// Add cc or bcc 

// Email subject
			$mail->Subject = 'Password Reset Code';

// Set email format to HTML
			$mail->isHTML(true);

// Email body content
			$mailContent = "<h1>Reset Code</h1>
			<p>Your password reset code is :</p>
			<p><b>".$code."</b></p>
			<p>Thanks,</p>
			<p>Vaccitright team</p>
			";

			$mail->Body = $mailContent;
		}
	}

	public function db_test(){
		$this->load->model("Property");
		$this->Property->connection_test();
	}
	public function compareSymptoms(){
		$this->load->library('session');
		$vaccinename = $this->input->post('vaccinename');
		$vaccineid=$this->input->post('vaccineid');
		$data['vaccinename'] = $vaccinename;
		$this->load->model("Property");
		$data['compareResults'] = $this->Property->compareResults($vaccinename,$vaccineid,$this->session->userdata('userid'));
		$data['commonResults']  = $this->Property->getCommonResults($vaccinename);
		$this->load->view("pages/layouts/siteheader_alogin");
		$this->load->view("pages/comparesymptoms",$data);


	}
	public function compareeSymptoms(){
		$this->load->library('session');
		$vaccinename = $this->input->post('vaccinename');
		$vaccineid=$this->input->post('vaccineid');
		$data['vaccinename'] = $vaccinename;
		$this->load->model("Property");
		$data['compareResults'] = $this->Property->compareeResults($vaccinename,$vaccineid,$this->session->userdata('userid'));
		$data['commoneResults']  = $this->Property->getCommoneResults($vaccinename);
		$this->load->view("pages/layouts/siteheader_alogin");
		$this->load->view("pages/comparesymptoms",$data);


	}

	public function compare()
	{

		/* $this->db->Property->getLoginDetails($uname); */
		if('_POST'){
			$this->load->library('session');
			$this->load->model('Property');
			$userid = $this->session->userdata('userid');
			$uname = $this->input->post('vname');
			if($uname ==''){
				$this->load->view("pages/layouts/siteheader_alogin");
				$this->load->view("pages/comparesymptoms");
			}
			else {
				$this->load->model('Property');
				
				$data['symptomdetails'] = $this->Property->comparesymp($uname);
				$data['symptomdetails1'] = $this->Property->comparesymp1($uname);
				
				$this->load->view("pages/layouts/siteheader_alogin");
				//echo $data['symptomdetails'];
				$this->load->view("pages/comparesymptoms",$data);

			}
		}
	}
	public function deleteaccount(){
		$this->load->library('session');
		$data['session_user']= $this->session->userdata('userid');
		$this->load->model('Property');
		$this->Property->deleteaccount($data['session_user']);
		//$this->load->view("pages/layouts/siteheader_blogin");
		//$this->load->view("pages/home");
		$this->session->sess_destroy();
		redirect('index.php/Pages/login', 'refresh');
	}
	public function resetPassword1()
	{

$this->load->view("pages/layouts/siteheader_blogin");
$this->load->view("pages/resetpassword1");
	}
	public function resetPassword2()
	{

$this->load->view("pages/layouts/siteheader_blogin");
$this->load->view("pages/resetpassword2");
	}

	public function logout()
	{
		$this->load->library('session');
		$this->session->sess_destroy();
		redirect('index.php/Pages/login', 'refresh');
	}

}
?>