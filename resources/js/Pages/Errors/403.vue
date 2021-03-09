<template>
    <app-layout>
        <template #header>
            <div class="col-sm-6">
                <h1>403 Error Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">403 Error Page</li>
                </ol>
            </div>
        </template>

        <!-- Main content -->
        <section class="content">
            <div class="error-page">
                <h2 class="headline text-warning"> 403</h2>

                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>
                    <p>
                        We could not find the page you were looking for.
                        Meanwhile, you may <a href="../../index.html">return to dashboard</a> or try using the search form.
                    </p>

                    
                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
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
    }
</script>
