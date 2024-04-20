<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import {Head, Link, useForm} from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
});

const form = useForm({
    employee_id: '',
});

const submit = () => {
    form.post(route('attendance.store'), {
        onFinish: () => form.reset(),
    })
};

</script>

<template>
    <Head title="Attendance" />

    <GuestLayout>
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="employee_id" value="Employee ID" />

                <TextInput
                    id="employee_id"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.employee_id"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.employee_id" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Attend
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>

<style scoped>

</style>
