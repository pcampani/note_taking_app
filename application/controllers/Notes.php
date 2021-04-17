<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notes extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->helper("security");
		$this->load->library("form_validation");
		$this->load->model("note");
	}

	/*DOCU API endpoint for retreiving notes returns HTML. Owner:Philip */
	public function note() {
		$data["notes"] = $this->note->get_notes();
		$this->load->view('partials/notes', $data);
	}
	/*DOCU Deletes note description. Owner:Philip */
	public function delete($id) {
		$this->note->delete_info($id);
		$data["note"] = $this->note->get_note($id);
		echo $id;
	}

	/*DOCU Deletes note description. Owner:Philip */
	public function update($id) {
		$data = array(
			"id" => $id,
			"title" => $this->security->xss_clean($this->input->post("title")),
			"description" => $this->security->xss_clean($this->input->post("description"))
		);
		$this->note->update($data);
		$data["note"] = $this->note->get_note($id);
		$this->load->view('partials/note', $data);
	}

	/*DOCU Adds a note. Owner:Philip */
	public function add() {
		$confirm = $this->note->validate();
		if($confirm == "error") {
			$this->load->view(notes);
		}
		else {
			$note = array(
				"title" => $this->security->xss_clean($this->input->post("title")),
				"description" => $this->security->xss_clean($this->input->post("description"))
			);
			$this->note->add($note);
			$data["notes"] = $this->note->get_notes();
			$this->load->view('partials/notes', $data);
		}
	}

	public function index() {
		$data["notes"] = $this->note->get_notes();
		$this->load->view('home', $data);
	}
}
