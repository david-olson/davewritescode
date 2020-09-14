@extends('layouts.public')

@section('content')

	<div class="grid-x grid-padding-x align-center">
		<div class="large-4 cell">
			<div class="access-code">
				<h1>You must Authenticate to view this.</h1>
				<p>Please enter your access code.</p>
				<form action="{{ route('public.access-code') }}" method="POST" autocomplete="off">
					@csrf
					<input type="text" name="code" id="code" autocomplete="off" autofocus>
					<label for="code">Code</label>
					@error('code')
						{{ $message }}
					@enderror
					<button class="button expanded">Submit</button>
				</form>
			</div>
		</div>
	</div>

@endsection
