<tr id="section_{{ $count }}">
	<td class="draggable-row" width="20">
		@if(isset($section))
			<input type="hidden" name="section[{{ $count }}][id]" value="{{ $section->id }}">
		@endif
	</td>
	<td>
		<div class="grid-x grid-padding-x" data-children data-field-id="section_{{ $count }}_section_type" id="section_{{ $count }}_radio_fields">
			<div class="shrink cell">
				<input {{ (isset($section) && $section->type == 'content') ? 'checked' : '' }} type="radio" name="section[{{ $count }}][type]" id="section_{{ $count }}_type_content" value="content">
				<label for="section_{{ $count }}_type_content">Content</label>
			</div>
			<div class="shrink cell">
				<input {{ (isset($section) && $section->type == 'media') ? 'checked' : '' }} type="radio" name="section[{{ $count }}][type]" id="section_{{ $count }}_type_media" value="media">
				<label for="section_{{ $count }}_type_media">Media</label>
			</div>
		</div>
		<div class="grid-x grid-padding-x">
			<div class="large-12 cell" data-parent="section_{{ $count }}_section_type" data-parent-value="content">
				<div class="grid-x grid-padding-x"  >
					<div class="large-12 cell mb--small">
						<label for="section_{{ $count }}_content">Content</label>
						<textarea name="section[{{ $count }}][content]" id="section_{{ $count }}_content" cols="30" rows="10" class="editor">{!! (isset($section)) ? $section->content : '' !!}</textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="grid-x grid-padding-x">
			<div class="large-12 cell" data-parent="section_{{ $count }}_section_type" data-parent-value="media">
				<div class="grid-x grid-padding-x" >
					<div class="auto cell">
						<p><b>Section {{ $count }} Media</b></p>
					</div>
					<div class="shrink cell">
						<button type="button" class="button small outline" data-fancybox data-type="ajax" data-src="{{ route('admin.media-gallery.index') }}?table_target=section_{{ $count }}_tbody&field_name=section[{{ $count }}][primary_image]&limit=1&type={{ urlencode('image/png|image/jpeg') }}">Add Media</button>
					</div>
					<div class="large-12 cell">
						<table class="unstriped hover">
							<tbody id="media_gallery_table_section_{{ $count }}_tbody">
								@if(old('section.' . $count . '.primary_image'))
									@php
										$media_type = urldecode(old('section.' . $count . '.primary_image.1.media_type'));
									@endphp
									@include('admin.components.media.linked', ['media' => [$media_type::find(old('section.' . $count . '.primary_image.1.id'))], 'field_name' => 'section[' .  $count . '][primary_image]', 'limit' => 1])
								@elseif(isset($section) && $section->media)
									@include('admin.components.media.linked', ['media' => [$section->media], 'field_name' => 'section[' . $count .'][primary_image]', 'limit' => 1])
								@else
									<tr>
										<td class="text-center placeholder-row">
											No Media Attached
										</td>
									</tr>
								@endif
							</tbody>
						</table>
					</div>
			</div>
		</div>
		</div>
	</td>
	<td class="text-right" width="20" valign="top">
		<button class="button clear large alert remove-row" data-row-id="section_{{ $count }}" type="button">&times;</button>
	</td>
</tr>
