<script setup>

import TextInput from "@/Components/TextInput.vue";
import Modal from "@/Components/Modal.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import {nextTick, ref} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {useForm, usePage} from "@inertiajs/vue3";

const creatingEmployeeSalary = ref(false);

const form = useForm({
    employee_id: '',
    salary_components: '',
    salary_amount: 0,
});

const employees = usePage().props.employees;
const formCreateEmployeeSalary = () => {
    creatingEmployeeSalary.value = true;
};

const createEmployee = () => {
    form.post(route('master-employee-salary.store'), {
        preserveScroll: true,
            onSuccess: () => closeModal(),
            // onError: () => .value.focus(),
            onFinish: () => form.reset(),
    })
};

const closeModal = () => {
    creatingEmployeeSalary.value = false;
    form.reset();
};
</script>

<template>
    <PrimaryButton @click="formCreateEmployeeSalary">Create Employee Salary</PrimaryButton>

    <Modal :show="creatingEmployeeSalary" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Create Employee Salary
            </h2>

            <div class="mt-6">
                <InputLabel for="employee_id" value="Employee" class="sr-only" />

                <select id="employee_id" v-model="form.employee_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Choose a employee</option>
                    <option v-for="employee in employees" :value="employee.id">{{ employee.name }}</option>
                </select>

                <InputError :message="form.errors.employee_id" class="mt-2" />
            </div>

            <div class="mt-6">
                <InputLabel for="salary_components" value="Salary Component" class="sr-only" />

                <TextInput
                    id="salary_components"
                    ref="salaryComponentInput"
                    v-model="form.salary_components"
                    type="text"
                    class="mt-1 block w-full"
                    placeholder="Salary Components"
                />

                <InputError :message="form.errors.salary_components" class="mt-2" />
            </div>

            <div class="mt-6">
                <InputLabel for="salary_amount" value="Salary Amount" class="sr-only" />

                <TextInput
                    id="salary_amount"
                    ref="salaryAmountInput"
                    v-model="form.salary_amount"
                    type="number"
                    class="mt-1 block w-full"
                    placeholder="Phone"
                />

                <InputError :message="form.errors.salary_amount" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                <PrimaryButton
                    class="ms-3"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    @click="createEmployee"
                >
                    Create Employee Salary
                </PrimaryButton>
            </div>
        </div>
    </Modal>
</template>

<style scoped>

</style>
