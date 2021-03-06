<template>
    <jet-authentication-card>
        <template #logo>
            <jet-authentication-card-logo />
        </template>

        <jet-validation-errors class="mb-4" />

        <div v-if="status" class="alert alert-success">
            {{ status }}
        </div>
        <p class="login-box-msg">{{ __('Log in') }}</p>
        <form @submit.prevent="submit">

            <div class="input-group mb-3">

                <jet-input id="email" type="email" v-model="form.email" :placeholder="__('E-Mail Address')" required autofocus />
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <jet-input id="password" type="password" :placeholder="__('Password')" v-model="form.password" required autocomplete="current-password" />
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <jet-checkbox name="remember" id="remember" v-model="form.remember" />
                        <label for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <jet-button :class="{ 'opacity-25': form.processing }" class="btn-block" :disabled="form.processing">
                        {{ __('Login') }}
                    </jet-button>
                    
                </div>
                <!-- /.col -->
            </div>
            
        </form>
        <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            <a href="/auth/facebook" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
            </a>
        </div>
        <!-- /.social-auth-links -->

        <p class="mb-1 mt-3" v-if="canResetPassword">
            <inertia-link  :href="route('password.request')">{{ __('Forgot Your Password?') }}</inertia-link>
        </p>
        <p class="mb-0">
            <inertia-link :href="route('register')" class="text-center">
                {{ __('Register') }}
            </inertia-link>
        </p>
    </jet-authentication-card>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetCheckbox from '@/Jetstream/Checkbox'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors
        },

        props: {
            canResetPassword: Boolean,
            canRegister: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        },
        mounted() {

            $("body").addClass('login-page');
            $("body").removeClass('sidebar-mini');
            $("body").removeClass('layout-fixed');
            $("body").removeClass('hold-transition');
        }
    }
</script>
