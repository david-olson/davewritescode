<div class="image-layout-scene image-layout-scene--2">
	<div class="image-layout-scene__group image-layout-scene__group--1">
		@if(isset($project) && $project->image)
			<div class="image-layout-scene__image-1">
				<img class="lazyload" data-src="{{ route('public.media.show', [$project->image->id, $project->image->mediaType->extension]) }}?size=300x250" alt="" width="300" height="250">
				<div class="below"></div>
			</div>
		@endif
		@if(isset($project) && $project->sections()->where('type', 'media')->get()->count() > 0)
			<div class="image-layout-scene__image-2">
				<img class="lazyload" data-src="{{ route('public.media.show', [$project->sections()->where('type', 'media')->first()->media->id, $project->sections()->where('type', 'media')->first()->media->mediaType->extension]) }}?size=200x350" alt="" width="200" height="350">
				<div class="below"></div>
			</div>
		@endif
	</div>
	@if(isset($project) && $project->sections()->where('type', 'media')->get()->count() > 1)
		<div class="image-layout-scene__image-3">
			<img class="lazyload" data-src="{{ route('public.media.show', [$project->sections()->where('type', 'media')->get()->get(1)->media->id, $project->sections()->where('type', 'media')->get()->get(1)->media->mediaType->extension]) }}?size=400x600" width="400" height="600" alt="">
			<div class="below"></div>
		</div>
	@endif
</div>
