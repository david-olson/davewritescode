<div class="image-layout-scene image-layout-scene--2">
	<div class="image-layout-scene__group image-layout-scene__group--1">
		@if(isset($project) && $project->image)
			<div class="image-layout-scene__image-1">
				<img src="{{ route('public.media.show', $project->image->id) }}?size=300x250" alt="">
				<div class="below"></div>
			</div>
		@endif
		@if(isset($project) && $project->sections()->where('type', 'media')->get()->count() > 0)
			<div class="image-layout-scene__image-2">
				<img src="{{ route('public.media.show', $project->sections()->where('type', 'media')->first()->media->id) }}?size=200x350" alt="">
				<div class="below"></div>
			</div>
		@endif
	</div>
	@if(isset($project) && $project->sections()->where('type', 'media')->get()->count() > 1)
		<div class="image-layout-scene__image-3">
			<img src="{{ route('public.media.show', $project->sections()->where('type', 'media')->get()->get(1)->media->id) }}?size=400x600" alt="">
			<div class="below"></div>
		</div>
	@endif
</div>
