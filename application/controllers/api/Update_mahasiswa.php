<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Update_mahasiswa extends REST_controller{

	public function __construct(){

		parent::__construct();
		$this->load->model('Mahasiswa_model','mahasiswa');
	}

		public function index_put(){

		$npm = $this->put('npm');

		$data = [

			'nama' => $this->put('nama'),
			'alamat' => $this->put('alamat'),
			'usia' => $this->put('usia')
			
		];

		if ($this->mahasiswa->updateMahasiswa($data, $npm) > 0) {
			$this->response([

			'status' => true,
			'message' => 'mahasiswa berhasil diubah'

			], REST_Controller::HTTP_OK);

		}else{

			 $this->response([
                    'status' => false,
                    'message' => 'failed to update data'
                ], REST_Controller::HTTP_BAD_REQUEST);


		}
	}
	
}
