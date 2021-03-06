<template>
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <inertia-link :href="route('dashboard')" class="brand-link">
            <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
               style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </inertia-link>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" class="img-circle elevation-2">
                </div>
                <div class="info">
                    <inertia-link :href="route('profile.show')" class="d-block">{{ $page.props.user.name }}</inertia-link>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <jet-nav-link :href="route('dashboard')" :active="route().current('dashboard')">
                        <i class="nav-icon fas fa-th"></i>
                        <p>{{ __('Dashboard') }}</p>
                    </jet-nav-link>

                    <jet-nav-link :href="route('users.index')" :active="route().current('users.index')">
                        <i class="nav-icon fa fa-users"></i>
                        <p>{{ __('Users') }}</p>
                    </jet-nav-link>
                    <jet-nav-link :href="route('posts.index')" :active="route().current('posts.index')">
                        <i class="nav-icon far fa-clipboard"></i>
                        <p>{{ __('Posts') }}</p>
                    </jet-nav-link>
                    <li class="nav-item mb-4">
                        <a :href="route('logout')" class="nav-link" @click.prevent="logout">
                            <i class="nav-icon fas fa-power-off text-danger"></i>
                            <p>{{ __('Logout') }}</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</template>
<script>
	import JetNavLink from '@/Jetstream/NavLink'
    export default {
        components: {
        	JetNavLink
        },
        methods: {
            logout() {
                this.$inertia.post(route('logout'));
            },
        }
    }
</script>
