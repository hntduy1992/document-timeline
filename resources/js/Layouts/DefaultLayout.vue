<template>
    <v-app id="inspire">
        <v-app-bar
            class="px-3"
            density="compact"
            flat
        >
            <v-avatar
                class="hidden-md-and-up"
                color="grey-darken-1"
                size="32"
            ></v-avatar>

            <v-spacer></v-spacer>

            <v-tabs
                align-tabs="center"
                color="grey-darken-2"
            >
                <v-tab
                    v-for="(link) in links"
                    :key="link.href"
                    :text="link.text"
                    @click="router.visit(link.href)"
                ></v-tab>
            </v-tabs>
            <v-spacer></v-spacer>

            <UserControl></UserControl>
        </v-app-bar>
        <v-main>
            <slot></slot>
        </v-main>
    </v-app>
</template>
<script setup>
import UserControl from "@/Components/UserControl.vue";
import {router} from "@inertiajs/vue3";

const links = [
    {text: 'Dashboard', href: '/'},
    {text: 'Messages', href: '/message'},
    {text: 'Profile', href: '/profile'},
    {text: 'Updates', href: '/updates'},
]
</script>
<style scoped>

</style>
