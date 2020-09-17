<div class="image-layout-scene image-layout-scene--3">
	@if(isset($project) && $project->image)
		<div class="image-layout-scene__image-4">
			<img src="{{ route('public.media.show', $project->image->id) }}?size=600x500" alt="">
			<div class="below-2"></div>
		</div>
	@endif
	@if(isset($project) && $project->sections()->where('type', 'media')->get()->count() > 0)
		<div class="image-layout-scene__image-5">
			<img src="{{ route('public.media.show', $project->sections()->where('type', 'media')->first()->media->id) }}?size=600x500" alt="">
			<div class="below-2"></div>
		</div>
	@endif
	@if(isset($project) && $project->sections()->where('type', 'media')->get()->count() > 1 && $project->image_count > 1)
		<div class="image-layout-scene__image-6">
			<img src="{{ route('public.media.show', $project->sections()->where('type', 'media')->get()->get(1)->media->id) }}?size=600x500" alt="">
			<div class="below-2"></div>
		</div>
	@endif
</div>
