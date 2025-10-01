<script setup>
import {router, useForm, usePage} from "@inertiajs/vue3";
import {shallowRef} from "vue";

const page = usePage()

const onLogin = () => {
    router.visit(`/login`, {
        data: {
            'callback': window.location.pathname
        }
    });
}
const formLogout = useForm({
    callback: window.location.pathname
})
const dialog = shallowRef(false)
const onLogout = () => {
    formLogout.post('/logout', {
        data: {
            callback: window.location.pathname
        },
        onSuccess: (res) => {
            dialog.value = false
        }
    })
}
</script>

<template>
    <template v-if="page.props.auth.user">
        <span>   Xin chào, {{ page.props.auth.user.ho_ten }}</span>
        <v-dialog
            v-model="dialog"
            width="auto"
        >
            <template v-slot:activator="{ props: activatorProps }">
                <v-btn icon="mdi-logout" v-bind="activatorProps"></v-btn>
            </template>

            <v-card>
                <v-card-title class="text-center bg-red">Thông báo</v-card-title>
                <v-card-text>
                    Bạn đang đăng xuất khỏi hệ thống!
                </v-card-text>
                <v-divider></v-divider>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn
                        text="Hủy"
                        @click="dialog = false"
                    ></v-btn>

                    <v-btn
                        color="primary"
                        text="Xác nhận"
                        variant="flat"
                        @click="onLogout"
                    ></v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>

    </template>
    <template v-else>
        <v-btn prepend-icon="mdi-login" variant="outlined" color="info" @click="onLogin">Đăng nhập</v-btn>
    </template>
</template>

<style scoped>

</style>
