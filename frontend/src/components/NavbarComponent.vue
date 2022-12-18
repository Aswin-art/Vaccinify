<template>
    <nav id="navbar" class="">
        <div class="flex relative container mx-auto p-6 justify-between">
            <div class="logo">
                <a href="/">
                    <h1 class="text-2xl font-bold text-primary">Vaccination</h1>
                </a>
            </div>
            <div class="menu flex gap-5 list-none justify-center align-middle mt-2">
                <div>
                    <a href="/" class="text-md font-semibold text-gray-500 hover:text-primary">Home</a>
                </div>
                <div>
                    <a href="/consultations" class="text-md font-semibold text-gray-500 hover:text-primary">Consultation</a>
                </div>
                <div>
                    <a href="/hospitals" class="text-md font-semibold text-gray-500 hover:text-primary">Hospitals</a>
                </div>
                <div>
                    <a href="/vaccines" class="text-md font-semibold text-gray-500 hover:text-primary">Vaccines</a>
                </div>
                <div class="-mt-2">
                    <a href="/login" v-if="!isLogin">
                        <button class="bg-primary shadow-lg shadow-indigo-500/50 text-md font-semibold text-white rounded px-4 py-2 hover:bg-indigo-500">
                            Login
                        </button>
                    </a>
                    <button @click.prevent="logout" v-if="isLogin" class="bg-red-500 shadow-lg shadow-red-500/40 text-md font-semibold text-white rounded px-4 py-2 hover:bg-red-600">
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { useRouter } from 'vue-router';
import ApiServices from '../services/api/ApiServices';
const isLogin = localStorage.getItem('isLogin')
const router = useRouter()

const logout = async () => {
    const res = await ApiServices.logout()
    if(res.status == 200){
        localStorage.clear()
        router.push('/login')
    }
}
</script>

<style lang="scss" scoped>

</style>