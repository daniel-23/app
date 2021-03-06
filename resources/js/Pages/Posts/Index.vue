<template>
    <app-layout>
        
        
            <!-- Content Header (Page header) -->
            <template #header>
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Posts') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">{{ __('Posts') }}</li>
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
                                    <div class="row">
                                        <div class="col-sm"><h3 class="card-title">{{ __('My Posts') }}</h3></div>
                                        <div class="col-sm">
                                            <div class="card-tools">
                                                <div class="input-group input-group-sm">
                                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <inertia-link :href="route('posts.create')" class="btn btn-success btn-sm float-right">{{ __('Create post') }}</inertia-link>
                                        </div>
                                    </div>
                                        
                                    
                                    

                                        
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>{{ __('Title') }}</th>
                                                <th>{{ __('Description') }}</th>
                                                <th>{{ __('Created at') }}</th>
                                                <th>{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="post in posts.data">
                                                <td>{{ post.id }}</td>
                                                <td>{{ post.title }}</td>
                                                <td>{{ post.description }}</td>
                                                <td>{{ post.created_at }}</td>
                                                <td><span class="tag tag-success">Approved</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.card -->
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
        metaInfo: { title: 'Post' },
        components: {
            AppLayout,
        },
        props: ['posts']
    }
</script>
