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
                    <div class="row">
                        <div class="col-12">
                            <jet-form-section @submitted="createUser">
                                <template #title>
                                    {{ __('Create user') }}
                                </template>

                                <template #form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <jet-label for="name" value="Name" />
                                                <jet-input id="name" type="text" :class="{'is-invalid': form.errors.name}" v-model="form.name" autocomplete="name" />
                                                <jet-input-error :message="form.errors.name" />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <jet-label for="email" value="E-Mail Address" />
                                                <jet-input id="email" type="email" :class="{'is-invalid': form.errors.email}" v-model="form.email" autocomplete="email" />
                                                <jet-input-error :message="form.errors.email" />
                                            </div>
                                        </div>
                                    </div>
                                        
                                </template>

                                <template #actions>
                                    <jet-action-message :on="form.recentlySuccessful" class="alert alert-success" v-show="form.recentlySuccessful">
                                        {{ __('Saved.') }}
                                    </jet-action-message>

                                    <jet-button :class="{ 'opacity-25': form.processing }" class="float-right" :disabled="form.processing">
                                        {{ __('Save') }}
                                    </jet-button>
                                </template>
                                
                            </jet-form-section>
                        </div>
                            
                    </div>
                        
                    
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'

    export default {
        metaInfo: { title: 'Create Users' },
        components: {
            AppLayout,
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
        },

        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    email: '',
                    
                })
            }
        },


        methods: {
            createUser() {
                this.form.post(route('users.store'), {
                    preserveScroll: true
                });
            },
        },
        
    }
</script>
