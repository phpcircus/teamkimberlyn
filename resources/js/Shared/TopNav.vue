<template>
    <nav x-data="{ mobileOpen: false, quicknewsOpen: false, userOpen: false }" class="bg-white">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative flex justify-between h-16">
                <div class="flex">
                    <div class="flex items-center flex-shrink-0">
                        <img class="block w-auto h-8 lg:hidden" src="/img/colorectal_cancer_logo.png" alt="Colorectal cancer awareness" />
                        <img class="hidden w-auto h-8 lg:block" src="/img/colorectal_cancer_logo.png" alt="Colorectal cancer awareness" />
                    </div>
                    <div class="hidden md:ml-6 md:flex md:items-center">
                        <inertia-link :href="route('home')"
                                      class="px-3 py-2 text-sm font-medium leading-5 transition duration-150 ease-in-out rounded-md focus:outline-none focus:text-white focus:bg-teal-600"
                                      :class=" isPath('posts') ? 'bg-teal-600 text-white' : 'bg-white text-teal-600'"
                        >
                            Home
                        </inertia-link>
                        <a href="https://gofundme.com/help-kimberlyn-fight-cancer" target="_blank" class="px-3 py-2 ml-4 text-sm font-medium leading-5 text-teal-600 transition duration-150 ease-in-out bg-white rounded-md hover:text-white hover:bg-teal-600 focus:outline-none focus:text-white focus:bg-teal-600">Gofundme</a>
                        <a href="#"
                           class="px-3 py-2 ml-4 text-sm font-medium leading-5 text-teal-600 transition duration-150 ease-in-out rounded-md hover:text-white hover:bg-teal-600"
                           x-on:click.prevent="quicknewsOpen = ! quicknewsOpen"
                        >
                            Quick News
                        </a>
                        <inertia-link :href="route('tshirt.create')"
                                      class="px-3 py-2 ml-4 text-sm font-medium leading-5 transition duration-150 ease-in-out rounded-md hover:text-white hover:bg-teal-600 focus:outline-none focus:text-white focus:bg-teal-600"
                                      :class="isPath('tshirt') ? 'bg-teal-600 text-white' : 'bg-white text-teal-600'"
                        >
                            Team Kimberlyn T-shirts
                        </inertia-link>
                    </div>
                </div>
                <div class="flex items-center mr-2 -ml-2 md:hidden">
                    <!-- Mobile menu button -->
                    <button class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white"
                            x-on:click="mobileOpen = ! mobileOpen"
                    >
                        <svg x-bind:class="mobileOpen ? 'hidden' : 'block'" class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-bind:class="mobileOpen ? 'block' : 'hidden'" x-cloak class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="items-center hidden md:flex">
                    <div class="md:ml-4 md:flex-shrink-0 md:flex md:items-center">
                        <!-- Profile dropdown -->
                        <div class="relative ml-3">
                            <div>
                                <button class="flex text-sm transition duration-150 ease-in-out brounded-full focus:outline-none" x-on:click="userOpen = ! userOpen">
                                    <img v-if="$page.wink.author" class="w-8 h-8 rounded-full" :src="$page.wink.author.avatar" :alt="$page.wink.author.email" />
                                    <div v-else class="flex px-4 py-1 mr-1 text-teal-500 whitespace-no-wrap focus:text-teal-300 group">
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
                                 class="absolute z-20 w-48 mt-2 origin-top-right rounded-md shadow-lg right-30 xl:right-0"
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
                 class="absolute z-20 w-1/3 bg-white rounded-lg shadow-md top-25 left-50"
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
                              class="block px-3 py-2 text-base font-medium transition duration-150 ease-in-out rounded-md focus:outline-none focus:text-white focus:bg-teal-600"
                              :class="isPath('posts') ? 'bg-teal-600 text-white' : 'bg-white text-teal-600'"
                >
                    Home
                </inertia-link>
                <a href="https://gofundme.com/help-kimberlyn-fight-cancer"
                   class="block px-3 py-2 mt-1 text-base font-medium text-teal-600 transition duration-150 ease-in-out rounded-md hover:text-white hover:bg-teal-600 focus:outline-none focus:text-white"
                >
                    Gofundme
                </a>
                <a href="#"
                   class="block px-3 py-2 mt-1 text-base font-medium text-teal-600 transition duration-150 ease-in-out rounded-md hover:text-white hover:bg-teal-600 focus:outline-none focus:text-white"
                   x-on:click.prevent="quicknewsOpen = ! quicknewsOpen"
                >
                    Quick News
                </a>
                <inertia-link :href="route('tshirt.create')"
                              class="block px-3 py-2 mt-1 text-base font-medium transition duration-150 ease-in-out rounded-md active:text-white hover:text-white hover:bg-teal-600 focus:outline-none focus:text-white focus:bg-teal-600"
                              :class="isPath('tshirt') ? 'text-white bg-teal-600' : 'bg-white text-teal-600'"
                >
                    Team Kimberlyn T-shirts
                </inertia-link>
            </div>
            <div class="pt-4 pb-3 border-t border-gray-700">
                <div v-if="$page.wink.author" class="flex items-center px-5 sm:px-6">
                    <div class="flex-shrink-0">
                        <img class="w-10 h-10 rounded-full" :src="$page.wink.author.avatar" :alt="$page.wink.author.email" />
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium leading-6 text-teal-600">{{ $page.wink.author.name }}</div>
                        <div class="text-sm font-medium leading-5 text-gray-600">{{ $page.wink.author.email }}</div>
                    </div>
                </div>
                <div class="px-2 mt-3 sm:px-3">
                    <div v-if="$page.wink.author">
                        <inertia-link class="flex items-center px-3 py-2 rounded-md hover:bg-gray-700 group" :href="route('admin.authors.edit', $page.wink.author.id)">
                            <icon-base width="14" height="14" icon-fill="fill-gray-800" icon-name="profile" classes="mr-2 group-hover:fill-white">
                                <profile />
                            </icon-base>
                            <span class="text-base font-normal text-gray-700 group-hover:text-white">My Profile</span>
                        </inertia-link>
                        <inertia-link class="flex items-center px-3 py-2 text-base rounded-md hover:bg-gray-700 group" :href="route('admin.authors.index')">
                            <icon-base width="14" height="14" icon-fill="fill-gray-800" icon-name="users" classes="mr-2 group-hover:fill-white">
                                <users />
                            </icon-base>
                            <span class="text-base font-normal text-gray-700 group-hover:text-white">Manage Users</span>
                        </inertia-link>
                        <inertia-link class="flex items-center px-3 py-2 text-base rounded-md hover:bg-gray-700 group" :href="route('admin.posts.index')">
                            <icon-base width="14" height="14" icon-fill="fill-gray-800" icon-name="posts" classes="mr-2 group-hover:fill-white">
                                <newspaper />
                            </icon-base>
                            <span class="text-base font-normal text-gray-700 group-hover:text-white">Manage Posts</span>
                        </inertia-link>
                        <inertia-link class="flex items-center px-3 py-2 text-base rounded-md hover:bg-gray-700 group" :href="route('admin.news.create')">
                            <icon-base width="14" height="14" icon-fill="fill-gray-800" icon-name="users" classes="mr-2 group-hover:fill-white">
                                <list-add />
                            </icon-base>
                            <span class="text-base font-normal text-gray-700 group-hover:text-white">Manage Quick News</span>
                        </inertia-link>
                        <inertia-link class="flex items-center px-3 py-2 text-base rounded-md hover:bg-gray-700 group" :href="route('admin.tshirts.index')">
                            <icon-base width="14" height="14" icon-fill="fill-gray-800" icon-name="purchases" classes="mr-2 group-hover:fill-white">
                                <shirt />
                            </icon-base>
                            <span class="text-base font-normal text-gray-700 group-hover:text-white">Manage Purchases</span>
                        </inertia-link>
                        <inertia-link class="flex items-center px-3 py-2 text-base rounded-md hover:bg-gray-700 group"
                                      :href="route('logout')"
                                      method="POST"
                        >
                            <icon-base width="14" height="14" icon-fill="fill-gray-800" icon-name="logout" classes="mr-2 group-hover:fill-white">
                                <logout />
                            </icon-base>
                            <span class="text-base font-normal text-gray-700 group-hover:text-white">Logout</span>
                        </inertia-link>
                    </div>
                    <div v-else>
                        <inertia-link class="flex items-center px-3 py-2 text-base rounded-md hover:bg-gray-700 group" :href="route('login.form')">
                            <icon-base width="14" height="14" icon-fill="fill-gray-800" icon-name="login" classes="mr-2 group-hover:fill-white">
                                <lock-closed />
                            </icon-base>
                            <span class="text-base font-normal text-gray-700 group-hover:text-white">Login</span>
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
