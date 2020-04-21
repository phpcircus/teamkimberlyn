<template>
    <div class="w-full">
        <div class="border-b border-gray-200 py-4 px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Quick News
            </h3>
        </div>
        <ul>
            <li v-for="article in $page.news" :key="article.id" class="py-4 px-6 hover:bg-gray-100 focus:outline-none focus:bg-gray-50 border-t border-gray-200 first:border-0 last:rounded-lg" @click="showNews(article.id)">
                <a :href="route('news.show', article.id)" class="block transition duration-150 ease-in-out">
                    <div>
                        <div class="flex items-center justify-between">
                            <div class="text-base leading-5 font-medium text-teal-500 truncate">
                                {{ article.title }}
                            </div>
                            <div class="ml-2 flex-shrink-0 flex">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{ article.readable_created_at }}
                                </span>
                            </div>
                        </div>
                        <div class="mt-2 sm:flex sm:justify-between">
                            <div class="sm:flex">
                                <div class="mr-6 flex items-center text-sm leading-5 text-gray-500">
                                    {{ article.excerpt }}
                                </div>
                            </div>
                            <div class="ml-auto mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                                <div class="flex items-center text-sm leading-5 text-gray-500">
                                    {{ article.author.name }}
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li v-if="! $page.news" class="py-4 px-6">
                <h3 class="text-base leading-5 font-medium text-teal-500">No articles available at this time.</h3>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    methods: {
        showNews (id) {
            this.$inertia.visit(this.route('news.show', id));
        },
    },
}
</script>
