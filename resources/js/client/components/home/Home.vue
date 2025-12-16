<template>
    <Main :categories="categories" :newArivals="newArivals" :collections="collections" />
</template>

<script setup>
import Main from '../main/Main.vue';

defineProps({
    categories: Array,
    newArivals: Array,
    collections: Array,
});
</script>

<style scoped lang="scss"></style>
