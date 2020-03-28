<template>
    <layout title="Authors">
        <portal v-if="isPath('admin')" to="AdminTopAuthorNav">
            <admin-top-author-nav />
        </portal>
        <div class="w-full bg-white pt-4">
            <div class="container">
                <div v-if="! isEmpty(authors)" class="w-full p-6">
                    <item-list :data="authors" entity-name="admin.authors" row-action="edit" not-found-message="No authors found." :header-fields="headerFields" />
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
import AdminTopAuthorNav from '@/Shared/AdminTopAuthorNav';
import ItemList from '@/Shared/ItemList';
import Layout from '@/Shared/Layout';

export default {
    components: {
        Layout,
        ItemList,
        AdminTopAuthorNav,
    },
    props: {
        authors: {
            type: [Array, Object],
            default: () => ({}),
        },
    },
    data () {
        return {
            headerFields: [
                {
                    name: 'name',
                    label: 'Name',
                },
                {
                    name: 'email',
                    label: 'Email',
                },
            ],
        }
    },
    created () {
        console.log(this.isPath('admin'));
    },
}
</script>
