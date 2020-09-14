@foreach ($media as $media_item)
	<tr id="media_table_{{ Str::slug($field_name) }}_row_{{ $media_item->id }}" class="record-row" data-linked-media-row="{{ $media_item->id }}">
		@if(!$limit || $limit > 1)
			<td class="draggable-row"></td>
		@endif
		<td>
			<input type="hidden" name="{{ $field_name }}[{{ $loop->iteration }}][id]" value="{{ $media_item->id }}" data-model-type="{{ Str::slug(get_class($media_item)) }}">
			<input type="hidden" name="{{ $field_name }}[{{ $loop->iteration }}][media_type]" value="{{ urlencode(get_class($media_item)) }}">
			<img src="{{ route('admin.media.show', $media_item->id) }}?size=50x50" alt="">

			<span class="media-name" data-rename-modal="{{ route('admin.media.edit', $media_item->id) }}?field_name={{ $field_name }}&limit={{ $limit }}">{{ ($media_item->name) ? $media_item->name : 'Untitled File' }}</span>
		</td>
		<td class="text-right">{{ $media_item->mime }}</td>
		<td valign="middle" class="text-right" width="50">
			<button class="mb--none button small clear alert remove-row" data-row-id="media_table_{{ Str::slug($field_name) }}_row_{{ $media_item->id }}" type="button">&times;</button>
		</td>
	</tr>
@endforeach
