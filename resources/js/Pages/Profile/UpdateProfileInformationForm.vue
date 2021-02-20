<template>
    <jet-form-section @submitted="updateProfileInformation">
        <template #title>
            Profile Information
        </template>

        <template #description>
            Update your account's profile information and email address.
        </template>

        <template #form>
            <!-- Profile Photo -->
            <div class="col-12" v-if="$page.props.jetstream.managesProfilePhotos">
                <!-- Profile Photo File Input -->
                <input type="file" class="d-none"
                ref="photo"
                @change="updatePhotoPreview">

                <jet-label for="photo" value="Photo" />

                <!-- Current Profile Photo -->
                <div class="text-center" v-show="! photoPreview">
                    <img :src="user.profile_photo_url" :alt="user.name" class="img-circle img-fluid" style="max-width: 150px;">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2 text-center" v-show="photoPreview">
                    <img :src="photoPreview" :alt="user.name" class="img-circle img-fluid" style="max-width: 150px;">
                </div>
                <div class="text-center">
                    <jet-secondary-button class="mt-2 mr-2" type="button" @click.native.prevent="selectNewPhoto">
                        {{ __('Select A New Photo') }}
                    </jet-secondary-button>

                    <jet-secondary-button type="button" class="mt-2" @click.native.prevent="deletePhoto" v-if="user.profile_photo_path">
                        {{ __('Remove Photo') }}
                    </jet-secondary-button>
                </div>

                    
                <div class="text-center">
                    
                </div>
                <jet-input-error :message="form.errors.photo" class="mt-2" />
            </div>

            <!-- Name -->
            <div class="form-group">
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" :class="{'is-invalid': form.errors.name}"  v-model="form.name" autocomplete="name" />
                <jet-input-error :message="form.errors.name" />
            </div>

            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="email" value="E-Mail Address" />
                <jet-input id="email" type="email" :class="{'is-invalid': form.errors.email}" v-model="form.email" />
                <jet-input-error :message="form.errors.email" />
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
</template>

<script>
    import JetButton from '@/Jetstream/Button'
    import JetFormSection from '@/Jetstream/FormSection'
    import JetInput from '@/Jetstream/Input'
    import JetInputError from '@/Jetstream/InputError'
    import JetLabel from '@/Jetstream/Label'
    import JetActionMessage from '@/Jetstream/ActionMessage'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'

    export default {
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
        },

        props: ['user'],

        data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    name: this.user.name,
                    email: this.user.email,
                    photo: null,
                }),

                photoPreview: null,
            }
        },

        methods: {
            updateProfileInformation() {
                if (this.$refs.photo) {
                    this.form.photo = this.$refs.photo.files[0]
                }

                this.form.post(route('user-profile-information.update'), {
                    errorBag: 'updateProfileInformation',
                    preserveScroll: true
                });
            },

            selectNewPhoto() {
                this.$refs.photo.click();
            },

            updatePhotoPreview() {
                const reader = new FileReader();

                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };

                reader.readAsDataURL(this.$refs.photo.files[0]);
            },

            deletePhoto() {
                this.$inertia.delete(route('current-user-photo.destroy'), {
                    preserveScroll: true,
                    onSuccess: () => (this.photoPreview = null),
                });
            },
        },
    }
</script>
