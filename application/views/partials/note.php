<div class="note box" id="<?=$note[0]->id?>">
	<form class="note-form" action="/notes/update/<?= $note[0]->id ?>" method="post">
		<div class="title">
			<input type="text" name="title" value="<?= $note[0]->title ?>">
		</div>
		<div class="body">
			<textarea name="description" contenteditable="true"><?= $note[0]->description ?></textarea>
		</div>
	</form>
	<form class="delete" action="/notes/delete/<?= $note[0]->id ?>" method="post">
		<input type="image" src="<?=base_url()?>images/trash.png" alt="Submit" width="20">
	</form>
</div>