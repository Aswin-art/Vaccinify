<template>
    <NavbarComponentVue />
    <div>
        <main id="login">
            <div class="container p-6 mx-auto">
                <div class="card border border-solid border-indigo-200 w-[500px] mx-auto p-6">
                    <div class="heading">
                        <h1 class="font-bold text-2xl text-primary">Login Page</h1>
                        <p class="mt-3">Don't have any account yet ? <a href="/" class="text-primary">register here</a></p>
                    </div>
                    <div class="content">
                        <div class="email mt-8 mb-8">
                            <input v-model="data.id_card_number" type="text" class="w-full p-2 border-gray-300 border-solid border-b-2 outline-none focus:border-primary" placeholder="ID Card Number">
                        </div>
                        <div class="password mb-8">
                            <input v-model="data.password" type="password" class="w-full p-2 border-gray-300 border-solid border-b-2 outline-none focus:border-primary" placeholder="Password">
                        </div>
                        <div class="btn mb-4">
                            <button @click.prevent="login" class="px-4 py-2 bg-primary rounded text-white shadow-lg shadow-indigo-500/50 hover:bg-indigo-500">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import NavbarComponentVue from '../components/NavbarComponent.vue';
import ApiService from '../services/api/ApiServices'
import { ref } from '@vue/reactivity';
import { useRouter } from 'vue-router';

const data = ref({
    id_card_number: '',
    password: ''
})

const router = useRouter()

const login = async () => {
    const res = await ApiService.login(data.value)
    if(res.status == 200){
        console.log(res)
        alert('Login Success')
        localStorage.setItem('isLogin', true)
        localStorage.setItem('token', res.data.data.token)
        router.push('/')
    }else{
        alert('Username/Password Invalid')
    }
}
</script>

<style lang="scss" scoped>

</style>