<?php

class Login extends CI_Controller
{
	function __construct()
	{
		error_reporting(0);
		parent::__construct();
		$this->load->model('m_crud', 'crud');
	}

	public function index()
	{
		if(isset($_POST['login']))
		{
			$nim = $this->input->post("nim");
			$nama = $this->input->post("name");
			$data = array
					(
						'nim'=>$nim,
						'nama'=>$nama
					);
			$cekLogin = $this->crud->getData("*", "mahasiswa", $data);
			if(count($cekLogin)>0)
			{
				$this->session->set_userdata($data);
				redirect('home');
			}

			else
			{
				redirect('?m=Gagal login');
			}
		}

		else
			$this->load->view('v_login');
	}
}