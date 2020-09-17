<div class="image-layout-scene image-layout-scene--4">

	@if(isset($project) && $project->sections()->where('type', 'media')->get()->count() > 0)
		<div class="image-layout-scene__image-7">
			<img class="lazyload" data-src="{{ route('public.media.show', $project->sections()->where('type', 'media')->first()->media->id) }}?size=500x700" alt="">
			<div class="below-2"></div>
		</div>
	@endif
	@if(isset($project) && $project->image)
		<div class="image-layout-scene__image-8">
			<img class="lazyload" data-src="{{ route('public.media.show', $project->image->id) }}?size=500x700" alt="">
			<div class="below-2"></div>
		</div>
	@endif
</div>
