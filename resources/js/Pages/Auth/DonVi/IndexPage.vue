<script setup>

import {usePage} from "@inertiajs/vue3";
import {DateTime} from "luxon";

const page = usePage()


</script>

<template>
    <v-sheet border rounded>
        <v-data-table
            :headers="page.props.tableHeaders"
            :hide-default-footer="page.props.listDonVi.length < 11"
            :items="page.props.listDonVi"
        >
            <template v-slot:top>
                <v-toolbar color="primary">
                    <v-toolbar-title>
                        <v-icon  icon="mdi-book-multiple" size="x-small" start></v-icon>
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
                    ></v-btn>
                </v-toolbar>
            </template>

            <template v-slot:item="{item}">
                <tr>
                    <td>
                        <v-avatar image="https://kenh14cdn.com/2019/2/24/3561716420480213454575853861059020806684672n-15510057259571546306615.jpg"></v-avatar>
                    </td>
                    <td>{{item.ten_don_vi}}</td>
                    <td>{{DateTime.fromISO(item.created_at).toFormat('dd/MM/yyyy HH:mm')}}</td>
                    <td>{{DateTime.fromISO(item.updated_at).toFormat('dd/MM/yyyy HH:mm')}}</td>
                </tr>
            </template>

        </v-data-table>

        <v-bottom-sheet location="right">
            <template v-slot:activator="{ props: activatorProps }">
                <v-btn v-bind="activatorProps" text="Click Me"></v-btn>
            </template>

            <v-card
                title="Bottom Sheet"
                text="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut, eos? Nulla aspernatur odio rem, culpa voluptatibus eius debitis dolorem perspiciatis asperiores sed consectetur praesentium! Delectus et iure maxime eaque exercitationem!"
            ></v-card>
        </v-bottom-sheet>
    </v-sheet>

</template>

<style scoped>

</style>
