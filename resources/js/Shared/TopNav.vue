<template>
    <nav x-data="{ mobileOpen: false, quicknewsOpen: false, userOpen: false }" class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <img class="block lg:hidden h-8 w-auto" src="/img/colorectal_cancer_logo.png" alt="Colorectal cancer awareness" />
                        <img class="hidden lg:block h-8 w-auto" src="/img/colorectal_cancer_logo.png" alt="Colorectal cancer awareness" />
                    </div>
                    <div class="hidden md:ml-6 md:flex md:items-center">
                        <inertia-link :href="route('home')"
                                      class="px-3 py-2 rounded-md text-sm font-medium leading-5 focus:outline-none focus:text-white focus:bg-teal-600 transition duration-150 ease-in-out"
                                      :class=" isPath('posts') ? 'bg-teal-600 text-white' : 'bg-white text-teal-600'"
                        >
                            Home
                        </inertia-link>
                        <a href="https://gofundme.com/help-kimberlyn-fight-cancer" target="_blank" class="ml-4 px-3 py-2 rounded-md text-sm text-teal-600 font-medium leading-5 bg-white hover:text-white hover:bg-teal-600 focus:outline-none focus:text-white focus:bg-teal-600 transition duration-150 ease-in-out">Gofundme</a>
                        <a href="#"
                           class="ml-4 px-3 py-2 rounded-md text-sm text-teal-600 font-medium leading-5 hover:text-white hover:bg-teal-600 transition duration-150 ease-in-out"
                           x-on:click.prevent="quicknewsOpen = ! quicknewsOpen"
                        >
                            Quick News
                        </a>
                        <inertia-link :href="route('tshirt.create')"
                                      class="ml-4 px-3 py-2 rounded-md text-sm font-medium leading-5 hover:text-white hover:bg-teal-600 focus:outline-none focus:text-white focus:bg-teal-600 transition duration-150 ease-in-out"
                                      :class="isPath('tshirt') ? 'bg-teal-600 text-white' : 'bg-white text-teal-600'"
                        >
                            Team Kimberlyn T-shirts
                        </inertia-link>
                    </div>
                </div>
                <div class="-ml-2 mr-2 flex items-center md:hidden">
                    <!-- Mobile menu button -->
                    <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white transition duration-150 ease-in-out"
                            x-on:click="mobileOpen = ! mobileOpen"
                    >
                        <svg x-bind:class="mobileOpen ? 'hidden' : 'block'" class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-bind:class="mobileOpen ? 'block' : 'hidden'" x-cloak class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="hidden md:flex items-center">
                    <div class="md:ml-4 md:flex-shrink-0 md:flex md:items-center">
                        <!-- Profile dropdown -->
                        <div class="ml-3 relative">
                            <div>
                                <button class="flex text-sm brounded-full focus:outline-none transition duration-150 ease-in-out" x-on:click="userOpen = ! userOpen">
                                    <img v-if="$page.wink.author" class="h-8 w-8 rounded-full" :src="$page.wink.author.avatar" :alt="$page.wink.author.email" />
                                    <div v-else class="flex text-teal-500 focus:text-teal-300 px-4 py-1 mr-1 whitespace-no-wrap group">
                                        <icon-base icon-name="user" icon-fill="fill-teal-500" classes="text-lg ml-1 mt-1 group-hover:fill-teal-300">
                                            <user />
                                        </icon-base>
                                        <icon-base icon-name="cheveron-down" icon-fill="fill-teal-500" classes="text-lg ml-1 mt-1 group-hover:fill-teal-300">
                                            <cheveron-down />
                                        </icon-base>
                                    </div>
                                </button>
                            </div>
                            <div id="userDropdownMenu"
                                 x-show="userOpen"
                                 x-cloak
                                 class="origin-top-right absolute right-30 xl:right-0 mt-2 w-48 rounded-md shadow-lg z-20"
                                 x-on:click.away="userOpen = false"
                                 x-transition:enter="transition ease-out duration-500 transform"
                                 x-transition:enter-start="opacity-0 scale-50"
                                 x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-300 transform"
                                 x-transition:leave-start="opacity-100 scale-100"
                                 x-transition:leave-end="opacity-0 scale-50"
                            >
                                <user-menu />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="quicknewsMenu"
                 x-show="quicknewsOpen"
                 x-cloak
                 class="w-1/3 absolute top-25 left-50 bg-white shadow-md rounded-lg z-20"
                 x-transition:enter="transition ease-out duration-500 transform"
                 x-on:click.away="quicknewsOpen = false"
                 x-transition:enter-start="opacity-0 scale-50"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-300 transform"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-50"
            >
                <quick-news />
            </div>
        </div>
        <div x-show="mobileOpen" x-cloak x-on:click.away="mobileOpen = false">
            <div class="px-2 pt-2 pb-3 sm:px-3">
                <inertia-link :href="route('home')"
                              class="block px-3 py-2 rounded-md text-base font-medium focus:outline-none focus:text-white focus:bg-teal-600 transition duration-150 ease-in-out"
                              :class="isPath('posts') ? 'bg-teal-600 text-white' : 'bg-white text-teal-600'"
                >
                    Home
                </inertia-link>
                <a href="https://gofundme.com/help-kimberlyn-fight-cancer"
                   class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-teal-600 hover:text-white hover:bg-teal-600 focus:outline-none focus:text-white transition duration-150 ease-in-out"
                >
                    Gofundme
                </a>
                <a href="#"
                   class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-teal-600 hover:text-white hover:bg-teal-600 focus:outline-none focus:text-white transition duration-150 ease-in-out"
                   x-on:click.prevent="quicknewsOpen = ! quicknewsOpen"
                >
                    Quick News
                </a>
                <a href="#"
                   class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-teal-600 hover:text-white hover:bg-teal-600 focus:outline-none focus:text-white focus:bg-teal-600 transition duration-150 ease-in-out"
                   :class="isPath('tshirt') ? 'bg-teal-600 text-white' : 'bg-white text-teal-600'"
                >
                    Team Kimberlyn T-shirts
                </a>
            </div>
            <div class="pt-4 pb-3 border-t border-gray-700">
                <div v-if="$page.wink.author" class="flex items-center px-5 sm:px-6">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" :src="$page.wink.author.avatar" :alt="$page.wink.author.email" />
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-6 text-teal-600">{{ $page.wink.author.name }}</div>
                        <div class="text-sm font-medium leading-5 text-gray-600">{{ $page.wink.author.email }}</div>
                    </div>
                </div>
                <div class="mt-3 px-2 sm:px-3">
                    <div v-if="$page.wink.author">
                        <inertia-link class="flex items-center px-3 py-2 hover:bg-gray-700 rounded-md group" :href="route('admin.authors.edit', $page.wink.author.id)">
                            <icon-base width="14" height="14" icon-fill="fill-gray-800" icon-name="profile" classes="mr-2 group-hover:fill-white">
                                <profile />
                            </icon-base>
                            <span class="text-gray-700 group-hover:text-white text-base font-normal">My Profile</span>
                        </inertia-link>
                        <inertia-link class="flex items-center px-3 py-2 hover:bg-gray-700 text-base rounded-md group" :href="route('admin.authors.index')">
                            <icon-base width="14" height="14" icon-fill="fill-gray-800" icon-name="users" classes="mr-2 group-hover:fill-white">
                                <users />
                            </icon-base>
                            <span class="text-gray-700 group-hover:text-white text-base font-normal">Manage Users</span>
                        </inertia-link>
                        <inertia-link class="flex items-center px-3 py-2 hover:bg-gray-700 text-base rounded-md group" :href="route('admin.posts.index')">
                            <icon-base width="14" height="14" icon-fill="fill-gray-800" icon-name="posts" classes="mr-2 group-hover:fill-white">
                                <newspaper />
                            </icon-base>
                            <span class="text-gray-700 group-hover:text-white text-base font-normal">Manage Posts</span>
                        </inertia-link>
                        <inertia-link class="flex items-center px-3 py-2 hover:bg-gray-700 text-base rounded-md group" :href="route('admin.news.create')">
                            <icon-base width="14" height="14" icon-fill="fill-gray-800" icon-name="users" classes="mr-2 group-hover:fill-white">
                                <list-add />
                            </icon-base>
                            <span class="text-gray-700 group-hover:text-white text-base font-normal">Manage Quick News</span>
                        </inertia-link>
                        <inertia-link class="flex items-center px-3 py-2 hover:bg-gray-700 text-base rounded-md group" :href="route('admin.tshirts.index')">
                            <icon-base width="14" height="14" icon-fill="fill-gray-800" icon-name="purchases" classes="mr-2 group-hover:fill-white">
                                <shirt />
                            </icon-base>
                            <span class="text-gray-700 group-hover:text-white text-base font-normal">Manage Purchases</span>
                        </inertia-link>
                        <inertia-link class="flex items-center px-3 py-2 hover:bg-gray-700 text-base rounded-md group"
                                      :href="route('logout')"
                                      method="POST"
                        >
                            <icon-base width="14" height="14" icon-fill="fill-gray-800" icon-name="logout" classes="mr-2 group-hover:fill-white">
                                <logout />
                            </icon-base>
                            <span class="text-gray-700 group-hover:text-white text-base font-normal">Logout</span>
                        </inertia-link>
                    </div>
                    <div v-else>
                        <inertia-link class="flex items-center px-3 py-2 hover:bg-gray-700 text-base rounded-md group" :href="route('login.form')">
                            <icon-base width="14" height="14" icon-fill="fill-gray-800" icon-name="login" classes="mr-2 group-hover:fill-white">
                                <lock-closed />
                            </icon-base>
                            <span class="text-gray-700 group-hover:text-white text-base font-normal">Login</span>
                        </inertia-link>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import User from '@/Shared/Icons/User';
import QuickNews from '@/Shared/QuickNews';
import IconBase from '@/Shared/IconBase';
import UserMenu from '@/Shared/UserMenu';
import CheveronDown from '@/Shared/Icons/CheveronDown';
import Profile from '@/Shared/Icons/Profile';
import Users from '@/Shared/Icons/Users';
import Newspaper from '@/Shared/Icons/Newspaper';
import ListAdd from '@/Shared/Icons/ListAdd';
import Shirt from '@/Shared/Icons/Shirt';
import Logout from '@/Shared/Icons/Logout';
import LockClosed from '@/Shared/Icons/LockClosed';

export default {
    components: {
        User,
        QuickNews,
        IconBase,
        UserMenu,
        CheveronDown,
        Profile,
        Users,
        Newspaper,
        ListAdd,
        Shirt,
        Logout,
        LockClosed,
    },
    computed: {
        linkColors () {
            if (this.backgroundColor === 'bg-white') {
                return 'text-purple-600 bg-white focus:text-white focus:bg-purple-600 hover:text-white hover:bg-purple-600';
            }

            return 'text-white bg-teal-500 focus:text-purple-600 focus:bg-white hover:text-purple-600 hover:bg-white';
        },
    },
}
</script>
