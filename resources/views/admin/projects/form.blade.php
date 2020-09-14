<div class="grid-x grid-padding-x">
	<div class="large-8 cell">
		<div class="card">
			<div class="card__body">
				<div class="grid-x grid-padding-x">
					<div class="large-12 cell">
						<label for="title">Title</label>
						<input type="text" name="title" id="title" value="{{ (isset($project)) ? $project->title : '' }}">
					</div>
					<div class="large-12 cell">
						<div class="grid-x grid-padding-x">
							<div class="auto cell">
								<p><b>Primary Image</b></p>
							</div>
							<div class="shrink cell">
								<button class="button small outline" type="button" data-type="ajax" data-fancybox data-src="{{ route('admin.media-gallery.index') }}?table_target=primary_image_tbody&field_name=primary_image&limit=1&type={{ urlencode('image/png|image/jpeg') }}">Add / Replace Image</button>
							</div>
						</div>
						<table class="unstriped hover mb--none">
							<tbody id="media_gallery_table_primary_image_tbody">
								@if(old('primary_image'))
									@php
										$media_type = urldecode(old('primary_image.1.media_type'));
									@endphp
									@include('admin.components.media.linked', ['media' => [$media_type::find(old('primary_image.1.id'))], 'field_name' => 'primary_image', 'limit' => 1])
								@elseif($project->image)
									@include('admin.components.media.linked', ['media' => [$project->image], 'field_name' => 'primary_image', 'limit' => 1])
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
					<div class="large-6 cell">
						<label for="tech">Tech</label>
						<input type="text" name="tech" id="tech" value="{{ (isset($project)) ? $project->tech : '' }}">
					</div>
					<div class="large-6 cell">
						<label for="role">Role</label>
						<input type="text" name="role" id="role" value="{{ (isset($project)) ? $project->role : '' }}">
					</div>
					<div class="large-12 cell">
						<label for="address">Address</label>
						<input type="text" name="site_address" id="address" value="{{ (isset($project)) ? $project->site_address : '' }}">
					</div>
					<div class="large-12 cell mb--small">
						<label for="description">Description</label>
						<textarea name="description" id="description" cols="30" rows="10" class="editor">{!! (isset($project)) ? $project->description : '' !!}</textarea>
					</div>
					<div class="large-12 cell mb--small">
						<label for="challenges">Challenges</label>
						<textarea name="challenges" id="challenges" cols="30" rows="10" class="editor">{!! (isset($project)) ? $project->challenges : '' !!}</textarea>
					</div>
					<div class="large-12 cell">
						<div class="grid-x grid-padding-x">
							<div class="auto cell">
								<p><b>Sections</b></p>
							</div>
							<div class="shrink cell">
								<button data-add="section" class="button outline small add-something-button" id="add_section" type="button">Add Section</button>
							</div>
						</div>
						<table class="drag-and-drop unstriped hover">
							<tbody id="section_tbody">
								@if(old('section'))
									@foreach(old('section') as $sec)
										@php $count = $loop->iteration; @endphp
										@include('admin.projects.form-components.section')
									@endforeach
								@elseif(isset($project))
									@foreach($project->sections as $section)
										@php $count = $loop->iteration; @endphp
										@include('admin.projects.form-components.section')
									@endforeach
								@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="large-4 cell">
		<div class="card">
			<div class="card__body">
				<button class="button mb--none expanded">{{ (isset($project)) ?'Update' : 'Create' }} Project</button>
			</div>
		</div>
	</div>
</div>
