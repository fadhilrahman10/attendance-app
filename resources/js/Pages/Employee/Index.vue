<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import CreateEmployee from "@/Pages/Employee/Partials/CreateEmployee.vue";
import CreateEmployeeSalary from "@/Pages/Employee/Partials/CreateEmployeeSalary.vue";
import UpdateWorkDays from "@/Pages/Employee/Partials/UpdateWorkDays.vue";

defineProps({
    employees: Object,
    salaries: Object,
    workDays: Object,
    attendances: Object,
})
</script>

<template>
    <Head title="Employee" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Master Employee</h2>
        </template>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <CreateEmployee :employees="employees" class="max-w-xl" />

                    <div class="mt-4">
                        <div class="relative max-w-full shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Position
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Phone
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Basic Salary
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="employee in employees" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ employee.name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ employee.position }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ employee.phone }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ employee.basic_salary }}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <Link :href="route('master-employee.show', employee.id)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                View
                                            </Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Employee Salary</h2>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <CreateEmployeeSalary :employees="employees" class="max-w-xl" />

                    <div class="mt-4">
                        <div class="relative max-w-full shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Component
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Amount
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="salary in salaries" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ salary.employee.name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ salary.salary_components }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ salary.salary_amount }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Work Days</h2>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="mt-4">
                        <div class="relative max-w-full shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Work Day
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Start At
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        End At
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-center">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="work in workDays" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ work.work_day }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ work.work_day_start ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ work.work_day_end ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <UpdateWorkDays :work-days="work" class="max-w-xl" />
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Attendance Today</h2>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="mt-4">
                        <div class="relative max-w-full shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Attendance Time
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="attend in attendances" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ attend.employee.name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ attend.attendance_time }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ attend.status }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>

<style scoped>

</style>
