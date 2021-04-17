$(document).ready(function () {
	$.get("notes/note", function(data){
		$('.notes-container').html(data);
		var remove = $(".delete");
		var update = $(".note-form");
		for(let i = 0; i < remove.length; ++i) {
			remove[i].addEventListener("submit", function(e){
				e.preventDefault();
				$.post($(this).attr('action'), function(data) {
					$(`#${data} form textarea`).val("");
				  });
			})
		}
		for(let i = 0; i < update.length; ++i) {
			update[i].addEventListener("keypress", function(e){
				if (e.which == 13) {
					e.preventDefault();
					$.post($(this).attr('action'), $(this).serialize(), function(data) {
					$(this).html(data);
				  });
					return false; 
				  }
			})
		}
	});
	
	// This function adds a new note
	$(".notes-add").submit(function(e){
		e.preventDefault();
		$.post($(this).attr('action'), $(this).serialize(), function(data) {
            $('.notes-container').html(data);
			$(".notes-add input[type='text']").val("");
			$(".notes-add textarea").val("");
          });
		  return false;
	});

	
});
