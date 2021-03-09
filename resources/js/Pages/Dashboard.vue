<template>
    <app-layout>
        
        
            <!-- Content Header (Page header) -->
            <template #header>
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Recent posts') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Dashboard') }}</a></li>
                    </ol>
                </div><!-- /.col -->
            </template>

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="card-tools">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" v-model="form.search" class="form-control float-right" :placeholder="__('Search')">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <pagination :links="posts.links" class="float-right" />
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                            </div>
                                
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6" v-for="(post, key) in posts.data">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ post.title }}</h3>
                                    <span class="direct-chat-timestamp float-right">{{ fecha(post.created_at) }}</span>
                                </div>
                                <div class="card-body">
                                    {{ post.description }}
                                </div>

                                <div class="card-footer">
                                    <inertia-link :href="route('posts.show',post)" class="btn btn-success float-right">{{__('Read more!')}}</inertia-link>
                                </div>

                            </div>
                        </div>
                            
                    </div>
                    <!-- /.row -->
                    
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Pagination from '@/Shared/Pagination'
    import pickBy from 'lodash/pickBy'
    import throttle from 'lodash/throttle'

    export default {
        metaInfo: { title: 'Dashboard' },
        components: {
            AppLayout,
            Pagination,
        },
        props: ['posts','filters'],
        data() {
            return {
                form: {
                    search: this.filters.search,
                },
            }
        },
        watch: {
            form: {
                handler: throttle(function() {
                    let query = pickBy(this.form)
                    this.$inertia.replace(this.route('dashboard', Object.keys(query).length ? query : { remember: 'forget' }))
                }, 150),
                deep: true,
            },
        },
        methods: {
            fecha(fe) {
                let f = new Date(fe);
                let mes = f.getMonth() + 1;
                let fechaStr = f.getDate() + '/'  + mes + '/' + f.getFullYear();
                return fechaStr;
            }
        }
    }
</script>
