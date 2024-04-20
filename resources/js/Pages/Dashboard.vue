<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import {computed} from "vue";

defineProps({
    report: Object
})

function getTotalSalary(salaries) {
    return salaries.reduce((total, s) => total + s.salary_amount, 0);
}

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <div class="relative overflow-x-auto">
                            <h2 class="font-semibold text-xl mb-4 text-gray-800 leading-tight">Report Salary This Month</h2>

                            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                <tr>
                                    <th scope="col" class="px-6 py-3 rounded-s-lg">
                                        Employee
                                    </th>
                                    <th scope="col" class="px-6 py-3 rounded-e-lg">
                                        Total Salary
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="salary in report"  class="bg-white">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ salary.name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{
                                            getTotalSalary(salary.salaries)
                                        }}
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr class="font-semibold text-gray-900">
                                    <th scope="row" class="px-6 py-3 text-base">Total</th>
                                    <td class="px-6 py-3">
                                        {{ report.reduce((acc, cur) => acc + getTotalSalary(cur.salaries), 0) }}
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
