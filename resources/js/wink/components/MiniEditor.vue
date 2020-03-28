<template>
    <div class="relative ql-mini">
        <div ref="editor" class="bg-white px-2 rounded border border-gray-300" />
    </div>
</template>

<script>
import Quill from 'quill';

export default {
    components: {},
    props: {
        value: {
            type: String,
            default: '',
        },
    },
    data () {
        return {
            editor: null,
            editorBody: this.body,
        }
    },
    mounted () {
        this.editor = this.createEditor();
        this.handleEditorValue();
    },
    destroyed () {
    },
    methods: {
        createEditor () {
            return new Quill(this.$refs.editor, {
                modules: {
                    syntax: true,
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike', 'link'],
                        // [{'direction': 'rtl'}],
                    ],
                },
                theme: 'bubble',
                scrollingContainer: 'html, body',
            });
        },
        handleEditorValue () {
            this.editor.root.innerHTML = this.value || 'Write something...';

            this.editor.on('text-change', () => {
                this.$emit('input', this.editor.getText() ? this.editor.root.innerHTML : '');
            });
        },
    },
}
</script>
