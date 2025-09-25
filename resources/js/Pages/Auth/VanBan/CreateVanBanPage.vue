<template>
    <v-form @submit.prevent="submitForm">
        <v-container>
            <v-row>
                <v-col cols="12" md="4">
                    <v-text-field
                        variant="outlined"
                        v-model="formData.so_hieu"
                        label="Số hiệu"
                    ></v-text-field>
                </v-col>
                <v-col cols="12" md="4">
                    <custom-date-input
                        v-model="formData.ngay_ban_hanh"
                        label="Ngày ban hành"
                    ></custom-date-input>
                </v-col>
                <v-col cols="4">
                    <v-checkbox
                        variant="underlined"
                        v-model="formData.trang_thai"
                        label="Trạng thái"
                    ></v-checkbox>
                </v-col>
                <v-col cols="12">
                    <v-text-field
                        v-model="formData.tieu_de"
                        label="Tiêu đề"
                        variant="outlined"
                        required
                    ></v-text-field>
                </v-col>
                <v-col cols="12">
                    <v-textarea
                        variant="outlined"
                        v-model="formData.trich_yeu"
                        label="Trích yếu"
                        rows="3"
                    ></v-textarea>
                </v-col>

                <v-col cols="12">
                    <v-combobox
                        variant="outlined"
                        v-model="formData.tag"
                        label="Thẻ (Tags)"
                        multiple
                        chips
                    ></v-combobox>
                </v-col>

                <v-col cols="12">
                    <v-file-input
                        variant="outlined"
                        v-model="formData.file"
                        label="Tải lên tệp đính kèm"
                        prepend-icon="mdi-paperclip"
                    ></v-file-input>
                </v-col>

                <v-col cols="12">
                    <v-btn color="primary" type="submit">Lưu văn bản</v-btn>
                </v-col>
            </v-row>
        </v-container>
    </v-form>
</template>

<script setup>
import {useForm} from "@inertiajs/vue3";
import CustomDateInput from "@/Components/CustomDateInput.vue";

const formData = useForm({
    ngay_ban_hanh: new Date(),
    trang_thai: false,
    so_hieu: '',
    tieu_de: '',
    trich_yeu: '',
    file: null,
    tag: [],
});

const submitForm = async () => {

};
</script>

<style scoped>

</style>
