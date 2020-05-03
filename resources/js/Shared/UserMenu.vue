<template>
    <div class="w-240p mt-3 shadow-sm bg-gray-200 rounded text-sm">
        <div class="flex flex-col py-1 rounded-md bg-white shadow-md">
            <div v-if="$page.wink.author">
                <inertia-link class="flex items-center px-3 py-2 hover:bg-teal-600 group" :href="route('admin.authors.edit', $page.wink.author.id)">
                    <icon-base width="14" height="14" icon-fill="fill-teal-500" icon-name="profile" classes="mr-2 group-hover:fill-white">
                        <profile />
                    </icon-base>
                    <span class="text-teal-600 group-hover:text-white text-base font-normal">My Profile</span>
                </inertia-link>
                <inertia-link class="flex items-center px-3 py-2 hover:bg-teal-600 group" :href="route('admin.authors.index')">
                    <icon-base width="14" height="14" icon-fill="fill-teal-500" icon-name="users" classes="mr-2 group-hover:fill-white">
                        <users />
                    </icon-base>
                    <span class="text-teal-600 group-hover:text-white text-base font-normal">Manage Users</span>
                </inertia-link>
                <inertia-link class="flex items-center px-3 py-2 hover:bg-teal-600 group" :href="route('admin.posts.index')">
                    <icon-base width="14" height="14" icon-fill="fill-teal-500" icon-name="posts" classes="mr-2 group-hover:fill-white">
                        <newspaper />
                    </icon-base>
                    <span class="text-teal-600 group-hover:text-white text-base font-normal">Manage Posts</span>
                </inertia-link>
                <inertia-link class="flex items-center px-3 py-2 hover:bg-teal-600 group" :href="route('admin.news.create')">
                    <icon-base width="14" height="14" icon-fill="fill-teal-500" icon-name="users" classes="mr-2 group-hover:fill-white">
                        <list-add />
                    </icon-base>
                    <span class="text-teal-600 group-hover:text-white text-base font-normal">Quick News Item</span>
                </inertia-link>
                <inertia-link class="flex items-center px-3 py-2 hover:bg-teal-600 group" :href="route('admin.tshirts.index')">
                    <icon-base width="14" height="14" icon-fill="fill-teal-500" icon-name="purchases" classes="mr-2 group-hover:fill-white">
                        <shirt />
                    </icon-base>
                    <span class="text-teal-600 group-hover:text-white text-base font-normal">Manage Purchases</span>
                </inertia-link>
                <inertia-link class="flex items-center px-3 py-2 hover:bg-teal-600 group" :href="route('logout')" method="post">
                    <icon-base width="14" height="14" icon-fill="fill-teal-500" icon-name="logout" classes="mr-2 group-hover:fill-white">
                        <logout />
                    </icon-base>
                    <span class="text-teal-600 group-hover:text-white text-base font-normal">Logout</span>
                </inertia-link>
            </div>
            <a v-else class="flex items-center px-3 py-2 hover:bg-teal-600 group" :href="route('login.form')">
                <icon-base width="14" height="14" icon-fill="fill-teal-500" icon-name="login" classes="mr-2 group-hover:fill-white">
                    <lock-closed />
                </icon-base>
                <span class="text-teal-600 group-hover:text-white text-base font-normal">Login</span>
            </a>
        </div>
    </div>
</template>

<script>
import IconBase from '@/Shared/IconBase';
import Users from '@/Shared/Icons/Users';
import Logout from '@/Shared/Icons/Logout';
import ListAdd from '@/Shared/Icons/ListAdd';
import LockClosed from '@/Shared/Icons/LockClosed';
import Newspaper from '@/Shared/Icons/Newspaper';
import Profile from '@/Shared/Icons/Profile';
import Shirt from '@/Shared/Icons/Shirt';

export default {
    components: {
        Users,
        Shirt,
        Logout,
        Profile,
        ListAdd,
        IconBase,
        Newspaper,
        LockClosed,
    },
}
</script>
