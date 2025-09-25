<script setup>
import Banner from "@/Layouts/Banner.vue";
import {router} from "@inertiajs/vue3";
import {ref} from "vue";
const drawer = ref(true)
</script>

<template>
    <v-app>
        <v-app-bar>
            <Banner/>
            <v-spacer/>
            <v-btn  @click="router.visit('/')">Home</v-btn>
            <v-btn append-icon="mdi-login" @click="router.visit('/dashboard')">Manager</v-btn>
        </v-app-bar>
        <v-navigation-drawer v-model="drawer">
            <v-list>
                <v-list-item
                    prepend-icon="mdi-file-plus"
                    title="Văn bản mới"
                    @click="router.visit('/them-van-ban')"
                link>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
        <v-main>
            <slot></slot>
        </v-main>
    </v-app>
</template>

<style scoped>

</style>
