<template>
    <app-layout>
        <!-- Content Header (Page header) -->
        <template #header>
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Users') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">{{ __('Users') }}</li>
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
                                    <div class="col-sm"><h3 class="card-title">{{ __('Users list') }}</h3></div>
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
                                        <inertia-link :href="route('users.create')" class="btn btn-success btn-sm float-right">{{ __('Create') }}</inertia-link>
                                    </div>
                                </div>
                                    
                                
                                

                                    
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('E-Mail Address') }}</th>
                                            <th>{{ __('Created at') }}</th>
                                            <th>{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="user in users.data">
                                            <td>{{ user.id }}</td>
                                            <td>{{ user.name }}</td>
                                            <td>{{ user.email }}</td>
                                            <td>{{ fecha(user.created_at) }}</td>
                                            <td>
                                                <inertia-link :href="route('users.edit',user)" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></inertia-link>
                                            </td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <pagination :links="users.links" class="float-right" />
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
    import Pagination from '@/Shared/Pagination'
    import pickBy from 'lodash/pickBy'
    import throttle from 'lodash/throttle'

    export default {
        metaInfo: { title: 'Users' },
        components: {
            AppLayout,
            Pagination,
        },
        props: ['users','filters'],
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
                    this.$inertia.replace(this.route('users.index', Object.keys(query).length ? query : { remember: 'forget' }))
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
