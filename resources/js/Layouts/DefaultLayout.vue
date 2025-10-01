<template>
    <v-app id="inspire">
        <v-app-bar v-if="!hiddenNav"
                   class="px-3"
                   density="compact"
                   height="100"
        >
            <v-app-bar-title>
                <span class="text-h4 font-weight-bold">BAN CHỈ ĐẠO CHUYỂN ĐỔI SỐ PHƯỜNG SA ĐÉC</span>
            </v-app-bar-title>
            <v-spacer/>
            <template v-slot:append>
                <UserControl></UserControl>
            </template>

        </v-app-bar>
        <v-main>
            <slot></slot>
        </v-main>
    </v-app>
</template>
<script setup>
import UserControl from "@/Components/UserControl.vue";
import {router, usePage} from "@inertiajs/vue3";
import {computed, watch} from "vue";

const page = usePage()
const hiddenNav = computed(() => page.props.hide_nav)
</script>
<style scoped>

</style>
