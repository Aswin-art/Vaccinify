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
          <h1 class="heading text-5xl text-white font-bold">RSUD Anggrek</h1>
          <div class="vaccine_list text-gray-500 text-xs">
            <span class="rounded bg-white p-1">Sinovac</span>
            <span class="rounded bg-white p-1">AstraZeneca</span>
            <span class="rounded bg-white p-1">Pfizer</span>
            <span class="rounded bg-white p-1">Moderna</span>
          </div>
          <div class="adress text-white">
            Jln. Anggrek No.15, Masangan Kulon, Sidoarjo, Jawa Timur, Indonesia
          </div>
          <div class="btn">
            <button
              class="bg-white text-md shadow-lg font-semibold text-primary rounded px-4 py-2 hover:shadow-2xl"
            >
              Register Vaccination
            </button>
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

    <div class="register_vaccine mt-10 container mx-auto p-6">
      <div class="select_date">
        <p>Select vaccination date</p>
        <input
          type="date"
          name="vaccination_date"
          id="vaccination_date"
          class="mt-3 border border-solid p-1 cursor-pointer"
        />
      </div>

      <div class="session mt-5"></div>
    </div>
  </div>
</template>

<script setup>
import NavbarComponentVue from "../components/NavbarComponent.vue";
</script>

<style lang="scss" scoped></style>
