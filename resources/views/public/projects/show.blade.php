@extends('layouts.public')

@section('content')
	<header class="single">
		<div class="grid-x grid-padding-x">
			<div class="auto cell">
				<h1>
					@if($project->is_blue_ion)
						<small>Completed at Blue Ion</small>
					@endif
					{{ $project->title }}
				</h1>
			</div>
			<div class="shrink cell">
				@include('public.components.nav')
			</div>
		</div>
	</header>
	<main class="single">
		<div class="grid-x grid-padding-x">
			<div class="large-6 cell">
				<div class="project-display-area">
					@if($project->image)
						<div class="preview-image-holder"><img src="{{ route('public.media.show', $project->image->id) }}" alt="{{ $project->image->alt }}"></div>
						@if($project->image->caption)
							<p>{{ $project->image->caption }}</p>
						@endif
					@endif
					@include('public.components.monitor')
					<div class="details">
						<p><span class="tech">{!! file_get_contents('./images/public/icon-tech.svg') !!} Tech: {{ $project->tech }}</span></p>
							<p><span class="role">{!! file_get_contents('./images/public/icon-role.svg') !!} Role: {{ $project->role }}</span></p>
						<div class="grid-x grid-padding-x">
							@if($project->site_address)
								<div class="shrink cell">
									<a class="preview-buttons"  href="{{ $project->site_address }}" target="_blank">{!! file_get_contents('./images/public/icon-link.svg') !!} Visit Site</a>
								</div>
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="large-5 large-offset-1 cell">
				{!! $project->description !!}
				<h2>Challenges</h2>
				{!! $project->challenges !!}
				<div class="sections">
					@foreach($project->sections as $section)
						@include('public.projects.sections.' . $section->type)
					@endforeach
				</div>
			</div>
		</div>
	</main>
@endsection
