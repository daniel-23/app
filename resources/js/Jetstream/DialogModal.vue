<template>
    <modal :max-width="maxWidth" :closeable="closeable" @close="close">
        <div class="modal-header">
            <h4 class="modal-title"><slot name="title"></slot></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <slot name="content"></slot>
        </div>
        <div class="modal-footer justify-content-between">
            <slot name="footer">
            </slot>
        </div>

    </modal>
</template>

<script>
    import Modal from './Modal'

    export default {
        components: {
            Modal,
        },

        props: {
            show: {
                default: false
            },
            maxWidth: {
                default: '2xl'
            },
            closeable: {
                default: true
            },
        },

        methods: {
            close() {
                this.$emit('close')
            },
        }
    }
</script>
