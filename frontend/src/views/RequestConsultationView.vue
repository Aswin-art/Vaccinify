<template>
  <NavbarComponentVue />
  <div>
    <main id="request_consultation" class="h-[300px] bg-primary">
      <div
        class="heading flex w-full h-full flex-col align-middle justify-center"
      >
        <h1 class="text-white font-bold text-5xl mx-auto">
          Request Consultation
        </h1>
      </div>
    </main>

    <div class="container px-6 mx-auto mt-20">
      <div class="flex justify-between">
        <div class="form_consultation flex-1">
          <div class="heading">
            <h1 class="text-2xl font-bold">Add your consultation</h1>
          </div>
          <div class="content mt-6">
            <form action="">
              <div class="disease_history flex gap-5">
                <p>Do you have disease history?</p>
                <select
                  v-model="hasDisease"
                  name="disease"
                  id="disease"
                  class="border-2 border-solid outline-none focus:border-primary"
                >
                  <option value="yes">Yes, I have</option>
                  <option value="no">No, I Don't</option>
                </select>
              </div>
              <div v-if="hasDisease == 'yes'" class="textarea_disease mt-3">
                <textarea
                  v-model="data.disease_history"
                  name=""
                  id=""
                  cols="50"
                  rows="7"
                  placeholder="Describe your disease..."
                  class="border-2 border-solid outline-none p-3 focus:border-primary"
                ></textarea>
              </div>
              <div class="symptoms_history flex gap-5 mt-3">
                <p>Do you have symptoms now?</p>
                <select
                  v-model="hasSymptoms"
                  name="symptoms"
                  id="symptoms"
                  class="border-2 border-solid outline-none focus:border-primary"
                >
                  <option value="yes">Yes, I have</option>
                  <option value="no">No, I Don't</option>
                </select>
              </div>
              <div v-if="hasSymptoms == 'yes'" class="textarea_symptoms mt-3">
                <textarea
                  v-model="data.current_symptoms"
                  name=""
                  id=""
                  cols="50"
                  rows="7"
                  placeholder="Describe your symptoms..."
                  class="border-2 border-solid outline-none p-3 focus:border-primary"
                ></textarea>
              </div>
              <div class="btn mt-3">
                <button
                  @click.prevent="requestConsultation"
                  class="bg-primary shadow-lg shadow-indigo-500/50 font-semibold text-white rounded px-4 py-2 hover:bg-indigo-500"
                >
                  Send Request
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="image flex-1">
          <img
            src="@/assets/images/Rheumatology-amico.png"
            alt="form_consultation_image"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from "@vue/reactivity";
import { useRouter } from "vue-router";
import NavbarComponentVue from "../components/NavbarComponent.vue";
import ApiServices from "../services/api/ApiServices";

const data = ref({
  disease_history: '',
  current_symptoms: '',
})

const router = useRouter()
const hasDisease = ref('no')
const hasSymptoms = ref('no')

const requestConsultation = async () => {
  const res = await ApiServices.requestConsultation(data.value)
  if(res.status == 200){
    alert('Request sent successfully')
    router.push('/consultations')
  }else{
    alert('Your request failed')
  }
}
</script>

<style lang="scss" scoped></style>
