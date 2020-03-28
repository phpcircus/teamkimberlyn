<template>
    <div class="w-full mt-8 border-b border-gray-400">
        <admin-top-post-nav />
        <slot />
    </div>
</template>

<script>
import AdminTopPostNav from '@/Shared/AdminTopPostNav';

export default {
    components: {
        AdminTopPostNav,
    },
}
</script>
