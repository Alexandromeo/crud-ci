<?php

class Home extends CI_Controller
{
	function __construct()
	{
		error_reporting(0);
		parent::__construct();
		$this->load->model('m_crud', 'crud');
		if(empty($this->session->userdata('nim')))
			redirect('login');
	}

	public function index()
	{
		if(isset($_POST['tambah']))
		{
			$noInduk = $this->input->post('nim');
			$name = $this->input->post('nama');
			$jurusan = $this->input->post('jurusan');

			$mhs = array
					(
						'nim'=>$noInduk,
						'nama'=>$name,
						'jurusan'=>$jurusan
					);

			$insert = $this->crud->insertData("mahasiswa", $mhs);
		}

		if(isset($_POST['ubah']))
		{
			$noInduk = $this->input->post('nim');
			$name = $this->input->post('nama');
			$jurusan = $this->input->post('jurusan');

			$mhs = array
					(
						'nama'=>$name,
						'jurusan'=>$jurusan
					);

			$update = $this->crud->updateData("mahasiswa", $mhs, array('nim'=>$noInduk));
		}

		if($_GET['nim'])
		{
			if($_GET['action']=="delete")
				$delete = $this->crud->deleteData("mahasiswa", array('nim'=>$_GET['nim']));
			else if($_GET['action']=="edit")
				$data['mahasiswa'] = $this->crud->getData("*", "mahasiswa", array('nim'=>$_GET['nim']));
		}

		$data['mahasiswas'] = $this->crud->getData("*", "mahasiswa");
		$this->load->view("v_index", $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url());
	}
}