<?php


class Mahasiswa_model extends CI_Model{


	public function insertMahasiswa($data){

		$this->db->insert('data_mahasiswa', $data);
		return $this->db->affected_rows();

	}

	public function getMahasiswa($npm = null){

		if ($npm === null) {

			return $this->db->get('data_mahasiswa')->result_array();
		
		}else{

			return $this->db->get_where('data_mahasiswa', ['npm' => $npm])->result_array();
		}
		
	}

	public function updateMahasiswa($data, $npm){

		$this->db->update('data_mahasiswa', $data, ['npm' => $npm]);
		return $this->db->affected_rows();
	}

	public function deleteMahasiswa($npm){

		$this->db->delete('data_mahasiswa', ['npm' => $npm]);

		return $this->db->affected_rows();
	}
}