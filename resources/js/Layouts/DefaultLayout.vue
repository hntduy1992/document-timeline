<template>
    <v-app id="inspire">
        <v-app-bar v-if="!hiddenNav"
                   class="px-3"
                   density="compact"
                   height="75"
        >
            <v-app-bar-title>
                <span class="text-h5 font-weight-bold">BAN CHỈ ĐẠO CHUYỂN ĐỔI SỐ PHƯỜNG SA ĐÉC</span>
            </v-app-bar-title>
            <template v-slot:append>
                <v-btn @click="testApi">Test Api</v-btn>
                <UserControl></UserControl>
            </template>
        </v-app-bar>

        <v-navigation-drawer v-model="drawer">
            <v-list>
                <v-list-item
                    v-for="link in links"
                    :key="link.href"
                    :prepend-icon="link.icon"
                    :title="link.text"
                    @click="router.visit(link.href)"
                >
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
        <v-main class="bg-grey-lighten-4">
            <slot></slot>
        </v-main>
    </v-app>
</template>
<script setup>
import UserControl from "@/Components/UserControl.vue";
import {router, usePage} from "@inertiajs/vue3";
import {computed, ref, watch} from "vue";
import {tr} from "vuetify/locale";
import axios from "axios";

const page = usePage()
const hiddenNav = computed(() => page.props.hide_nav)
const drawer = computed(() => (page.props.auth.user && page.props.auth.user.is_admin))
const links = [
    {text: 'Thông tin đơn vị', icon: 'mdi-archive-outline', href: '/don-vi/danh-sach'},
    {text: 'Hồ sơ', icon: 'mdi-account-group', href: '/ho-so'},
    {text: 'Văn bản', icon: 'mdi-file-document', href: '/van-ban'},
]

const testApi = async () => {
    try {
        const response = await axios.post('/api/file/upload', {
            file: null
        })

        console.log(response.data)
    } catch (e) {
        console.log(e)
    }
}
</script>
<style scoped>

.v-list-item:hover {
    color: $light-primary-color;
}
</style>
