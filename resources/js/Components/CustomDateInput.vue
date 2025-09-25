<template>
    <v-text-field
        :label="label"
        type="date"
        v-model="model"
    >
    </v-text-field>
</template>

<script setup>
const model = defineModel('model')
const label = defineModel('label')
</script>
