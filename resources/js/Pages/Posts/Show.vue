<template>
    <app-layout>
        
        
            <!-- Content Header (Page header) -->
            <template #header>
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Posts') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"> <inertia-link :href="route('posts.index')">{{ __('Posts') }}</inertia-link></li>
                        <li class="breadcrumb-item active">{{ __('Show') }}</li>
                    </ol>
                </div><!-- /.col -->
            </template>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ post.title }} </h3>
                                    <span class="direct-chat-timestamp float-right">{{ fecha(post.created_at) }}</span>
                                </div>
                                <div class="card-body">
                                    <p>{{ post.description }}</p>
                                    <hr>
                                    <div v-html="post.content"></div>
                                </div>
                                <div v-if="canUpdatePost" class="card-footer">
                                    <inertia-link :href="route('posts.edit',post)" class="btn btn-primary">{{ __('Edit') }}</inertia-link>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        metaInfo: { title: 'Show post' },
        components: {
            AppLayout,
        },
        props: ['post','canUpdatePost'],
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
