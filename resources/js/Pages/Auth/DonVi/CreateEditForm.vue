<script setup>

import {useForm} from "@inertiajs/vue3";
import {ref, watchEffect} from "vue";

const props = defineProps({
    form: {
        type: Object,
        required: true
    }
});

const emit = defineEmits(['form-submitted']);

const localForm = ref({...props.form});

watchEffect(() => {
    localForm.value = {...props.form};
});


</script>

<template>
    <v-form>
        <v-text-field
            v-model="localForm.ten_don_vi"></v-text-field>
    </v-form>
</template>

<style scoped>

</style>
