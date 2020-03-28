<template>
    <layout title="Posts">
        <portal v-if="isPath('admin')" to="AdminTopPostNav">
            <admin-top-post-nav />
        </portal>
        <div class="w-full bg-white pt-4">
            <div class="container">
                <div v-if="! isEmpty(posts)" class="w-full p-6">
                    <item-list :data="posts" entity-name="admin.posts" row-action="edit" not-found-message="No posts found." :header-fields="headerFields" />
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
import AdminTopPostNav from '@/Shared/AdminTopPostNav';
import ItemList from '@/Shared/ItemList';
import Layout from '@/Shared/Layout';

export default {
    components: {
        Layout,
        ItemList,
        AdminTopPostNav,
    },
    props: {
        posts: {
            type: [Array, Object],
            default: () => ({}),
        },
    },
    data () {
        return {
            headerFields: [
                {
                    name: 'title',
                    label: 'Title',
                },
                {
                    name: 'limited_excerpt',
                    label: 'Excerpt',
                },
                {
                    name: 'published',
                    label: 'Published',
                },
                {
                    name: 'readable_publish_date',
                    label: 'Created',
                },
            ],
        }
    },
}
</script>
