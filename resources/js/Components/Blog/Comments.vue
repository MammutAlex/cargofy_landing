<template>
    <div
        class="fb-comments"
        :data-href="path"
        data-width=""
        data-numposts="5"
    ></div>
</template>

<script setup>

const path = window.location.href;
</script>
