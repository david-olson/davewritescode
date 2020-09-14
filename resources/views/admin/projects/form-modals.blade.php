<form action="{{ route('admin.project-sections.create') }}" class="add-section-form" method="GET">
	<input type="hidden" name="count" value="{{ (isset($project)) ? $project->sections->count() + 1 : 1 }}">
</form>
