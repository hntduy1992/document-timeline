<script setup>
import {useForm, usePage} from "@inertiajs/vue3";
import {toast} from "vue3-toastify";

const page = usePage()
const form = useForm({
    username: 'admin',
    password: 'admin',
    callback: page.props.callback
})

const onFormSubmit = () => {
    form.post('/login/check', {
        onSuccess: (res) => {
            console.log(res)
            toast.success('Đăng nhập thành công!')
        }
    })

}
</script>

<template>
    <v-container class="d-flex justify-center align-center h-screen">
        <v-card width="400">
            <v-card-title class="text-center">HỆ THỐNG <br> VĂN BẢN CHUYỂN ĐỔI SỐ</v-card-title>
            <v-card-text>
                <v-form @submit.prevent="onFormSubmit">
                    <v-text-field
                        v-model="form.username"
                        variant="outlined"
                        label="Username"
                        prepend-icon="mdi-account"
                        :error-messages="form.errors.username"
                        density="compact"
                        class="mb-2"
                    ></v-text-field>
                    <v-text-field
                        v-model="form.password"
                        variant="outlined"
                        label="Password"
                        prepend-icon="mdi-key"
                        :error-messages="form.errors.password"
                        density="compact"
                        class="mb-2"
                        type="password"
                    ></v-text-field>
                    <v-btn color="success" class="w-100" type="submit">Đăng nhập</v-btn>
                </v-form>
            </v-card-text>
        </v-card>
    </v-container>
</template>

<style scoped>

</style>
