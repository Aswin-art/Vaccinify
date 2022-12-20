<template>
  <NavbarComponentVue />
  <div>
    <main id="detail_hospital" class="bg-primary h-[600px]">
      <div
        class="content container mx-auto p-6 flex align-middle w-full h-full justify-between"
      >
        <div
          class="text flex-1 flex justify-center align-middle flex-col gap-5"
        >
          <h1 class="heading text-5xl text-white font-bold">{{ hospital.spot.name }}</h1>
          <div class="vaccine_list text-gray-500 text-xs">
            <span class="rounded bg-white p-1">{{ hospital.spot.vaccine.name }}</span>
          </div>
          <div class="adress text-white">
            {{ hospital.spot.address }}
          </div>
          <div class="btn">
            <a href="#register">
              <button
                class="bg-white text-md shadow-lg font-semibold text-primary rounded px-4 py-2 hover:shadow-2xl"
              >
                Register Vaccination
              </button>
            </a>
          </div>
        </div>

        <div class="image flex-1">
          <img
            src="@/assets/images/Hospital building-amico.png"
            alt="hospital_building"
            class="w-11/12 w- h-full"
          />
        </div>
      </div>
    </main>

    <div id="register" class="register_vaccine mt-10 container mx-auto p-6">
      <div class="select_date">
        <p>Select vaccination date</p>
        <input
          type="date"
          name="vaccination_date"
          id="vaccination_date"
          class="mt-3 border border-solid p-1 cursor-pointer"
        />
      </div>

      <div class="session mt-5">

      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "@vue/reactivity";
import { onBeforeMount, onMounted } from "@vue/runtime-core";
import { useRoute } from "vue-router";
import NavbarComponentVue from "../components/NavbarComponent.vue";
import ApiServices from "../services/api/ApiServices";

const hospital = ref('')

const route = useRoute()

const getHospitalInfo = async () => {
  const res = await ApiServices.getDetailSpot(route.params.id)
  if(res.status == 200){
    hospital.value = res.data.data
  }
}

onBeforeMount(() => {
  getHospitalInfo()
})
</script>

<style scoped>
html, body{
  scroll-behavior: smooth;
}
</style>
