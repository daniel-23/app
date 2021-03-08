<template>
	<ul class="pagination pagination-sm m-0 float-right">
        <li class="page-item" v-for="(link, key) in links" :key="key" :class="{'active': link.active}">
        	<button disabled v-if="link.url === null" class="btn btn-sm btn-default" v-html="link.label"></button>
        	<inertia-link v-else class="page-link" :href="link.url" v-html="link.label"></inertia-link>
        </li>
    </ul>
</template>

<script>
export default {
  props: {
    links: Array,
  },
}
</script>
