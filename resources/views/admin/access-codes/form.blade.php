<div class="grid-x grid-padding-x">
	<div class="large-8 cell">
		<div class="card">
			<div class="card__body">
				<label for="code">Code</label>
				<input type="text" name="code" id="code" value="{{ (isset($code)) ? $code->code : '' }}">
			</div>
		</div>
	</div>
	<div class="large-4 cell">
		<div class="card">
			<div class="card__body">
				<button class="button expanded mb--none">{{ (isset($code)) ? 'Update' : 'Create' }} Code</button>
			</div>
		</div>
	</div>
</div>
