@extends('layouts.public')

@section('content')

<header>
	<div class="grid-x grid-padding-x">
		<div class="large-auto cell">
			<h1>Recent Projects</h1>
		</div>
		<div class="shrink cell">
			@include('public.components.nav')
		</div>
	</div>
</header>

<main>
	<div class="grid-x grid-padding-x">
		<div class="large-5 medium-6 cell large-order-1 small-order-2 medium-order-1">
			<ul class="project-list">
				@foreach($projects as $project)
					<li>
						<a href="{{ route('public.projects.show', $project->slug) }}" data-project="project_{{ $project->id }}">
							<span class="number">{{ ($loop->iteration < 10) ? '0' . $loop->iteration : $loop->iteration }}.</span>
							<span class="title">{{ $project->title }}</span>
							<span class="mobile-details">{{ $project->declaration }}</span>
							@if($project->is_blue_ion)
								<span class="blue-ion">Completed with Blue Ion</span>
							@endif
						</a>
					</li>
				@endforeach
			</ul>
		</div>
		<div class="large-6 medium-6 large-offset-1 cell large-order-2 small-order-1 medium-order-2">
			<div class="project-display-area"  data-sticky-for="1024">
				@foreach($projects as $project)
					<article class="project show-for-large" id="project_{{ $project->id }}">
						@include('public.projects.preview')
					</article>
				@endforeach
				@include('public.components.monitor')
				<div class="monitor-placeholder">{!! file_get_contents('./images/public/monitor-placeholder.svg') !!}</div>
			</div>
		</div>
	</div>
</main>

@endsection
