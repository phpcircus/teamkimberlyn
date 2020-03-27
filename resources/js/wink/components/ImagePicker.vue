<template>
    <div>
        <input :id="'imageUpload'+_uid" type="file" class="hidden" accept="image/*" @change="loadSelectedImage">

        <div class="mb-0">
            Please <label :for="'imageUpload'+_uid" class="cursor-pointer underline">upload</label> an image
            <span v-if="$page.wink.supplementals.unsplash_key">or</span>
            <a v-if="$page.wink.supplementals.unsplash_key" href="#" class="text-text-color underline" @click.prevent="openUnsplashModal">search Unsplash</a>
        </div>
        <portal v-if="unsplashModalShown" to="unsplashModal">
            <unsplash-modal @changed="changedImage($event)" />
        </portal>

        <cropper-modal v-if="cropperModalShown" :image="file" :viewport="{ width: 600, height: 400 }" :boundary="{ width: 600, height: 400 }" @close="closeCropperModal" @cancel="cancelCropperModal" />
    </div>
</template>

<script>
import Hub from 'Events/hub';
import CropperModal from '@/wink/components/CropperModal';
import UnsplashModal from '@/wink/partials/UnsplashModal';

export default {
    components: {
        CropperModal,
        UnsplashModal,
    },
    props: [],
    data () {
        return {
            file: null,
            imageUrl: '',
            uploadProgress: 100,
            unsplashModalShown: false,
            cropperModalShown: false,
        }
    },
    created () {
        Hub.$listen('closeUnsplash', () => {
            this.unsplashModalShown = false;
        });
    },
    methods: {
        changedImage (event) {
            this.$emit('changed', event);
        },
        openUnsplashModal () {
            this.unsplashModalShown = true;
        },
        loadSelectedImage (event){
            this.file = event.target.files[0];

            this.showCropperModal();
        },
        showCropperModal () {
            this.cropperModalShown = true;
        },
        closeCropperModal ({image}) {
            this.cropperModalShown = false;
            this.imageUrl = image;
            this.$emit('changed', {url: image, caption: ''});
        },
        cancelCropperModal () {
            this.cropperModalShown = false;
        },
    },
}
</script>
