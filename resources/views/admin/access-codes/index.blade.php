@extends('layouts.app')

@section("content")
	@include('admin.components.intro-cell', ['record' => 'access-codes'])
	<div class="admin-records-cell grid-x grid-padding-x">
		<div class="large-12 cell">
			<div class="card">
				<table class="unstriped hover">
					<thead class="admin-filter-form-thead">
						<tr>
							<th>ID</th>
							<th>Code</th>
							<th>Last Used</th>
							<th class="text-right">Actions</th>
						</tr>
					</thead>
					<tbody class="admin-filter-form-table">
						<tbody>
							@foreach($accessCodes as $code)
								<tr>
									<td>{{ $code->id }}</td>
									<td>{{ $code->code }}</td>
									<td>{{ ($code->last_used) ? $code->last_used->format('F j, Y @ g:ia') : 'Never' }}</td>
									<td class="text-right">
										<div class="button-group no-gaps small hollow align-right mb--none">
											<a href="{{ route('admin.access-codes.show', $code->code) }}" class="button">View / Edit Details</a>
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
