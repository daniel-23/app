<template>
    <app-layout>
        
        
            <!-- Content Header (Page header) -->
            <template #header>
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Users</li>
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
                                        <div class="col-sm"><h3 class="card-title">Users list</h3></div>
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
                                            <inertia-link :href="route('users.create')" class="btn btn-success btn-sm float-right">Crear</inertia-link>
                                        </div>
                                    </div>
                                        
                                    
                                    

                                        
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Created at</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="user in users.data">
                                                <td>{{ user.id }}</td>
                                                <td>{{ user.name }}</td>
                                                <td>{{ user.email }}</td>
                                                <td>{{ user.created_at }}</td>
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
        metaInfo: { title: 'Users' },
        components: {
            AppLayout,
        },
        props: ['users']
    }
</script>
