<div class="image-layout-scene image-layout-scene--5">
	<div class="image-layout-scene__group image-layout-scene__group--3">
		@if(isset($project) && $project->image)
			<div class="image-layout-scene__image-11">
				<img class="lazyload" data-src="{{ route('public.media.show', [$project->image->id, $project->image->mediaType->extension]) }}?size=600x400" alt="" width="600" height="400">
				<div class="below-3"></div>
			</div>
		@endif
		@if(isset($project) && $project->sections()->where('type', 'media')->get()->count() > 0)
			<div class="image-layout-scene__image-13">
				<img class="lazyload" data-src="{{ route('public.media.show', [$project->sections()->where('type', 'media')->first()->media->id, $project->sections()->where('type', 'media')->first()->media->mediaType->extension]) }}?size=120x200" width="120" height="200" alt="">
				<div class="below-3"></div>
			</div>
		@endif
	</div>
	@if(isset($project) && $project->sections()->where('type', 'media')->get()->count() > 1)
		<div class="image-layout-scene__image-12">
			<img class="lazyload" data-src="{{ route('public.media.show', [$project->sections()->where('type', 'media')->get()->get(1)->media->id, $project->sections()->where('type', 'media')->get()->get(1)->media->mediaType->extension]) }}?size=600x900" width="600" height="900" alt="">
			<div class="below-3"></div>
		</div>
	@endif
</div>
