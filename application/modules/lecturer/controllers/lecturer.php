<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lecturer extends MX_Controller
{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('m_lecturers');
    }

	function index()
	{
		$data = array();
		$data['nyangundi'] = "This is an attempt yo";
		$data['notification_1'] = "This is the first notification";
		$data['notification_2'] = "This is the second notification";
		$data['notification_3'] = "This is the third notification";
		$data['notification_4'] = "This is the fourth notification";
		$data['notification_4'] = "This is the fourth notification";
		$data['notification_5'] = "This is the fifth notification";

		$data['messages_no'] = 35;
		$lecturer_id = $this->session->userdata('username');
		$msg_no = $this->m_lecturers->get_messages_no('lecturer_messages',$lecturer_id);
		$msg_data = $this->m_lecturers->get_messages('lecturer_messages',$lecturer_id);

		$total_students= $this->m_lecturers->total_students();
		$data['total_students'] = $total_students[0]['total_students'];


		$this->load->view('lec_home.php',$data);
	}
	function page_to_load($selection = null){
		if ($selection == "messages") {
			$this ->load->view('message.php');
		}elseif ($selection == "charts") {
			$this ->load->view('charts.php');
		}elseif ($selection == "tasks") {
			$this ->load->view('task.php');
		}elseif ($selection == "forms") {
			$this ->load->view('form.php');
		}elseif ($selection == "activity") {
			$this ->load->view('activity.php');
		}
	}
	function messages(){
		$lecturer_id = $this->session->userdata('username');
		$message = $_POST['msg'];
		$subject = $_POST['sbj'];
		$unit = $this->session->userdata('unit_code');
		
		$response = $this->m_lecturers->lecturer_messages($lecturer_id,$subject,$message,$unit,'students');
		echo $response;
	}
	function tester(){
		$jibu = $this->m_lecturers->get_messages_no('lecturer_messages','students');
		$jibu_ = $this->m_lecturers->get_messages('lecturer_messages','students');

		echo "<pre>";print_r($jibu);echo "</pre></br>";
		echo "<pre>";print_r($jibu_);echo "</pre>";
	}
}