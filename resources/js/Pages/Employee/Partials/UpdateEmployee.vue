<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm, usePage } from '@inertiajs/vue3';

const employee = usePage().props.employee;

const form = useForm({
    name: employee.name,
    address: employee.address,
    phone: employee.phone,
    position: employee.position,
    basic_salary: employee.basic_salary,
});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">Employee Information</h2>

            <p class="mt-1 text-sm text-gray-600">
                Update your account's employee information.
            </p>
        </header>

        <form @submit.prevent="form.patch(route('profile.update'))" class="mt-6 space-y-6">
            <h2 class="text-lg font-medium text-gray-900">
                Update Employee
            </h2>

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


            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>

                <Transition
                    enter-active-class="transition ease-in-out"
                    enter-from-class="opacity-0"
                    leave-active-class="transition ease-in-out"
                    leave-to-class="opacity-0"
                >
                    <p v-if="form.recentlySuccessful" class="text-sm text-gray-600">Saved.</p>
                </Transition>
            </div>
        </form>
    </section>
</template>
