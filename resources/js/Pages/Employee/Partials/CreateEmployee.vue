<script setup>

import TextInput from "@/Components/TextInput.vue";
import Modal from "@/Components/Modal.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import {nextTick, ref} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {useForm} from "@inertiajs/vue3";

const creatingEmployee = ref(false);
const nameInput = ref(null);

const form = useForm({
    name: '',
    address: '',
    phone: '',
    position: '',
    basic_salary: 0,
});
const formCreateEmployee = () => {
    creatingEmployee.value = true;

    nextTick(() => nameInput.value.focus());
};

const createEmployee = () => {
    form.post(route('master-employee.store'), {
        preserveScroll: true,
            onSuccess: () => closeModal(),
            onError: () => nameInput.value.focus(),
            onFinish: () => form.reset(),
    })
    // form.delete(route('profile.destroy'), {
    //     preserveScroll: true,
    //     onSuccess: () => closeModal(),
    //     onError: () => passwordInput.value.focus(),
    //     onFinish: () => form.reset(),
    // });
};

const closeModal = () => {
    creatingEmployee.value = false;
    form.reset();
};
</script>

<template>
    <PrimaryButton @click="formCreateEmployee">Create Employee</PrimaryButton>

    <Modal :show="creatingEmployee" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Create Employee
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                (<span class="text-red-600">*</span>) is mandatory
            </p>

            <div class="mt-6">
                <InputLabel for="name" value="Name" class="sr-only" />

                <TextInput
                    id="name"
                    ref="nameInput"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full"
                    placeholder="Name"
                />

                <InputError :message="form.errors.name" class="mt-2" />
            </div>

            <div class="mt-6">
                <InputLabel for="address" value="Address" class="sr-only" />

                <TextInput
                    id="address"
                    ref="addressInput"
                    v-model="form.address"
                    type="text"
                    class="mt-1 block w-full"
                    placeholder="Address"
                />

                <InputError :message="form.errors.address" class="mt-2" />
            </div>

            <div class="mt-6">
                <InputLabel for="phone" value="Phone" class="sr-only" />

                <TextInput
                    id="phone"
                    ref="phoneInput"
                    v-model="form.phone"
                    type="text"
                    class="mt-1 block w-full"
                    placeholder="Phone"
                />

                <InputError :message="form.errors.phone" class="mt-2" />
            </div>

            <div class="mt-6">
                <InputLabel for="position" value="Position" class="sr-only" />

                <TextInput
                    id="position"
                    ref="positionInput"
                    v-model="form.position"
                    type="text"
                    class="mt-1 block w-full"
                    placeholder="Position"
                />

                <InputError :message="form.errors.position" class="mt-2" />
            </div>

            <div class="mt-6">
                <InputLabel for="basicSalary" value="Basic Salary" class="sr-only" />

                <TextInput
                    id="basicSalary"
                    ref="basicSalaryInput"
                    v-model="form.basic_salary"
                    type="number"
                    class="mt-1 block w-full"
                    placeholder="Basic Salary"
                />

                <InputError :message="form.errors.basic_salary" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                <PrimaryButton
                    class="ms-3"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    @click="createEmployee"
                >
                    Create Employee
                </PrimaryButton>
            </div>
        </div>
    </Modal>
</template>

<style scoped>

</style>
