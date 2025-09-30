<script setup>
import {router, usePage} from "@inertiajs/vue3";

const page = usePage()

const onLogin = () => {

    router.visit(`/login`, {
        data: {
            'callback': window.location.pathname
        }
    });
}
</script>

<template>
    <template v-if="page.props.auth.user">
        <span>Xin chào, {{ $page.props.auth.user.name }}</span>
        <v-btn prepend-icon="mdi-logout">Đăng xuất</v-btn>
    </template>
    <template v-else>
        <v-btn prepend-icon="mdi-login" variant="outlined" color="info" @click="onLogin">Đăng nhập</v-btn>
    </template>
</template>

<style scoped>

</style>
