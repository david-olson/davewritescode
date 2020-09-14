@extends('layouts.app')

@section("content")
@include('admin.components.errors')
	<div class="grid-x admin-intro-cell">
		<div class="large-shrink cell">
			<div class="admin-intro-cell__icon-wrapper">{!! file_get_contents('./images/admin/icon-projects.svg') !!}</div>
		</div>
		<div class="large-auto cell">
			<div class="grid-x grid-padding-x">
				<div class="shrink cell">
					<h1>Viewing {{ $project->title }}</h1>
				</div>
			</div>

		</div>
	</div>
	<div class="admin-records-cell grid-x grid-padding-x">
		<div class="large-12 cell">
			<form action="{{ route('admin.projects.show', $project->slug) }}" method="POST">
				@csrf
				@method('PATCH')
				@include('admin.projects.form')
			</form>
			@include('admin.projects.form-modals')
		</div>
	</div>
@endsection
