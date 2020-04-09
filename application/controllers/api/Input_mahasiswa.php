<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Input_mahasiswa extends REST_controller{

	public function __construct(){

		parent::__construct();
		$this->load->model('Mahasiswa_model','mahasiswa');
	}

	public function index_post(){

		$data = [
			
			'NPM' => $this->post('npm'),
			'NAMA' => $this->post('nama')

		];


		if ($this->mahasiswa->insertMahasiswa($data) > 0) {
			$this->response([

			'status' => true,
			'message' => 'Input mahasiswa berhasil'

			], REST_Controller::HTTP_CREATED);

		}else{

			 $this->response([
                    'status' => false,
                    'message' => 'Input mahasiswa gagal'
                ], REST_Controller::HTTP_BAD_REQUEST);


		}
	}
}
