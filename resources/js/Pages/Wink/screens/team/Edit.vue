<template>
    <layout title="Author">
        <admin-top-author-nav />
        <!-- <div v-if="ready && author" slot="right-side" class="flex items-center">
            <button v-loading="form.working" class="py-1 px-2 btn-primary text-sm mr-6" @click="save">Save</button>
            <dropdown class="relative">
                <button slot="trigger" class="focus:outline-none text-light hover:text-primary h-8">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-4 h-4 fill-current mt-1">
                        <path d="M17 16v4h-2v-4h-2v-3h6v3h-2zM1 9h6v3H1V9zm6-4h6v3H7V5zM3 0h2v8H3V0zm12 0h2v12h-2V0zM9 0h2v4H9V0zM3 12h2v8H3v-8zm6-4h2v12H9V8z"/>
                    </svg>
                </button>
                <div slot="content" class="dropdown-content pin-r min-w-dropdown mt-1 text-sm py-2">
                    <a v-if="id != 'new'" href="#" class="no-underline text-red w-full block py-2 px-4" @click.prevent="deleteAuthor">Delete</a>
                </div>
            </dropdown>
        </div> -->
        <div class="w-full bg-white py-4">
            <div class="flex flex-col max-w-7xl px-8">
                <preloader v-if="!ready" />
                <h2 v-if="ready && !author" class="text-center font-normal">
                    404 — Author not found
                </h2>
                <div v-if="ready && author" class="w-full mx-auto">
                    <h1 v-if="id != 'new' && $page.wink.author.id != author.id" class="font-semibold text-3xl mb-10">Edit Author</h1>
                    <!-- <h1 v-if="id == 'new' && $page.wink.author.id != author.id" class="font-semibold text-3xl mb-10">New Author</h1> -->
                    <h1 v-if="$page.wink.author.id == author.id" class="font-semibold text-3xl mb-10">Your Profile</h1>
                    <div class="p-8 flex flex-col">
                        <div class="flex flex-col">
                            <text-input v-model="form.name" :errors="getErrors('name')" class="pb-8 w-full lg:w-1/2" label="Name" placeholder="Jane Doe" />
                            <text-input v-model="form.slug" :errors="getErrors('slug')" class="pr-6 pb-8 w-full lg:w-1/2" label="Slug" placeholder="add-a-slug-please" />
                            <text-input v-model="form.email" :errors="getErrors('email')" type="email" class="pr-6 pb-8 w-full lg:w-1/2" label="Email" placeholder="jdoe@email.com" />
                            <text-input v-model="form.password" :errors="getErrors('password')" type="password" class="pr-6 pb-8 w-full lg:w-1/2" label="Password" placeholder="***************" />
                            <select-input v-model="form.meta.theme" class="pb-8 w-full lg:w-1/2" :error="getErrors('theme')" label="Theme">
                                <option value="light">Light</option>
                                <option value="dark">Dark</option>
                            </select-input>
                            <div>
                                <label for="bio" class="input-label mb-4">Bio</label>
                                <mini-editor v-model="form.bio" />
                            </div>
                        </div>
                    </div>
                    <div v-if="uploading">
                        <preloader />
                    </div>
                    <div v-if="!uploading" class="flex flex-col px-8">
                        <div v-if="form.avatar" class="w-16 h-16 rounded-full bg-cover border border-gray-500 mb-4" :style="{ backgroundImage: 'url(' + form.avatar + ')' }" />
                        <input id="author_avatar" type="file" class="hidden" accept="image/*" @change="loadSelectedImage">
                        <label for="author_avatar" class="cursor-pointer underline">Upload an avatar</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- Croppie Modal -->
        <cropper-modal v-if="croppieModalShown" :image="file" :viewport="{ width: 200, height: 200 }" :boundary="{ width: 200, height: 200 }" @close="closeCroppieModal" @cancel="cancelCroppieModal" />
    </layout>
</template>

<script>
import AdminTopAuthorNav from '@/Shared/AdminTopAuthorNav';
import axios from 'axios';
import CropperModal from '@/wink/components/CropperModal';
import FormErrors from '@/wink/components/FormErrors';
import Hub from 'Events/hub';
import Layout from '@/Shared/Layout';
import MiniEditor from '@/wink/components/MiniEditor';
import Preloader from '@/wink/partials/Preloader';
import SelectInput from '@/Shared/SelectInput';
import TextInput from '@/Shared/TextInput';

export default {
    components: {
        Layout,
        Preloader,
        TextInput,
        FormErrors,
        MiniEditor,
        SelectInput,
        CropperModal,
        AdminTopAuthorNav,
    },
    props: {
        id: {
            type: [Number, String],
            default: () => 'new',
        },
        author: {
            type: Object,
            default: () => ({}),
        },
    },
    data () {
        return {
            file: null,
            ready: false,
            uploadProgress: 0,
            uploading: false,
            croppieModalShown: false,
            theme: 'light',
            form: {
                errors: [],
                working: false,
                id: '',
                name: '',
                slug: '',
                email: '',
                bio: 'I am who I\'m meant to be, this is me.',
                avatar: '',
                password: '',
                meta: {
                    meta_description: '',
                    opengraph_title: '',
                    opengraph_description: '',
                    opengraph_image: '',
                    opengraph_image_width: '',
                    opengraph_image_height: '',
                    twitter_title: '',
                    twitter_description: '',
                    twitter_image: '',
                    theme: 'light',
                },
            },
        };
    },
    watch: {
        'form.slug' (val) {
            this.debouncer(() => {
                this.form.slug = this.slugify(val);
            });
        },
        'form.name' (val) {
            this.debouncer(() => {
                this.form.slug = this.slugify(val);
            });
        },
    },
    created () {
        Hub.$listen('saveAuthorClicked', () => {
            this.save();
        });
    },
    mounted () {
        if (! this.isEmpty(this.author)) {
            this.fillForm(this.author);
        }
    },
    methods: {
        fillForm (data) {
            this.form.id = data.id;

            if (this.id != 'new') {
                this.form.name = data.name;
                this.form.slug = data.slug;
                this.form.email = data.email;
                this.form.bio = data.bio;
                this.form.avatar = data.avatar;
                this.form.meta = {
                    meta_description: data.meta.meta_description || '',
                    opengraph_title: data.meta.opengraph_title || '',
                    opengraph_description: data.meta.opengraph_description || '',
                    opengraph_image: data.meta.opengraph_image || '',
                    opengraph_image_width: data.meta.opengraph_image_width || '',
                    opengraph_image_height: data.meta.opengraph_image_height || '',
                    twitter_title: data.meta.twitter_title || '',
                    twitter_description: data.meta.twitter_description || '',
                    twitter_image: data.meta.twitter_image || '',
                    theme: data.meta.theme || 'light',
                };
            }
            this.$store.workingAuthor = this.form;
            this.ready = true;
        },
        save () {
            this.form.working = true;
            this.form.errors = [];
            Hub.$dispatch('authorSaving');

            this.$inertia.post(this.route('admin.authors.store'), { form: this.form }).then(() => {
                this.form.working = false;
                Hub.$dispatch('authorFinishedSaving');
            });
        },
        deleteAuthor () {
            this.alertConfirm('Are you sure you want to delete this author?', () => {
                axios.delete('/api/team/' + this.id).then(response => {
                    this.$router.push({name: 'team'})
                }).catch(error => {
                    this.alertError(error.response.data.message);
                });
            });
        },
        loadSelectedImage (event){
            let file = event.target.files[0];
            this.file = file;
            this.croppieModal();
        },
        croppieModal () {
            this.croppieModalShown = true;
        },
        closeCroppieModal ({image}) {
            console.log('image: ', image);
            this.croppieModalShown = false;
            this.form.avatar = image;
        },
        cancelCroppieModal () {
            this.croppieModalShown = false;
        },
    },
}
</script>
