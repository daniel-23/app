require('./bootstrap');

// Import modules...
import Vue from 'vue';
import VueMeta from 'vue-meta';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue';
import PortalVue from 'portal-vue';

Vue.mixin({
	methods: {
		route,
		__(key, replace = {}) {
			let t = this.$page.props.language[key];
			if (t == undefined) {
				return key;
			}else{
				return t;
			}
		}
	}
});


Vue.use(InertiaPlugin);
Vue.use(PortalVue);
Vue.use(VueMeta);

const app = document.getElementById('app');

new Vue({
	metaInfo: {
		titleTemplate: (title) => title ? `${title} - App` : 'App'
	},
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
