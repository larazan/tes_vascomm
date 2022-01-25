 <!--
	====================================
	——— LEFT SIDEBAR WITH FOOTER
	=====================================
-->
<aside class="left-sidebar bg-sidebar">
	<div id="sidebar" class="sidebar sidebar-with-footer">
		<!-- Aplication Brand -->
		<div class="app-brand">
			<a href="{{ url('admin/dashboard') }}">
			<span class="brand-name">Laravel Dashboard</span>
			</a>
		</div>
		<!-- begin sidebar scrollbar -->
		<div class="sidebar-scrollbar">

			<!-- sidebar menu -->
			<ul class="nav sidebar-inner" id="sidebar-menu">
				<li  class="has-sub  {{ ($currentAdminMenu == 'dashboard') ? 'expand active' : ''}}">
					<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
						aria-expanded="false" aria-controls="dashboard">
						<i class="mdi mdi-chart-pie"></i>
						<span class="nav-text">Dashboard</span> <b class="caret"></b>
					</a>
					<ul class="collapse {{ ($currentAdminMenu == 'dashboard') ? 'show' : ''}}"  id="dashboard"
						data-parent="#sidebar-menu">
						<div class="sub-menu">
							<li class="{{ ($currentAdminSubMenu == 'analytic') ? 'active' : ''}}">
								<a class="sidenav-item-link" href="{{ url('admin/dashboard')}}">
								<span class="nav-text">Analytic</span>
								</a>
							</li>
						</div>
					</ul>
				</li>
				<li  class="has-sub   {{ ($currentAdminMenu == 'catalog') ? 'expand active' : ''}}">
					<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#catalog"
						aria-expanded="false" aria-controls="catalog">
						<i class="mdi mdi-view-dashboard-outline"></i>
						<span class="nav-text">Catalog</span> <b class="caret"></b>
					</a>
					<ul  class="collapse {{ ($currentAdminMenu == 'catalog') ? 'show' : ''}}"  id="catalog"
						data-parent="#sidebar-menu">
						<div class="sub-menu">
							<li class="{{ ($currentAdminMenu == 'catalog') ? 'show' : ''}}">
								<a class="sidenav-item-link" href="{{ url('admin/products')}}">
								<span class="nav-text">Products</span>
								</a>
							</li>
							<li class="{{ ($currentAdminSubMenu == 'category') ? 'active' : ''}}">
								<a class="sidenav-item-link" href="{{ url('admin/categories')}}">
								<span class="nav-text">Categories</span>
								</a>
							</li>
							<li class="{{ ($currentAdminSubMenu == 'brand') ? 'active' : ''}}">
								<a class="sidenav-item-link" href="{{ url('admin/brands')}}">
								<span class="nav-text">Brands</span>
								</a>
							</li>
							<li class="{{ ($currentAdminSubMenu == 'attribute') ? 'active' : ''}}">
								<a class="sidenav-item-link" href="{{ url('admin/attributes')}}">
								<span class="nav-text">Attributes</span>
								</a>
							</li>
						</div>
					</ul>
				</li>
				
				<li  class="has-sub {{ ($currentAdminMenu == 'role-user') ? 'expand active' : ''}}">
					<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#auth"
						aria-expanded="false" aria-controls="auth">
						<i class="mdi mdi-account-multiple-outline"></i>
						<span class="nav-text">Users &amp; Roles</span> <b class="caret"></b>
					</a>
					<ul class="collapse {{ ($currentAdminMenu == 'role-user') ? 'show' : ''}}"  id="auth"
						data-parent="#sidebar-menu">
						<div class="sub-menu">
							<li  class="{{ ($currentAdminSubMenu == 'user') ? 'active' : ''}}" >
								<a class="sidenav-item-link" href="{{ url('admin/users')}}">
								<span class="nav-text">Users</span>
								</a>
							</li>
							<li class="{{ ($currentAdminSubMenu == 'role') ? 'active' : ''}}">
								<a class="sidenav-item-link" href="{{ url('admin/roles')}}">
								<span class="nav-text">Roles</span>
								</a>
							</li>
						</div>
					</ul>
				</li>  
                <li  class="has-sub {{ ($currentAdminMenu == 'general') ? 'expand active' : ''}}">
					<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#general"
						aria-expanded="false" aria-controls="general">
						<i class="mdi mdi-settings"></i>
						<span class="nav-text">General</span> <b class="caret"></b>
					</a>
					<ul class="collapse {{ ($currentAdminMenu == 'general') ? 'show' : ''}}"  id="general"
						data-parent="#sidebar-menu">
						<div class="sub-menu">
							<li  class="{{ ($currentAdminSubMenu == 'slide') ? 'active' : ''}}" >
								<a class="sidenav-item-link" href="{{ url('admin/slides')}}">
								<span class="nav-text">Slides</span>
								</a>
							</li>
							
						</div>
					</ul>
				</li>     
			</ul>
		</div>
	</div>
</aside>