<template>
  <NavbarComponentVue />
  <div>
    <main id="hospital">
      <div class="container mx-auto p-6">
        <div class="hospital-list grid grid-cols-4 gap-4">
          <div v-for="hospital in hospitals" :key="hospital.id">
            <div
              class="card p-3 shadow-sm cursor-pointer hover:shadow-lg transition-all"
            >
              <router-link v-if="!hospital.unavailable" :to="{name: 'detail-hospital', params: {id: hospital.id}}">
                <div class="image">
                  <img
                    src="@/assets/images/Hospital building-amico.png"
                    alt="hospital"
                  />
                </div>
                <div class="heading mt-3">
                  <h1 class="text-xl font-bold">{{ hospital.name }}</h1>
                </div>
                <div class="content mt-5">
                  <div class="serve">
                    <span class="title font-bold">Serve: </span>
                    <span v-if="hospital.serve == 1" class="content text-gray-500">First Vaccine</span>
                    <span v-if="hospital.serve == 2" class="content text-gray-500">Second Vaccine</span>
                    <span v-if="hospital.serve == 3" class="content text-gray-500">Fisrt & Second Vaccine</span>
                  </div>
                  <div class="vaccines">
                    <span class="title font-bold">Vaccines: </span>
                    <span class="content text-gray-500">
                      {{ hospital.vaccines.name }}
                    </span>
                  </div>
                  <div class="address">
                    <span class="title font-bold">Address: </span>
                    <span class="content text-gray-500">
                      <span>{{ hospital.address }}</span>
                    </span>
                  </div>
                </div>
              </router-link>
              <div v-if="hospital.unavailable" class="hover:cursor-not-allowed">
                <div class="image">
                  <img
                    src="@/assets/images/Hospital building-amico.png"
                    alt="hospital"
                  />
                </div>
                <div class="heading mt-3">
                  <h1 class="text-xl font-bold">{{ hospital.name }}</h1>
                </div>
                <div class="content mt-5">
                  <div class="serve">
                    <span class="title font-bold">Serve: </span>
                    <span v-if="hospital.serve == 1" class="content text-gray-500">First Vaccine</span>
                    <span v-if="hospital.serve == 2" class="content text-gray-500">Second Vaccine</span>
                    <span v-if="hospital.serve == 3" class="content text-gray-500">Fisrt & Second Vaccine</span>
                  </div>
                  <div class="vaccines">
                    <span class="title font-bold">Vaccines: </span>
                    <span class="content text-gray-500">
                      {{ hospital.vaccines.name }}
                    </span>
                  </div>
                  <div class="address">
                    <span class="title font-bold">Address: </span>
                    <span class="content text-gray-500">
                      <span>{{ hospital.address }}</span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script setup>
import { ref } from "@vue/reactivity";
import { onMounted } from "@vue/runtime-core";
import NavbarComponentVue from "../components/NavbarComponent.vue";
import ApiServices from "../services/api/ApiServices";

const hospitals = ref('')

let vaccines = []

const getHospitals = async () => {
  const res = await ApiServices.getSpots()
  if(res.status == 200){
    console.log(res.data.data)
    hospitals.value = res.data.data

    for(let i = 0; i < hospitals.value.length; ++i){
      console.log('hos', hospitals.value)
    }
  }
}

onMounted(() => {
  getHospitals()
})
</script>

<style lang="scss" scoped></style>
