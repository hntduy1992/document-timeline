<template>
    <v-form @submit.prevent="submitForm">
        <v-container>
            <v-row>
                <v-col cols="12" md="4">
                    <v-text-field
                        variant="outlined"
                        v-model="formData.so_hieu"
                        label="Số hiệu"
                        :error-messages="formData.errors.so_hieu"
                    ></v-text-field>
                </v-col>
                <v-col cols="12" md="4">
                    <v-text-field
                        type="date"
                        v-model="formData.ngay_ban_hanh"
                        label="Ngày ban hành"
                        variant="outlined"
                        :error-messages="formData.errors.ngay_ban_hanh"
                        clearable
                    ></v-text-field>
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
                        :error-messages="formData.errors.tieu_de"
                        clearable
                    ></v-text-field>
                </v-col>
                <v-col cols="12">
                    <v-textarea
                        variant="outlined"
                        v-model="formData.trich_yeu"
                        label="Trích yếu"
                        rows="3"
                        clearable
                    ></v-textarea>
                </v-col>

                <!--                <v-col cols="12">-->
                <!--                    <v-chip-group-->
                <!--                        v-model="formData.tag"-->
                <!--                        multiple-->
                <!--                    >-->
                <!--                        <v-chip v-for="(tag) of tags "-->
                <!--                                :value="tag.id"-->
                <!--                            :text="tag.name"-->
                <!--                            variant="outlined"-->
                <!--                            filter-->
                <!--                        ></v-chip>-->
                <!--                    </v-chip-group>-->
                <!--                    {{formData.tag}}-->
                <!--                </v-col>-->

                <v-col cols="12">
                    <v-file-input
                        variant="outlined"
                        v-model="formData.file"
                        label="Tải lên tệp đính kèm"
                        prepend-icon="mdi-paperclip"
                        :error-messages="formData.errors.file"
                        accept="application/pdf, application/msword"
                        show-size
                        clearable
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
import {useForm, usePage} from "@inertiajs/vue3";
import {DateTime} from "luxon";
import {toast} from "vue3-toastify";

const now = DateTime.local();
const page = usePage();
const formData = useForm({
    ngay_ban_hanh: now.toFormat('yyyy-MM-dd'),
    trang_thai: true,
    so_hieu: null,
    tieu_de: null,
    trich_yeu: null,
    file: null,
    tag: [],
});
const tags = page.props.tags;

const submitForm = async () => {
    formData.post('/van-ban', {
        onSuccess: (res) => {
            formData.reset();
            switch (page.props.flash.type) {
                case 'success':
                    toast.success(page.props.flash.message);
                    break;
                case 'error': toast.error(page.props.flash.message);
                    break;
            }
        }
    });
};
</script>

<style scoped>

</style>
