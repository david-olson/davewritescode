<img src="{{ route('public.media.show', $section->media->id) }}" alt="{{ $section->media->alt }}">
@if($section->media->caption)
	<p>{{ $section->media->caption }}</p>
@endif
