<template>
    <label>
    	<span v-if="value">{{ __(value) }}</span>
        <span v-else><slot></slot></span>
    </label>
</template>

<script>
    export default {
        props: ['value']
    }
</script>
