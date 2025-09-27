<script setup>

import {usePage} from "@inertiajs/vue3";
import {DateTime} from "luxon";

const  page = usePage()
</script>

<template>
    <v-table>
        <thead>
        <tr>
            <th>STT</th>
            <th class="text-left">
                Ngày ban hành
            </th>
            <th class="text-left">
                Số hiệu
            </th>
            <th class="text-left">
                Đơn vị
            </th>
            <th class="text-left">
                Trạng thái
            </th>
            <th class="text-right">
                Thao tác
            </th>
        </tr>
        </thead>
        <tbody>
        <tr
            v-for="(item,i) in page.props.data"
            :key="item.so_hieu"
        >
            <td>{{i+1}}</td>
            <td>{{ DateTime.fromISO(item.ngay_ban_hanh).toFormat('dd/MM/yyyy')}}</td>
            <td>{{ item.so_hieu }}</td>
            <td>{{ item.id_don_vi }}</td>
            <td>{{ item.trang_thai }}</td>
            <td class="text-right">
                <v-btn>
                    <v-icon>mdi-cog</v-icon>

                    <v-menu activator="parent">
                        <v-list>
                            <v-list-item link  prepend-icon="mdi-pencil">Sửa</v-list-item>
                            <v-list-item link prepend-icon="mdi-delete">Xóa</v-list-item>
                        </v-list>
                    </v-menu>
                </v-btn>
            </td>
        </tr>
        </tbody>
    </v-table>
</template>

<style scoped>

</style>
