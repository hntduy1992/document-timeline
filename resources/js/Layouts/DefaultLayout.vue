<script setup>
import Banner from "@/Layouts/Banner.vue";
import {router} from "@inertiajs/vue3";
import {ref} from "vue";

const drawer = ref(true)

const snackbar = ref(false) // Controls snackbar visibility
const message = ref('')     // Message to display
const color = ref('')       // Color of the snackbar
const timeout = 3000

</script>

<template>
    <v-app>
        <v-app-bar>
            <Banner/>
            <v-spacer/>
            <v-btn @click="router.visit('/')">Home</v-btn>
            <v-btn append-icon="mdi-login" @click="router.visit('/dashboard')">Manager</v-btn>
        </v-app-bar>
        <v-navigation-drawer v-model="drawer">
            <v-list>
                <v-list-item
                    prepend-icon="mdi-file-plus"
                    title="Văn bản mới"
                    @click="router.get('/van-ban/them-moi')"
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
