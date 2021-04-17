<?php
class Note extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->library("form_validation");
	}

	/*DOCU: Get all notes Owner:Philip */
	public function get_notes(){
		$sql = "SELECT * FROM notes";
		$query = $this->db->query($sql);
		return $query->result();
	}

	/*DOCU: Get all notes Owner:Philip */
	public function get_note($id){
		$sql = "SELECT * FROM notes WHERE id = ?";
		$query = $this->db->query($sql, ($id));
		return $query->result();
	}

	/*DOCU: Deletes information on a selected note Owner:Philip */
	public function delete_info($id) {
		$sql = "UPDATE notes SET description = ''
				WHERE id = ?";
		return $this->db->query($sql, array($id));
	}

	/*DOCU: Update information on a selected note Owner:Philip */
	public function update($data) {
		$sql = "UPDATE notes 
				SET title = ?, description = ?
				WHERE id = ?";
		return $this->db->query($sql, array($data["title"],$data["description"],$data["id"]));
	}

	/*DOCU: Add a note Owner:Philip */
	public function add($data) {
		$sql = "INSERT INTO notes (title, description) 
				VALUES (?, ?)";
		return $this->db->query($sql, array($data["title"],$data["description"]));
	}

	public function validate() {
		$this->form_validation->set_rules("title", "Title", "required");
		$this->form_validation->set_rules("description", "Description", "required");
		if($this->form_validation->run() == FALSE) {
			return "error";
		}
		else {
			return "success";
		}
	}
}
