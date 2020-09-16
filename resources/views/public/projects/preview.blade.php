@if($project->image)
	{{-- <div class="preview-image-holder"><img src="{{ route('public.media.show', $project->image->id) }}" alt="{{ $project->image->alt }}"></div> --}}
	<div class="preview-image-holder">
		@include('public.components.project-layouts.'. $project->slug)
		{{-- @include('public.components.image-layouts.layout-4') --}}
	</div>
	@if($project->image->caption)
		<p>{{ $project->image->caption }}</p>
	@endif
@endif
<div class="details">
	<h2>{{ $project->declaration }}</h2>
	<hr>
	<p><span class="tech">{!! file_get_contents('./images/public/icon-tech.svg') !!} Tech: {{ $project->tech }}</span></p>
	<p><span class="role">{!! file_get_contents('./images/public/icon-role.svg') !!} Role: {{ $project->role }}</span></p>
	<div class="grid-x grid-padding-x preview-button-grid">
		<div class="shrink cell">
			<a class="preview-buttons"  href="{{ route('public.projects.show', $project->slug) }}">{!! file_get_contents('./images/public/icon-view-details.svg') !!} View Details</a>
		</div>
		@if($project->site_address)
			<div class="shrink cell">
				<a class="preview-buttons"  href="{{ $project->site_address }}" target="_blank">{!! file_get_contents('./images/public/icon-link.svg') !!} Visit Site</a>
			</div>
		@endif
	</div>
</div>

