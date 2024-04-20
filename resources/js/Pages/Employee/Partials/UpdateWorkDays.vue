<script setup>

import TextInput from "@/Components/TextInput.vue";
import Modal from "@/Components/Modal.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import {ref} from "vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {useForm} from "@inertiajs/vue3";

const creatingWorkDays = ref(false);

defineProps({
    workDays: Object,
})

const form = useForm({
    id: '',
    work_day: '',
    work_day_start: '',
    work_day_end: '',
});

const formCreateWorkDays = (workDays) => {
    creatingWorkDays.value = true;
    form.id = workDays.id;
    form.work_day = workDays.work_day;
    form.work_day_start = workDays.work_day_start;
    form.work_day_end = workDays.work_day_end;
};

const createWorkDays = () => {
    form.post(route('work-days-employee.store'), {
        preserveScroll: true,
            onSuccess: () => closeModal(),
            // onError: () => .value.focus(),
            onFinish: () => form.reset(),
    })
};

const closeModal = () => {
    creatingWorkDays.value = false;
    form.reset();
};
</script>

<template>
    <button @click="formCreateWorkDays(workDays)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>

    <Modal :show="creatingWorkDays" @close="closeModal">
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                Create Work Days
            </h2>

            <pre>{{ workDays }}</pre>
            <TextInput type="hidden" name="id" v-model="form.id" :model-value="workDays.id"  />

            <div class="mt-6">
                <InputLabel for="work_day" value="Day" class="sr-only" />

                <TextInput
                    id="work_day"
                    ref="workDayInput"
                    v-model="form.work_day"
                    :model-value="workDays.work_day"
                    type="text"
                    class="mt-1 block w-full"
                    placeholder="Day"
                    readonly
                />

                <InputError :message="form.errors.work_day" class="mt-2" />
            </div>

            <div class="mt-6">
                <InputLabel for="work_day_start" value="Start" class="sr-only" />

                <TextInput
                    id="work_day_start"
                    ref="workDayStart"
                    v-model="form.work_day_start"
                    :model-value="workDays.work_day_start"
                    type="time"
                    class="mt-1 block w-full"
                    placeholder="Start"
                />

                <InputError :message="form.errors.work_day_start" class="mt-2" />
            </div>

            <div class="mt-6">
                <InputLabel for="work_day_end" value="End" class="sr-only" />

                <TextInput
                    id="work_day_end"
                    ref="workDayEnd"
                    v-model="form.work_day_end"
                    :model-value="workDays.work_day_end"
                    type="time"
                    class="mt-1 block w-full"
                    placeholder="End"
                />

                <InputError :message="form.errors.work_day_end" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                <PrimaryButton
                    class="ms-3"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    @click="createWorkDays"
                >
                    Create Work Days
                </PrimaryButton>
            </div>
        </div>
    </Modal>
</template>

<style scoped>

</style>
