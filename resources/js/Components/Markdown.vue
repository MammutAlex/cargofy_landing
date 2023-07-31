<script setup lang="ts">
import {computed, ref} from 'vue';
import {Remarkable} from 'remarkable';

const props = defineProps({
    text: String,
})
const renderMarkdown = computed(() => {
    return new Remarkable().render(props.text);
});
</script>

<template>
    <div class="md-text text-inner" v-html="renderMarkdown"></div>
</template>
