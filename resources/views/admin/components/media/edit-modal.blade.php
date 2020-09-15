<div style="min-width: 800px">
	@php
		if (array_key_exists('field_name', $_GET)) {
			$field_name = $_GET['field_name'];
		}
	@endphp
	<h2>Rename {{ ($media_item->name) ? $media_item->name : 'Untitled File' }}</h2>
	<p>Note: Updating the name of this media item will update it across the site.</p>
	<form action="{{ route('admin.media.show', $media_item->id) }}" method="POST" class="media-item-rename-form" data-row-id="media_item_row_{{ $media_item->id }}" data-linked-id="media_table_{{ (isset($field_name)) ? $field_name : '' }}_row_{{ $media_item->id }}" data-media-it="{{ $media_item->id }}">
		@csrf
		@method('PATCH')
		<input type="hidden" name="limit" value="{{ (array_key_exists('limit', $_GET)) ? $_GET['limit'] : '' }}">
		<div class="grid-x align-right align-bottom">
			<div class="auto cell">
				<label for="name">File Name</label>
				<input type="text" name="name" id="media_{{ $media_item->id }}_name" value="{{ $media_item->name }}">
			</div>
			<div class="cell shrink"><button class="button">Update File Name</button></div>
		</div>
	</form>
</div>
