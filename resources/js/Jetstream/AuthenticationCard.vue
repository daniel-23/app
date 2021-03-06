<template>
	<div class="login-box">
		<div class="login-logo">
			<slot name="logo" />
		</div>

		<div class="card">
			<div class="card-body login-card-body">
				<slot />
			</div>
		</div>
	</div>
</template>
<script>
	export default {
        mounted() {
        	$("body").removeClass();
        	$("body").addClass('hold-transition');
        	$("body").addClass('login-page');
        }
    }
</script>