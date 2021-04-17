<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?= base_url() ?>css/styles.css">
	<title>Notes App</title>
</head>

<body>
	<div class="wrapper">
		<header>
			<img src="<?php base_url()?>images/note.png" alt="note image"> 
			<h2>Note Taking App</h2>
		</header>
		<div class="add">
			<form class="notes-add" action="/notes/add" method="post">
				<div class="form-control">
					<input type="submit" value="Add Note">
					<label for="title">Title</label><span class="error"><?= form_error("name")?></span>
					<input type="text" name="title">
					<label for="description">Description</label><span class="error"><?= form_error("description")?></span>
					<textarea name="description"></textarea>
				</div>
			</form>
		</div>
		<div class="notes">
			<h2>Notes</h2>
			<div class="notes-container"></div>
		</div>
	</div>
	<script src="<?= base_url() ?>js/index.js"></script>
</body>

</html>