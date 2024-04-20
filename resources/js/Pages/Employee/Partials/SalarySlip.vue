<script setup>

import {usePage} from "@inertiajs/vue3";
import {computed} from "vue";

const salarySlip = usePage().props.employee.salaries;

const totalSalarySlip = computed(() => {
    return salarySlip.reduce((total, salary) => total + salary.salary_amount, 0);
})

</script>

<template>

    <div class="relative overflow-x-auto">
        <h2 class="font-semibold text-xl mb-4 text-gray-800 leading-tight">Salary Slip</h2>

        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
            <tr>
                <th scope="col" class="px-6 py-3 rounded-s-lg">
                    Component
                </th>
                <th scope="col" class="px-6 py-3 rounded-e-lg">
                    Price
                </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="salary in salarySlip" class="bg-white">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ salary.salary_components }}
                </th>
                <td class="px-6 py-4">
                    {{ salary.salary_amount }}
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr class="font-semibold text-gray-900">
                <th scope="row" class="px-6 py-3 text-base">Total</th>
                <td class="px-6 py-3">{{ totalSalarySlip }}</td>
            </tr>
            </tfoot>
        </table>
    </div>

</template>

<style scoped>

</style>
