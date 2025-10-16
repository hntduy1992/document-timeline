<script setup>

import {usePage} from "@inertiajs/vue3";
import {DateTime} from "luxon";
import {ref} from "vue";
import CreateDonViForm from "@/Pages/Auth/DonVi/CreateDonViForm.vue";

const page = usePage()

const dialogCreateForm = ref(false)

const onCreateButtonClick = () => {
    dialogCreateForm.value = true
}

const FormClosed = (e)=>{
    dialogCreateForm.value = false
}


</script>

<template>
    <v-card class="ma-2" >
        <v-card-title class="d-flex">
                <v-toolbar-title>
                    <v-icon icon="mdi-book-multiple" size="x-small" start></v-icon>
                    DANH SÁCH ĐƠN VỊ
                </v-toolbar-title>
                <v-btn
                    class="me-2"
                    prepend-icon="mdi-plus"
                    rounded="lg"
                    text="Thêm đơn vị"
                    variant="elevated"
                    border
                    color="success"
                    @click="onCreateButtonClick"
                ></v-btn>
        </v-card-title>
        <v-card-text >
            <v-data-table
                :headers="page.props.tableHeaders"
                :hide-default-footer="page.props.listDonVi.length < 11"
                :items="page.props.listDonVi"
            >
                <template v-slot:top>

                </template>

                <template v-slot:item="{item}">
                    <tr>
                        <td>
                            <v-avatar
                                image="https://kenh14cdn.com/2019/2/24/3561716420480213454575853861059020806684672n-15510057259571546306615.jpg"></v-avatar>
                        </td>
                        <td>{{ item.ten_don_vi }}</td>
                        <td>{{ DateTime.fromISO(item.created_at).toFormat('dd/MM/yyyy HH:mm') }}</td>
                        <td>{{ DateTime.fromISO(item.updated_at).toFormat('dd/MM/yyyy HH:mm') }}</td>
                    </tr>
                </template>
            </v-data-table>

        </v-card-text>
    </v-card>

    <!--Create form-->
    <v-dialog
        v-model="dialogCreateForm"
        max-width="400"
        persistent
    >
        <CreateDonViForm @formClosed="FormClosed"></CreateDonViForm>
    </v-dialog>


</template>

<style scoped>

</style>
