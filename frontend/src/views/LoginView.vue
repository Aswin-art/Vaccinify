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
                            <input type="email" class="w-full p-2 border-gray-300 border-solid border-b-2 outline-none focus:border-primary" placeholder="example@gmail.com">
                        </div>
                        <div class="password mb-8">
                            <input type="password" class="w-full p-2 border-gray-300 border-solid border-b-2 outline-none focus:border-primary" placeholder="password...">
                        </div>
                        <div class="btn mb-4">
                            <button class="px-4 py-2 bg-primary rounded text-white shadow-lg shadow-indigo-500/50 hover:bg-indigo-500">Login</button>
                        </div>
                    </div>
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