<script type="text/javascript">
	const addCommentForm = $('#addComment');
	const submitBtn = form.find(':submit');

	$('body').on('submit', addCommentForm, function(e) {

		e.preventDefault();
		let formData = new FormData(document.getElementById('addComment'));
		formData.append('action', 'add_comment_to_ticket');

		$.ajax({
			url: '<?php echo admin_url( 'admin-ajax.php' ) ?>',
			type: 'POST',
			contentType: false,
			processData: false,
			data: formData,
			cache: false,
			// dataType: 'json',
			beforeSend: function() {
				// Do something with this Bitch
				submitBtn.attr('disabled', true);
				submitBtn.after('<span class="processing button-medium"><i class="fa fa-spin fa-spinner"></i>Processing ...</span>');
			},
			complete: function() {
				// Do somethuing with this bitch too
				submitBtn.removeAttr('disabled');
				submitBtn.siblings('.processing').remove();
			}
		}).done(function (response) {

			$('#ticketDetails').find('.comment-wrapper').append(response);

			$('#ticketDetails').find('.new-comment-wrapper').find('form').find('textarea#comment').val('');

			setTimeout(function() { $('#ticketDetails').find('.alert').close(); }, 3000);

			/*
			if (response.status == 'true') {
				addCommentForm.trigger('reset');
				$('#backendResponse').html(response.message);
			} else {
				$('#backendResponse').html(response.message);
			}
			*/

		}).fail(function (jqXHR, textStatus, errorThrown) {
			alert('Something un-expected happened.');
			console.error('Sorry, Something Went Wrong !');
			console.warn(jqXHR);
			console.warn(textStatus);
			console.warn(errorThrown);
		});

	});
</script>
