<template>
  <div class="share-social">
    <a
      href="#"
      class="text-primary"
      @click.prevent="openShareWindow('https://www.facebook.com/sharer.php?u=')"
    >
      Facebook</a
    >,
    <a
      href="#"
      class="text-primary"
      @click.prevent="
        openShareWindow('https://www.linkedin.com/sharing/share-offsite/?url=')
      "
    >
      Linkedin</a
    >,

    <a
      href="#"
      class="text-primary"
      @click.prevent="openShareWindow('https://twitter.com/intent/tweet?text=')"
    >
      Twitter
    </a>
  </div>
</template>

<script setup>
function openShareWindow(url) {
  window.open(`${url}${location.href}`, "Share this", "width=800,height=600")
}
</script>
