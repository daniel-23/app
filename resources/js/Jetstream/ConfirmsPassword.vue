<template>
    <span>
        <span @click="startConfirmingPassword">
            <slot />
        </span>

        <jet-dialog-modal :show="confirmingPassword" @close="closeModal">
            <template #title>
                {{ __(title) }}
            </template>

            <template #content>
                <p class="mb-2">{{ __(content) }}</p>
                

                <div class="form-group">
                    <jet-input type="password" :class="{'is-invalid': form.error}" :placeholder="__('Password')"
                                ref="password"
                                v-model="form.password"
                                @keyup.enter.native="confirmPassword" />

                    <jet-input-error :message="form.error" class="mt-2" />
                </div>
            </template>

            <template #footer>
                <jet-secondary-button @click.native="closeModal" data-dismiss="modal">
                    {{ __('Nevermind') }}
                </jet-secondary-button>

                <jet-button class="ml-2" @click.native="confirmPassword" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    {{ __(button) }}
                </jet-button>
            </template>
        </jet-dialog-modal>
    </span>
</template>

<script>
    import JetButton from './Button'
    import JetDialogModal from './DialogModal'
    import JetInput from './Input'
    import JetInputError from './InputError'
    import JetSecondaryButton from './SecondaryButton'

    export default {
        props: {
            title: {
                default: 'Confirm Password',
            },
            content: {
                default: 'For your security, please confirm your password to continue.',
            },
            button: {
                default: 'Confirm',
            }
        },

        components: {
            JetButton,
            JetDialogModal,
            JetInput,
            JetInputError,
            JetSecondaryButton,
        },

        data() {
            return {
                confirmingPassword: false,
                form: {
                    password: '',
                    error: '',
                },
            }
        },

        methods: {
            startConfirmingPassword() {
                axios.get(route('password.confirmation')).then(response => {
                    console.log("response", response.data);
                    if (response.data.confirmed) {
                        this.$emit('confirmed');
                    } else {
                        this.confirmingPassword = true;
                        $('#modal-password-confirm').modal();

                        setTimeout(() => this.$refs.password.focus(), 250)
                    }
                })
            },

            confirmPassword() {
                this.form.processing = true;
                
                

                axios.post(route('password.confirm'), {
                    password: this.form.password,
                }).then(() => {
                    $('#modal-password-confirm').modal();
                    this.form.processing = false;
                    this.closeModal()
                    this.$nextTick(() => this.$emit('confirmed'));
                }).catch(error => {
                    this.form.processing = false;
                    this.form.error = error.response.data.errors.password[0];
                    this.$refs.password.focus()
                });
            },

            closeModal() {
                $('#modal-password-confirm').modal('hide');
                this.confirmingPassword = false
                this.form.password = '';
                this.form.error = '';
            },
        }
    }
</script>
