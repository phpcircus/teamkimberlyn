<template>
    <modal v-if="modalShown" @close="close">
        <h2 class="font-semibold mb-5">Featured Image</h2>

        <preloader v-if="uploading" />

        <div v-if="imageUrl && !uploading">
            <img :src="imageUrl" class="max-w-full">

            <div class="input-group">
                <label class="input-label">Caption</label>
                <textarea ref="caption" v-model="caption" rows="2" class="input" placeholder="Add caption to the image" />
            </div>
        </div>

        <image-picker :key="imagePickerKey" class="mt-5" @changed="updateImage" @progressing="updateProgress" @uploading="uploading = true" />

        <button class="btn-sm btn-primary mt-10" @click="saveImage">Save Image</button>
        <button class="btn-sm btn-light mt-10" @click="close">Cancel</button>
    </modal>
</template>

<script>
import _ from 'lodash';
import Hub from 'Events/hub';
import ImagePicker from '@/wink/components/ImagePicker';
import Modal from '@/wink/components/Modal';
import Preloader from '@/wink/partials/Preloader';

export default {
    components: {
        Modal,
        Preloader,
        ImagePicker,
    },
    props: ['postId', 'currentImageUrl', 'currentCaption'],
    data () {
        return {
            imageUrl: '',
            caption: '',
            imagePickerKey: '',
            uploadProgress: 0,
            uploading: false,
            modalShown: false,
        }
    },
    mounted () {
        Hub.$listen('openingFeaturedImageUploader', data => {
            this.imageUrl = this.currentImageUrl;
            this.caption = this.currentCaption;
            this.modalShown = true;
        });
    },
    methods: {
        saveImage () {
            this.$emit('changed', {url: this.imageUrl, caption: this.caption});
            this.close();
        },
        close () {
            this.imagePickerKey = _.uniqueId();
            this.modalShown = false;
        },
        updateImage (event) {
            this.imageUrl = event.url;
            this.caption = event.caption;

            this.uploading = false;
        },
        updateProgress ({progress}) {
            this.uploadProgress = progress;
        },
    },
}
</script>
