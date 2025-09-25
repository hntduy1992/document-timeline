<template>
    <v-container>
        <v-timeline align="start">
            <v-timeline-item
                v-for="(vb, i) in vanban"
                :key="i"
                :dot-color="vb.color"
                size="small"
            >
                <template v-slot:opposite>
                    <div
                        :class="`pt-1 headline font-weight-bold text-${vb.color}`"
                        v-text="vb.ngayBanHanh"
                    ></div>
                </template>
                <v-card :color="vb.color">
                    <v-card-title class="mt-n1 headline font-weight-light mb-4 d-flex">
                        <span>Lorem ipsum</span>
                    </v-card-title>
                    <v-card-text>
                        Lorem ipsum dolor sit amet, no nam oblique veritus. Commune scaevola imperdiet nec ut, sed euismod
                        convenire principes at. Est et nobis iisque percipit, an vim zril disputando voluptatibus, vix an
                        salutandi sententiae.
                    </v-card-text>
                </v-card>
            </v-timeline-item>
        </v-timeline>
    </v-container>
</template>

<script setup>
const vanban = [
    {
        color: 'cyan',
        ngayBanHanh: '1960',
    }, {
        color: 'cyan',
        ngayBanHanh: '1960',
    }, {
        color: 'cyan',
        ngayBanHanh: '1960',
    }, {
        color: 'cyan',
        ngayBanHanh: '1960',
    }, {
        color: 'cyan',
        ngayBanHanh: '1960',
    }, {
        color: 'cyan',
        ngayBanHanh: '1960',
    }, {
        color: 'cyan',
        ngayBanHanh: '1960',
    },
]
</script>
