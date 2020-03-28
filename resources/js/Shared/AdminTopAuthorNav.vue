<template>
    <div class="flex w-full items-center mb-2 px-4 md:px-0">
        <inertia-link v-if="! onIndexPage && ! onNonAuthorsPage" class="flex items-center px-3 py-2 border border-teal-500 text-teal-500 hover:bg-teal-500 hover:text-white text-base group" :href="route('admin.authors.index')">
            <icon-base width="16" height="16" icon-fill="fill-teal-500" icon-name="back" classes="mr-2 group-hover:fill-white">
                <arrow-left />
            </icon-base>
            Back To Authors
        </inertia-link>
        <div class="ml-auto flex items-center">
            <loading-button v-if="currentlyEditingAuthor" :loading="saving" theme="dark" type="button" class="flex items-center px-3 py-2 text-base cursor-pointer group" :class="saveButtonColors" href="#" @clicked="saveClicked()">
                <icon-base width="16" height="16" icon-name="save" classes="mr-2 group-hover:fill-white" :class="saveIconColors">
                    <save />
                </icon-base>
                Save
            </loading-button>
            <inertia-link v-if="onIndexPage" class="flex items-center px-3 py-2 border border-teal-500 text-teal-500 hover:bg-teal-500 hover:text-white text-base group" :class="rightBorderForNewAuthor" :href="route('admin.authors.edit', { id: 'new' })">
                <icon-base width="16" height="16" icon-fill="fill-teal-500" icon-name="new author" classes="mr-2 group-hover:fill-white">
                    <user-add />
                </icon-base>
                New Author
            </inertia-link>
        </div>
    </div>
</template>

<script>
import ArrowLeft from '@/Shared/Icons/ArrowLeft';
import Hub from 'Events/hub';
import IconBase from '@/Shared/IconBase';
import LoadingButton from '@/Shared/LoadingButton';
import Save from '@/Shared/Icons/Save';
import UserAdd from '@/Shared/Icons/UserAdd';

export default {
    store: ['workingAuthor'],
    components: {
        Save,
        UserAdd,
        IconBase,
        ArrowLeft,
        LoadingButton,
    },
    data () {
        return {
            saving: false,
        }
    },
    computed: {
        currentlyEditingAuthor () {
            return this.workingAuthor.id !== '' && this.pathEndsWith('edit');
        },
        canPublish () {
            return this.workingAuthor.id !== '' && this.workingAuthor.published == false;
        },
        canUnpublish () {
            return this.workingAuthor.id !== '' && this.workingAuthor.published == true;
        },
        onIndexPage () {
            return (this.pathEndsWith('authors') || this.pathEndsWith('authors/'));
        },
        onNonAuthorsPage () {
            if (this.isPath('admin/tshirts') || this.isPath('admin/news') || this.isPath('admin/posts')) {
                return true;
            }

            return false;
        },
        rightBorderForNewAuthor () {
            if(! this.onIndexPage) {
                return 'border-r-0';
            }

            return '';
        },
        saveButtonColors () {
            return `${this.saving ? 'bg-teal-500 text-white border border-teal-500' : 'border border-teal-500 text-teal-500'} hover:bg-teal-500 hover:text-white`;
        },
        saveIconColors () {
            return `${this.saving ? 'fill-white' : 'fill-teal-500'}`;
        },
    },
    created () {
        Hub.$listen('authorSaving', () => {
            this.saving = true;
        });
        Hub.$listen('authorFinishedSaving', () => {
            setTimeout(() => {
                this.saving = false;
            }, 1000);
        });
    },
    methods: {
        saveClicked () {
            Hub.$dispatch('saveAuthorClicked');
        },
    },
}
</script>
