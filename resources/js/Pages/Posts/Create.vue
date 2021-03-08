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
                            <jet-form-section @submitted="createPost">
                                <template #title>
                                    {{ __('Create post') }}
                                </template>

                                <template #form>
                                    <div class="form-group">
                                        <jet-label for="title" value="Title" />
                                        <jet-input id="title" type="text" :class="{'is-invalid': form.errors.title}" v-model="form.title" autocomplete="title" />
                                        <jet-input-error :message="form.errors.title" />
                                    </div>

                                    <div class="form-group">
                                        <jet-label for="description" value="Description" />
                                        <textarea id="description" v-model="form.description" class="form-control" :class="{'is-invalid': form.errors.description}" rows="3" style="resize: none;"></textarea>
                                        <jet-input-error :message="form.errors.description" />
                                    </div>
                                    <div class="mb-3">
                                        <textarea
                                            class="textarea"
                                            :class="{'is-invalid': form.errors.content}"
                                            :placeholder="__('Content')"
                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                            >
                                        </textarea>
                                        <jet-input-error :message="form.errors.content" />
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="is-public" v-model="form.is_public">
                                            <label for="is-public" class="custom-control-label">{{ __('Is public') }}</label>
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
                    <!-- /.row -->
                    <div class="row">
                        <pre>{{ form }}</pre>
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
        metaInfo: { title: 'Create post' },
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
        mounted() {
            
            $('.textarea').summernote();
        },
        data() {
            return {
                form: this.$inertia.form({
                    title: '',
                    description: '',
                    content: '',
                    is_public: false,
                })
            }
        },

        methods: {
            createPost() {
                let content = $('.note-editable').html();
                if (content == '<p><br></p>') {
                    content = '';
                }

                this.form.content  = content;
                this.form.post(route('posts.store'), {
                    preserveScroll: true
                });
            },
        },
    }
</script>
