<form action="{{ route('admin.media.show', $media_item->id) }}" class="name-media-form" data-table-target-id="{{ $table_target_id }}" method="POST">
	@csrf
	@method('PATCH')
	<input type="hidden" name="field_name" value="{{ (isset($field_name)) ? $field_name : '' }}">
	<input type="hidden" name="limit" value="{{ (isset($limit)) ? $limit : '' }}">
	<div class="grid-x grid-padding-x">
		<div class="large-shrink cell">
			<img src="{{ route('admin.media.show', [app()->getLocale(), $media_item->id]) }}?size=50x50" alt="">
		</div>
		<div class="shrink cell">
			<label for="media_{{ $media_item->id }}_name">Name Media</label>
		</div>
		<div class="auto cell">
			<input type="text" name="name" value="" id="media_{{ $media_item->id }}_name">
		</div>
		<div class="shrink cell">
			<button class="button clear small">Add Name</button>
		</div>
	</div>
</form>
