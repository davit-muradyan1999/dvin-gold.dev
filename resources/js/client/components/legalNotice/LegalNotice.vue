<script setup>
import {computed} from "vue";
import {usePage} from "@inertiajs/vue3";

defineProps({
    legalNotice: Array,
});

const locale = computed(() => usePage().props.locale)

const getTitle = (title) => {
    return title[locale.value]
        || title.en
        || title.ru
        || title.am
        || ''
}
</script>

<template>
        <div class="!flex !items-center !gap-4 !my-8">
            <div class="!flex-grow !border-t !border-black"></div>
            <h1 class="landing__heading">{{ getTitle(legalNotice?.title) }}</h1>
            <div class="!flex-grow !border-t !border-black"></div>
        </div>
        <div class="flex flex-col items-center gap-4">
            <div class="relative">
                <div v-html="getTitle(legalNotice?.description)" class=" w-full"></div>
            </div>
        </div>

    <img src="/public/client/images/sign.png" class="absolute !w-auto right-0" alt="sign" style="float: right">
</template>

<style scoped lang="scss">
p{
    font-size: 1.5rem;
}
img{
    width: 100%;
}
</style>
