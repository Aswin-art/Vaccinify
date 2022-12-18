<template>
    <NavbarComponentVue />
    <div>
        <main id="consultation" class="bg-primary h-[300px]">
            <div class="container mx-auto p-6 flex flex-col align-middle justify-center w-full h-full">
                <div class="jumbotron-content mx-auto">
                    <h1 class="font-bold text-white text-5xl">Consultations</h1>
                </div>
            </div>
        </main>

        <section id="consultations" class="mt-10">
            <div class="container px-6 mx-auto">
                <div class="heading">
                    <h1 class="font-bold text-primary text-2xl">My Consultations</h1>
                </div>

                <div class="consultation-list mt-5 flex gap-5">
                    <div v-for="consultation in consultations" :key="consultation.id" class="card border border-solid border-gray-300 p-3 w-[300px]">
                        <div class="heading">
                            <h1 class="font-bold text-lg text-gray-700">Consultation</h1>
                        </div>
                        <div class="content mt-5">
                            <div class="status flex justify-between w-full mb-3">
                                <div class="info">
                                    <p class="font-bold text-lg">Status</p>
                                </div>
                                <div class="detail mt-1">
                                    <div v-if="consultation.status == 'accepted'" class="bg-primary rounded p-1">
                                        <p class="text-white font-bold text-xs">{{ consultation.status }}</p>
                                    </div>
                                    <div v-if="consultation.status == 'pending'" class="bg-yellow-500 rounded p-1">
                                        <p class="text-white font-bold text-xs">{{ consultation.status }}</p>
                                    </div>
                                    <div v-if="consultation.status == 'declined'" class="bg-red-500 rounded p-1">
                                        <p class="text-white font-bold text-xs">{{ consultation.status }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="status flex justify-between w-full mb-3">
                                <div class="info">
                                    <p class="font-bold text-lg">Disease History</p>
                                </div>
                                <div class="detail mt-1">
                                    <p class="text-gray-500">{{ consultation.disease_history }}</p>
                                </div>
                            </div>
                            <div class="status flex justify-between w-full mb-3">
                                <div class="info">
                                    <p class="font-bold text-lg">Current Symptoms</p>
                                </div>
                                <div class="detail mt-1">
                                    <p class="text-gray-500">{{ consultation.current_symptoms }}</p>
                                </div>
                            </div>
                            <div class="status flex justify-between w-full mb-3">
                                <div class="info">
                                    <p class="font-bold text-lg">Doctor Name</p>
                                </div>
                                <div class="detail mt-1">
                                    <p v-if="consultation.doctors" class="text-gray-500">{{ consultation.doctors.name }}</p>
                                    <p v-else class="text-gray-500">-</p>
                                </div>
                            </div>
                            <div class="status flex justify-between w-full mb-3">
                                <div class="info">
                                    <p class="font-bold text-lg">Doctor Notes</p>
                                </div>
                                <div class="detail mt-1">
                                    <p v-if="consultation.doctors" class="text-gray-500">{{ consultation.doctor_notes }}</p>
                                    <p v-else class="text-gray-500">-</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="add-consultations mt-5 mb-5">
                    <div  v-if="consultationCount < 2">
                        <a href="/request-consultation">
                            <button class="bg-primary text-white px-4 py-2 font-semibold rounded shadow-sm shadow-indigo-500/50 hover:bg-indigo-500">Add Consultation</button>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import { ref } from '@vue/reactivity';
import { onMounted } from '@vue/runtime-core';
import NavbarComponentVue from '../components/NavbarComponent.vue';
import ApiServices from '../services/api/ApiServices';

const consultations = ref('')

let consultationCount = 0

const getConsultations = async () => {
    const res = await ApiServices.getConsultation()
    if(res.status == 200){
        consultations.value = res.data.data
        consultationCount = consultations.value.length
    }
}

onMounted(() => {
    getConsultations()
})
</script>

<style lang="scss" scoped>

</style>