<script setup>

import {useForm} from "@inertiajs/vue3";
import defaultImage from '@images/logo_cds.png'
import {ref} from "vue";

const formData = useForm({
    ten_don_vi: '',
    logo: ''
})
const loading = ref(false)
const emits = defineEmits(['formClosed', 'dialogSaved'])
const onCloseClicked = () => {
    emits('formClosed', null);
}
</script>

<template>
    <v-card width="350"
            prepend-icon="mdi-book-plus"
            title="THÊM ĐƠN VỊ"
    >
        <v-card-text>
            <v-form>
                <v-text-field v-model="formData.ten_don_vi" label="Tên" variant="outlined"></v-text-field>
            </v-form>
            <v-sheet class="d-flex align-center mb-4">
                <v-img v-if="formData.logo" :src="formData.logo" alt="Logo" width="100" height="100"></v-img>
                <v-img v-else :src="defaultImage" alt="Logo" width="100" height="100"></v-img>
            </v-sheet>
            <v-form>
                <v-btn class="w-100">Đổi hình</v-btn>
                <v-file-input class="d-none" label="Logo"></v-file-input>
            </v-form>
        </v-card-text>

        <template v-slot:actions>
            <v-spacer></v-spacer>

            <v-btn
                @click="onCloseClicked">
                Hủy bỏ
            </v-btn>

            <v-btn
                color="success"
                variant="elevated"
                @click="dialogCreateForm = false">
                Lưu lại
            </v-btn>
        </template>
    </v-card>
</template>

<style scoped>

</style>
