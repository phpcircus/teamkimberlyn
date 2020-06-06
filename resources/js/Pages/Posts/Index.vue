<template>
    <layout title="Blog Home">
        <div class="flex flex-col w-full -mt-16">
            <featured-post v-if="featured" :featured="featured" />
            <paginated-posts v-if="older" :posts="older" :links="links" />
            <template v-if="! older && ! featured">
                <div class="w-full mt-16 text-center bg-white shadow-md md:mt-24">
                    <h1 class="text-3xl text-purple-700 font-damion">
                        No posts available at this time.<br />Check back soon!
                    </h1>
                </div>
            </template>
        </div>
    </layout>
</template>

<script>
import Layout from '@/Shared/Layout';
import FeaturedPost from '@/Shared/FeaturedPost';
import PaginatedPosts from '@/Shared/PaginatedPosts';

export default {
    components: {
        Layout,
        FeaturedPost,
        PaginatedPosts,
    },
    props: {
        posts: {
            type: [Object,Array],
            default: () => ({}),
        },
    },
    data () {
        return {
            featured: {},
            older: [],
            links: [],
        }
    },
    created () {
        this.featured = this.posts.data.length > 0 ? this.posts.data[0] : null;
        let posts = this.posts.data;
        this.links = this.posts.links;
        this.older = Array.isArray(posts) && posts.length > 0 ? this.setOlderPosts(posts) : null;
    },
    methods: {
        setOlderPosts (posts) {
            posts.shift();

            return posts;
        },
    },
}
</script>
