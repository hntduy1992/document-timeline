<script setup>

import {router} from "@inertiajs/vue3";

const drawer = defineModel('drawer')
</script>

<template>
    <v-navigation-drawer v-model="drawer">
        <v-list>
            <v-list-item
                prepend-icon="mdi-folder"
                title="Danh sách văn bản"
                @click="router.get('/van-ban')"
                link>
            </v-list-item>
            <v-list-item
                prepend-icon="mdi-file-plus"
                title="Văn bản mới"
                @click="router.get('/van-ban/them-moi')"
                link>
            </v-list-item>
        </v-list>
    </v-navigation-drawer>
</template>

<style scoped>

</style>
