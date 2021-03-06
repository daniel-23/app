<template>
	<span class="error invalid-feedback" v-show="message">{{ __(message) }}</span>
</template>

<script>
    export default {
        props: ['message']
    }
</script>
