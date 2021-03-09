<template>
    <app-layout>
        <template #header>
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Posts') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"> <inertia-link :href="route('posts.index')">{{ __('Posts') }}</inertia-link></li>
                    <li class="breadcrumb-item active">{{ __('Edit') }}</li>
                </ol>
            </div><!-- /.col -->
        </template>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <jet-form-section @submitted="updatePost">
                            <template #title>
                                {{ __('Edit post') }}
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
                                        v-model="form.content"
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
        metaInfo: { title: 'Edit post' },
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
        props: ['post'],
        mounted() {
            
            $('.textarea').summernote();
        },
        data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    title: this.post.title,
                    description: this.post.description,
                    content: this.post.content,
                    is_public: this.post.is_public,
                })
            }
        },

        methods: {
            updatePost() {
                let content = $('.note-editable').html();
                if (content == '<p><br></p>') {
                    content = '';
                }

                this.form.content  = content;
                this.form.post(route('posts.update',this.post), {
                    preserveScroll: true
                });
            },
        },
    }
</script>
