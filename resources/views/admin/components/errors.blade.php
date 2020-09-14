@if ($errors->any())
	<div class="message alert" data-closable>
		<p>There were errors with your entry: {!! rtrim(implode('', $errors->all(':message '))) !!}</p>
		<button class="close-button" data-close>&times;</button>
	</div>
@endif
