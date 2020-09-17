@extends('layouts.public')

@section('content')
	<header class="single">
		<div class="grid-x grid-padding-x">
			<div class="large-auto medium-12 cell large-order-1 small-order-2 medium-order-2">
				<h1>
					@if($project->is_blue_ion)
						<small>Completed at Blue Ion</small>
					@endif
					{{ $project->title }}
				</h1>
			</div>
			<div class="shrink cell large-order-2 medium-order-1 small-order-1">
				@include('public.components.nav')
			</div>
		</div>
	</header>
	<main class="single">
		<div class="grid-x grid-padding-x">
			<div class="large-6 cell left-sidebar">
				<div class="project-display-area" data-sticky-for="1024">
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
					<div class="project-thumbnails">
						@foreach($project->sections()->whereNotIn('id', $ignore)->where('type', 'media')->get() as $section)
							<a data-fslightbox="project" href="{{ route('public.media.show', $section->media->id) }}">
								<img src="{{ route('public.media.show', $section->media->id) }}?size=100x100" alt="">
							</a>
						@endforeach
					</div>
					{{-- <div class="secondary-project-details">
						<p><span class="tech">{!! file_get_contents('./images/public/icon-tech.svg') !!} Tech: {{ $project->tech }}</span></p>
						<p><span class="role">{!! file_get_contents('./images/public/icon-role.svg') !!} Role: {{ $project->role }}</span></p>
						@if($project->site_address)
							<a class="preview-buttons"  href="{{ $project->site_address }}" target="_blank">{!! file_get_contents('./images/public/icon-link.svg') !!} Visit Site</a>
						@endif
					</div> --}}
				</div>
			</div>
			<div class="large-5 large-offset-1 cell">
				<h2>{{ $project->declaration }}</h2>
				<hr>
				<div class="project-details">
					<p><span class="tech">{!! file_get_contents('./images/public/icon-tech.svg') !!} Tech: {{ $project->tech }}</span></p>
					<p><span class="role">{!! file_get_contents('./images/public/icon-role.svg') !!} Role: {{ $project->role }}</span></p>
					@if($project->site_address)
						<a class="preview-buttons"  href="{{ $project->site_address }}" target="_blank">{!! file_get_contents('./images/public/icon-link.svg') !!} Visit Site</a>
					@endif
				</div>
				<hr>
				{!! $project->description !!}
				<h2>Challenges</h2>
				{!! $project->challenges !!}
				{{-- <div class="sections">
					@foreach($project->sections as $section)
						@include('public.projects.sections.' . $section->type)
					@endforeach
				</div> --}}
			</div>
		</div>
	</main>
@endsection
