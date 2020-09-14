<div class="ajax-modal media-modal">
	<h2 class="view-header mb--small">Add Media From Gallery or Upload</h2>
	<ul class="tabs" data-tabs id="gallery_tabs">
		<li class="tabs-title is-active"><a href="#gallery">Gallery</a></li>
		<li class="tabs-title"><a href="#upload">Upload</a></li>
	</ul>
	<div class="tabs-content" data-tabs-content="gallery_tabs">
		<div class="tabs-panel is-active" id="gallery">
			<form action="{{ route('admin.media-gallery.create') }}" method="GET" class="add-media-form">
				@if(array_key_exists('table_target', $_GET))
					<input type="hidden" name="table_target" value="{{ $_GET['table_target'] }}">
				@endif
				@if (array_key_exists('field_name', $_GET))
					<input type="hidden" name="field_name" value="{{ $_GET['field_name'] }}">
				@endif
				@if(array_key_exists('limit', $_GET))
					<input type="hidden" name="limit" value="{{ $_GET['limit'] }}">
				@endif
				<table class="unstriped hover">
					<thead>
						<th></th>
						<th>Name</th>
						<th class="text-right">Type</th>
					</thead>
					<tbody>
						@foreach($prepend as $media_item)
							<tr class="record-row">
								<td width="50">
									<div class="pretty p-default p-smooth p-bigger">
									    <input checked type="{{ (array_key_exists('limit', $_GET) && $_GET['limit'] < 2) ? 'radio' : 'checkbox' }}" id="curriculum_selection_{{ $media_item->id }}" name="media_id[]" value="{{ $media_item->id }}" />
									    <div class="state">
									        <label>
									    	</label>
									    </div>
									</div>
								</td>
								<td>
									<img src="{{ route('admin.media.show', $media_item->id) }}?size=50x50" alt="">
									{{ ($media_item->name) ? $media_item->name : 'Untitled File' }}{!! (get_class($media_item) == "App\Media") ? ' <span class="core-materials" data-tip data-tippy-content="This file is part of the Overcoming Obstacles Core Curriculum and is not one of your files">Core</span>' : '' !!}
									<input type="hidden" name="media_type[{{ $media_item->id }}][type]" value="{{ get_class($media_item) }}">
								</td>
								<td class="text-right">{{ $media_item->mime }}</td>
							</tr>
						@endforeach
						@foreach($media as $media_item)
							<tr class="record-row">
								<td width="50">
									<div class="pretty p-default p-smooth p-bigger">
									    <input type="{{ (array_key_exists('limit', $_GET) && $_GET['limit'] < 2) ? 'radio' : 'checkbox' }}" id="curriculum_selection_{{ $media_item->id }}" name="media_id[]" value="{{ $media_item->id }}" />
									    <div class="state">
									        <label>
									    	</label>
									    </div>
									</div>
								</td>
								<td>
									<img src="{{ route('admin.media.show', $media_item->id) }}?size=50x50" alt="">
									{{ ($media_item->name) ? $media_item->name : 'Untitled File' }}{!! (get_class($media_item) == "App\Media") ? ' <span class="core-materials" data-tip data-tippy-content="This file is part of the Overcoming Obstacles Core Curriculum and is not one of your files">Core</span>' : '' !!}
									<input type="hidden" name="media_type[{{ $media_item->id }}][type]" value="{{ get_class($media_item) }}">
								</td>
								<td class="text-right">{{ $media_item->mime }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<div class="grid-x grid-padding-x align-right">
					<div class="cell shrink">
						<button class="button" type="submit">Add Media</button>
					</div>
				</div>
			</form>

		</div>
		<div class="tabs-panel" id="upload">
			<form action="{{ route('admin.media.index') }}" id="media_gallery_upload" class="dropzone" data-field-name="media_gallery">
				@csrf
				<input type="hidden" name="table_target_id" value="media_gallery_table_{{ $_GET['table_target'] }}">
				@if (array_key_exists('field_name', $_GET))
					<input type="hidden" name="field_name" value="{{ $_GET['field_name'] }}">
				@endif
				@if(array_key_exists('limit', $_GET))
					<input type="hidden" name="limit" value="{{ $_GET['limit'] }}">
				@endif
				<div class="dz-message text-center">
					{!! file_get_contents('./images/admin/icon-upload.svg') !!}
					<h2 class="view-header">Drop files here or Click to upload.</h2>
				</div>
			</form>
			<div class="errors" id="media_gallery_upload_errors"></div>
			<div class="uploaded-list" id="media_gallery_upload_list">

			</div>
		</div>
	</div>
</div>
