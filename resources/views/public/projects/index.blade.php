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
		<div class="large-5 cell">
			<ul class="project-list">
				@foreach($projects as $project)
					<li>
						<button data-project="project_{{ $project->id }}">
							<span class="number">{{ ($loop->iteration < 10) ? '0' . $loop->iteration : $loop->iteration }}.</span>
							<span class="title">{{ $project->title }}</span>
							@if($project->is_blue_ion)
								<span class="blue-ion">Completed with Blue Ion</span>
							@endif
						</button>
					</li>
				@endforeach
			</ul>
		</div>
		<div class="large-6 large-offset-1 cell">
			<div class="project-display-area">
				@foreach($projects as $project)
					<article class="project" id="project_{{ $project->id }}">
						@include('public.projects.preview')
					</article>
				@endforeach
				@include('public.components.monitor')
			</div>
		</div>
	</div>
</main>

@endsection
