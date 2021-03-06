<template>
	<div class="wrapper">
		<!-- Navbar -->
		<nav-bar />
		<!-- /.navbar -->

		<!-- SideBar -->
		<side-bar />
		<!-- /.SideBar -->

		<div class="content-wrapper">
			<!-- Page Heading -->
            <div class="content-header" v-if="$slots.header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    	<slot name="header"></slot>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>


			<slot></slot>
		</div>

		<!-- Main Footer -->
		<footer class="main-footer">
			<!-- To the right -->
			<div class="float-right d-none d-sm-inline">
				Anything you want
			</div>
			<!-- Default to the left -->
			<strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
		</footer>
	</div>
</template>

<script>
    import NavBar from '@/Layouts/NavBar'
    import SideBar from '@/Layouts/SideBar'

    export default {
        components: {
        	NavBar,
        	SideBar,
        },
        mounted() {
        	if ($("body").hasClass("sidebar-open")) {
        		$("body").removeClass('sidebar-open');
		    	$("body").addClass('sidebar-closed');
		    	$("body").addClass('sidebar-collapse');
		    }
		    if ($("body").hasClass('login-page')) {
		    	$("body").removeClass('login-page');
		    	$("body").addClass('sidebar-mini');
		    	$("body").addClass('layout-fixed');
		    }
		}
    }
</script>