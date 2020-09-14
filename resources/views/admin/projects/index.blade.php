@extends('layouts.app')

@section("content")
	@include('admin.components.intro-cell', ['record' => 'projects'])
	<div class="admin-records-cell grid-x grid-padding-x">
		<div class="large-12 cell">
			<div class="card">
				<table class="unstriped hover">
					<thead class="admin-filter-form-thead">
						<tr>
							<th>ID</th>
							<th>Title</th>
							<th>Last Viewed</th>
							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody class="admin-filter-form-table">
						<tbody>
							@foreach($projects as $project)
								<tr>
									<td>{{ $project->id }}</td>
									<td>{{ $project->title }}</td>
									<td>#</td>
									<td class="text-right">
										<div class="button-group no-gaps small hollow align-right mb--none">
											<a href="{{ route('admin.projects.show', $project->slug) }}" class="button">View / Edit Details</a>
										</div>
									</td>
								</tr>
							@endforeach
						</tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
