<template>
    <v-text-field
        :label="props.label"
        type="date"
        v-model=""
    >
    </v-text-field>
</template>

<script setup>
const props = defineProps({
    label:String
})
</script>
