<script setup>
import Banner from "@/Layouts/Banner.vue";
import {router} from "@inertiajs/vue3";
import {ref} from "vue";
import NavDefaultLayout from "@/Layouts/NavDefaultLayout.vue";

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
        <NavDefaultLayout v-model="drawer"></NavDefaultLayout>
        <v-main>
            <slot></slot>
        </v-main>
    </v-app>
</template>

<style scoped>

</style>
