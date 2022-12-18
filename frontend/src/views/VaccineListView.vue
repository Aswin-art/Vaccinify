<template>
    <NavbarComponentVue />
    <div>
        <main id="list_vaccine" class="h-[300px] bg-primary">
            <div class="heading flex justify-center w-full h-full flex-col">
                <h1 class="font-bold text-white text-5xl mx-auto">Vaccine List</h1>
            </div>
        </main>

        <section id="vaccines" class="mt-10">
            <div class="container px-6 mx-auto">
                <div class="heading">
                    <h1 class="font-bold text-primary text-2xl">My Vaccination</h1>
                </div>

                <div class="vaccine-list mt-5 flex gap-5">
                    <div v-if="vaccines.first" class="card border border-solid border-gray-300 p-3 w-[300px]">
                        <div class="heading">
                            <h1 class="font-bold text-lg text-gray-700">First Vaccination</h1>
                        </div>
                        <div class="content mt-5">
                            <div class="status flex justify-between w-full mb-3">
                                <div class="info">
                                    <p class="font-bold text-lg">Status</p>
                                </div>
                                <div class="detail mt-1">
                                    <div class="bg-primary rounded p-1">
                                        <p class="text-white font-bold text-xs">Vaccinated</p>
                                    </div>
                                </div>
                            </div>
                            <div class="status flex justify-between w-full mb-3">
                                <div class="info">
                                    <p class="font-bold text-lg">Date</p>
                                </div>
                                <div class="detail mt-1">
                                    <p class="text-gray-500">{{ vaccines.first.vaccination_date }}</p>
                                </div>
                            </div>
                            <div class="status flex justify-between w-full mb-3">
                                <div class="info">
                                    <p class="font-bold text-lg">Spot</p>
                                </div>
                                <div class="detail mt-1">
                                    <p class="text-gray-500">{{ vaccines.first.spots.name }}</p>
                                </div>
                            </div>
                            <div class="status flex justify-between w-full mb-3">
                                <div class="info">
                                    <p class="font-bold text-lg">Vaccine</p>
                                </div>
                                <div class="detail mt-1">
                                    <p class="text-gray-500">{{ vaccines.first.vaccines.name }}</p>
                                </div>
                            </div>
                            <div class="status flex justify-between w-full mb-3">
                                <div class="info">
                                    <p class="font-bold text-lg">Vaccinator</p>
                                </div>
                                <div class="detail mt-1">
                                    <p class="text-gray-500">{{ vaccines.first.doctors.name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="vaccines.second" class="card border border-solid border-gray-300 p-3 w-[300px]">
                        <div class="heading">
                            <h1 class="font-bold text-lg text-gray-700">First Vaccination</h1>
                        </div>
                        <div class="content mt-5">
                            <div class="status flex justify-between w-full mb-3">
                                <div class="info">
                                    <p class="font-bold text-lg">Status</p>
                                </div>
                                <div class="detail mt-1">
                                    <div class="bg-primary rounded p-1">
                                        <p class="text-white font-bold text-xs">Vaccinated</p>
                                    </div>
                                </div>
                            </div>
                            <div class="status flex justify-between w-full mb-3">
                                <div class="info">
                                    <p class="font-bold text-lg">Date</p>
                                </div>
                                <div class="detail mt-1">
                                    <p class="text-gray-500">Oktober 27, 2021</p>
                                </div>
                            </div>
                            <div class="status flex justify-between w-full mb-3">
                                <div class="info">
                                    <p class="font-bold text-lg">Spot</p>
                                </div>
                                <div class="detail mt-1">
                                    <p class="text-gray-500">RSUD Anggrek</p>
                                </div>
                            </div>
                            <div class="status flex justify-between w-full mb-3">
                                <div class="info">
                                    <p class="font-bold text-lg">Vaccine</p>
                                </div>
                                <div class="detail mt-1">
                                    <p class="text-gray-500">Sinovac</p>
                                </div>
                            </div>
                            <div class="status flex justify-between w-full mb-3">
                                <div class="info">
                                    <p class="font-bold text-lg">Vaccinator</p>
                                </div>
                                <div class="detail mt-1">
                                    <p class="text-gray-500">Dr. Aprilia Intan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="add-consultations mt-5 mb-5">
                    <div v-if="!vaccines.second">
                        <a href="/hospitals">
                            <button class="bg-primary text-white px-4 py-2 font-semibold rounded shadow-sm shadow-indigo-500/50 hover:bg-indigo-500">Add Vaccination</button>
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

const vaccines = ref('')

const getVaccines = async () => {
    const res = await ApiServices.getVaccines()
    if(res.status == 200){
        vaccines.value = res.data.data.vaccination
        console.log(vaccines.value)
    }
}

onMounted(() => {
    getVaccines()
})
</script>

<style lang="scss" scoped>

</style>