<template>
    <app-layout>
        <!-- Content Header (Page header) -->
            <template #header>
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ __('Users') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"> <inertia-link :href="route('users.index')">Users</inertia-link></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div><!-- /.col -->
            </template>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Create User</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <pre>{{ $page }}</pre>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    
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
        metaInfo: { title: 'Create Users' },
        components: {
            AppLayout,
        },
        
    }
</script>
