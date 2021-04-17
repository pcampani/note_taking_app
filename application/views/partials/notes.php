<?php foreach ($notes as $note) : ?>
	<div class="note box" id="<?=$note->id?>">
		<form class="note-form" action="/notes/update/<?= $note->id ?>" method="post">
			<div class="title">
				<input type="text" name="title" value="<?= $note->title ?>">
			</div>
			<div class="body">
				<textarea  name="description" contenteditable="true"><?= $note->description ?></textarea>
			</div>
		</form>
		<form class="delete" action="/notes/delete/<?= $note->id ?>" method="post">
			<input type="image" src="<?=base_url()?>images/trash.png" alt="Submit" width="15">
		</form>
	</div>
<?php endforeach ?>