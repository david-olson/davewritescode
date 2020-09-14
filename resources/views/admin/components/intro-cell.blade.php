<div class="grid-x admin-intro-cell">
	<div class="large-shrink cell">
		<div class="admin-intro-cell__icon-wrapper">{!! file_get_contents('./images/admin/icon-' . $record .'.svg') !!}</div>
	</div>
	<div class="large-auto cell">
		<div class="grid-x grid-padding-x">
			<div class="shrink cell">
				<h1>{{ ucwords(str_replace(['-', '.'], ' ', $record)) }}</h1>
			</div>
			<div class="shrink cell">
				@if($record == 'media')
					<button data-open="media_upload_reveal" type="button" class="button outline small">Upload New</button>
				@else
					<a href="{{ route('admin.' . $record .'.create') }}" class="button outline small">Add New Record</a>
				@endif
			</div>
			<div class="large-12 cell">
				<p>This is the tool for managing all {{ \Str::plural(str_replace(['-', '.'], ' ', $record)) }} in the database.</p>
			</div>
		</div>

	</div>
</div>
