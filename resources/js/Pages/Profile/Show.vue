<template>
    <app-layout>
        <!-- Content Header (Page header) -->
        <template #header>
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('Profile') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">{{ __('Profile') }}</li>
                </ol>
            </div><!-- /.col -->
        </template>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-md-6" v-if="$page.props.jetstream.canUpdateProfileInformation">
                        <update-profile-information-form :user="$page.props.user" />
                    </div>

                    <div class="col-md-6" v-if="$page.props.jetstream.canUpdatePassword">
                        <update-password-form />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6" v-if="$page.props.jetstream.canManageTwoFactorAuthentication">
                        <two-factor-authentication-form />
                    </div>
                </div>

                

                


            </div>
        </section>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import DeleteUserForm from './DeleteUserForm'
    import JetSectionBorder from '@/Jetstream/SectionBorder'
    import LogoutOtherBrowserSessionsForm from './LogoutOtherBrowserSessionsForm'
    import TwoFactorAuthenticationForm from './TwoFactorAuthenticationForm'
    import UpdatePasswordForm from './UpdatePasswordForm'
    import UpdateProfileInformationForm from './UpdateProfileInformationForm'

    export default {
        metaInfo: { title: 'Profile' },
        props: ['sessions'],

        components: {
            AppLayout,
            DeleteUserForm,
            JetSectionBorder,
            LogoutOtherBrowserSessionsForm,
            TwoFactorAuthenticationForm,
            UpdatePasswordForm,
            UpdateProfileInformationForm,
        },
    }
</script>
