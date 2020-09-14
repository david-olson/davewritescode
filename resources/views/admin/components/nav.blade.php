<div class="sticky" data-sticky data-margin-top="4">
	<ul class="menu vertical accordion-menu" data-accordion-menu>
		<li>
			<a href="#">Projects</a>
			<ul class="menu vertical nested {{ (Request::is(['projects*'])) ? 'is-active' : '' }}">
				<li>
					<a class="{{ (Request::is('projects*')) ? 'is-current' : '' }}" href="{{ route('admin.projects.index') }}">View All</a>
				</li>
				<li>
					<a href="{{ route('admin.projects.create') }}">Add New</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="#">Access Codes</a>
			<ul class="menu vertical nested {{ (Request::is(['access-codes*'])) ? 'is-active' : '' }}">
				<li>
					<a class="{{ (Request::is('access-codes')) ? 'is-current' : '' }}" href="{{ route('admin.access-codes.index') }}">View Access Codes</a>
				</li>
				<li>
					<a href="{{ route('admin.access-codes.create') }}">Add New Access Code</a>
				</li>
			</ul>
		</li>
	</ul>
</div>
