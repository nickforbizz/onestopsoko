<div class="sidebar sidebar-style-2">
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="{{ asset('storage/'.auth()->user()->avator) ?? asset('assets/img/default/avator.png') }}" alt="..." class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span>
							{{ Auth()->user()->fname}}
							<span class="user-level"> {{ auth()->user()->roles->pluck('name')[0] ?? '' === 'User' }} </span>
							<span class="caret"></span>
						</span>
					</a>
					<div class="clearfix"></div>

					<div class="collapse in" id="collapseExample">
						<ul class="nav">
							<li>
								<a href="{{ route('users.show', auth()->id()) }}">
									<span class="link-collapse">My Profile</span>
								</a>
							</li>
							<li>
								<a href="{{ route('users.edit', auth()->id()) }}">
									<span class="link-collapse">Edit Profile</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<ul class="nav nav-primary">
				<li class="nav-item @if(Route::currentRouteName() == 'cms') active @endif">
					<a href="{{ route('cms') }}">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Modules</h4>
					<hr>
				</li>

				@if(auth()->user()->hasAnyRole(['admin', 'superadmin']))
				<li class="nav-item @if(Route::is('users.*')) active @endif">
					<a href="{{ route('users.index') }}">
						<i class="icon-people"></i>
						<p>Users</p>
					</a>
				</li>
				@endif


				<li class="nav-item @if(Route::is('suppliers.*')) active @endif">
					<a href="{{ route('suppliers.index') }}">
						<i class="fas fa-user-clock"></i>
						<p> Supplier</p>
					</a>
				</li>

				<li class="nav-item @if(Route::is('supplies.*')) active @endif">
					<a href="{{ route('supplies.index') }}">
						<i class="fas fa-clipboard-list"></i>
						<p> Supplies</p>
					</a>
				</li>

				<hr>

				<li class="nav-item @if(Route::is('clients.*')) active @endif">
					<a href="{{ route('clients.index') }}">
						<i class="fas fa-user-friends"></i>
						<p> Clients</p>
					</a>
				</li>

				<li class="nav-item @if(Route::is('inventories.*')) active @endif">
					<a href="{{ route('inventories.index') }}">
						<i class="far fa-file-alt"></i>
						<p> Inventory </p>
					</a>
				</li>
				<hr>

				

				<li class="nav-item @if(Route::is('productCategories.*')) active @endif">
					<a href="{{ route('productCategories.index') }}">
						<i class="fas fa-chevron-right"></i>
						<p> Product Categories</p>
					</a>
				</li>

				<li class="nav-item @if(Route::is('products.*')) active @endif">
					<a href="{{ route('products.index') }}">
						<i class="fas fa-dolly-flatbed"></i>
						<p> Products</p>
					</a>
				</li>

				<hr>

				<li class="nav-item @if(Route::is('sales.*')) active @endif">
					<a href="{{ route('sales.index') }}">
						<i class="fas fa-cart-plus"></i>
						<p> Sales </p>
					</a>
				</li>

				<hr>

				<li class="nav-item @if(Route::is('customerrequests.*')) active @endif">
					<a href="{{ route('customerrequests.index') }}">
						<i class="fas fa-chalkboard-teacher"></i>
						<p> Customer requests</p>
					</a>
				</li>

				<li class="nav-item @if(Route::is('reports.*')) active @endif">
					<a href="{{ route('reports.index') }}">
						<i class="far fa-chart-bar"></i>
						<p> Reports</p>
					</a>
				</li>

				@if(auth()->user()->hasAnyRole(['admin', 'superadmin']))
				<li class="nav-item @if(Route::is('roles.*') || 
									Route::is('permissions.*') ||
									 Route::is('notifications.*') ) active 
									@endif">
					<a data-toggle="collapse" href="#submenu">
						<i class="fas fa-cog"></i>
						<p>System Parameters</p>
						<span class="caret"></span>
					</a>
					<div class="@if( Route::is('roles.*') || 
								     Route::is('permissions.*') ||
									 Route::is('notifications.*') ) collapsed @else collapse @endif" 
									 id="submenu">
						<ul class="nav nav-collapse">
							<li>
								<a data-toggle="collapse" href="#subnav2">
									<span class="sub-item">Users</span>
									<span class="caret"></span>
								</a>
								<div class="@if(Route::is('roles.*') || Route::is('permissions.*')) collapsed @else collapse @endif" id="subnav2">
									<ul class="nav nav-collapse subnav">
										<li class=" @if(Route::is('roles.*')) active @endif">
											<a href="{{ route('roles.index') }}">
												<span class="sub-item">Roles</span>
											</a>
										</li>

										<li class=" @if(Route::is('permissions.*')) active @endif">
											<a href="{{ route('permissions.index') }}">
												<span class="sub-item">Permissions</span>
											</a>
										</li>
									</ul>
								</div>
							</li>

							<li class=" @if(Route::is('notifications.*')) active @endif">
								<a href="{{ route('notifications.index') }}">
									<span class="sub-item">Notifications </span>
								</a>
							</li>

							<li>
								<a href="#">
									<span class="sub-item">Params</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				@endif

				<hr>
				<li class="nav-item">
					<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						<i class="icon-logout"></i>
						<p>Logout</p>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>