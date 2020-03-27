<template>
    <div>
        <modal-component name="dialogModal" width="80%" :max-width="400" :adaptive="true" :delay="250" height="auto" class="text-center center" @before-open="beforeOpenDialog($event)">
            <dialog-modal :title="dialog.title" :text="dialog.text" :buttons="dialog.buttons" />
        </modal-component>
        <modal-component name="confirmModal" width="80%" :max-width="400" :adaptive="true" :delay="250" height="auto" class="text-center center" @before-open="beforeOpenConfirm($event)">
            <confirm-modal :title="confirm.title" :text="confirm.text" :buttons="confirm.buttons" />
        </modal-component>
    </div>
</template>

<script>
import DialogModal from '@/Modals/DialogModal';
import ConfirmModal from '@/Modals/ConfirmModal';

export default {
    components: {
        DialogModal,
        ConfirmModal,
    },
    data () {
        return {
            dialog: {
                title: null,
                text: null,
                buttons: [],
            },
            confirm: {
                title: null,
                text: null,
                buttons: [],
            },
        }
    },
    methods: {
        beforeOpenDialog (event) {
            this.dialog.title = event.params.title;
            this.dialog.text = event.params.text;
            this.dialog.buttons = event.params.buttons;
        },
        beforeOpenConfirm (event) {
            this.confirm.title = event.params.title;
            this.confirm.text = event.params.text;
            this.confirm.buttons = event.params.buttons;
        },
    },
}
</script>
