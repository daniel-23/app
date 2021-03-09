<template>
	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<a href="index3.html" class="nav-link">{{ __('Home') }}</a>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<a href="#" class="nav-link">{{ __('Contact') }}</a>
			</li>
		</ul>

		<ul class="navbar-nav ml-auto">
		    <!-- Language Dropdown Menu -->
		    <li class="nav-item dropdown">

		        <a class="nav-link" data-toggle="dropdown" href="#">
		            <i class="flag-icon flag-icon-us" v-if="$page.props.locale == 'en'"></i>
		            <i class="flag-icon flag-icon-es" v-if="$page.props.locale == 'es'"></i>
		        </a>
		        <div class="dropdown-menu dropdown-menu-right p-0">

		        	<inertia-link :href="route('language','en')" class="dropdown-item">
		        		<i class="flag-icon flag-icon-us mr-2"></i> {{ __('English') }}
		        	</inertia-link>

		        	<inertia-link :href="route('language','es')" class="dropdown-item">
		        		<i class="flag-icon flag-icon-es mr-2"></i> {{ __('Spanish') }}
		        	</inertia-link>

		        </div>
		    </li>
		    <li class="nav-item">
		        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
		            <i class="fas fa-th-large"></i>
		        </a>
		    </li>
		</ul>
	</nav>
</template>
	