<script setup>

import {usePage} from "@inertiajs/vue3";
import {DateTime} from "luxon";
import {ref} from "vue";
import CreateEditForm from "@/Pages/Auth/DonVi/CreateEditForm.vue";

const page = usePage()
const tableSelected = ref(null)


const updateSelected = (e) => {
    console.log(e)
}
</script>

<template>
    <v-sheet border rounded>
        <v-data-table
            :headers="page.props.tableHeaders"
            :hide-default-footer="page.props.listDonVi.length < 11"
            :items="page.props.listDonVi"
        >
            <template v-slot:top>
                <v-toolbar flat>
                    <v-toolbar-title>
                        <v-icon color="medium-emphasis" icon="mdi-book-multiple" size="x-small" start></v-icon>

                        Popular books
                    </v-toolbar-title>

                    <v-btn
                        class="me-2"
                        prepend-icon="mdi-plus"
                        rounded="lg"
                        text="Add a Book"
                        border
                    ></v-btn>
                </v-toolbar>
            </template>


        </v-data-table>
    </v-sheet>

</template>

<style scoped>

</style>
