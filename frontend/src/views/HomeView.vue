<template>
  <NavbarComponentVue />
  <div>
    <main id="jumbotron" class="h-[600px]">
        <div class="flex container mx-auto p-6 justify-between h-full">
            <div class="text-content w-1/2 flex flex-col align-middle h-full justify-center">
                <h1 class="text-6xl text-primary font-bold">Fight Virus With Vaccine</h1>
                <p class="text-lg text-gray-400 max-w-lg mt-6">Let's stop this pandemic by killing the virus with a vaccine. Don't let yourself and your family get infected.</p>
                <div class="mt-6">
                    <button class="bg-primary shadow-lg shadow-indigo-500/50 font-semibold text-white rounded px-4 py-2 hover:bg-transparent hover:bg-indigo-500">Get vaccine</button>
                </div>
            </div>
            <div class="image-content w-1/2 h-full">
                <img src="@/assets/images/Fighting against Coronavirus-amico.png" class="w-full h-full object-cover" alt="image-vaccine">
            </div>
        </div>
    </main>
  </div>
</template>

<script setup>
import NavbarComponentVue from '../components/NavbarComponent.vue';
</script>

<style lang="scss" scoped>

</style>