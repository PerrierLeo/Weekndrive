<template>
<app-layout title='Weekndrive'>
    <Head title="Connexion" />
  <main class="bg-gray-800 relative overflow-hidden h-screen items-center">

 <div class="bg-gray-800 flex relative z-20">
      <div class="container mx-auto px-6 flex relative py-16">
        <div class="sm:w-2/3 lg:w-2/5 flex flex-col relative z-20 ">
          <span class="w-20 h-2 bg-white mb-12"> </span>

            <span class="text-5xl sm:text-5xl font-bebas-neue uppercase font-black flex flex-col leading-none text-white">
                Connexion
            </span>

                <a  :href="route('register')" class="text-xs text-pink-400 uppercase hover:underline sm:text-base">Pas encore inscrit?</a>


             <form @submit.prevent="submit">
                <jet-validation-errors class="mb-4" />
                <div class="mt-8">
                    <a href="#" class="flex items-center justify-center mt-4 text-gray-600 border rounded-lg dark:bg-gray-700 dark:text-gray-200 hover:bg-blue-500">
                        <div class="px-4 py-2">
                            <svg class="w-6 h-6" viewBox="0 0 40 40">
                                <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.045 27.2142 24.3525 30 20 30C14.4775 30 10 25.5225 10 20C10 14.4775 14.4775 9.99999 20 9.99999C22.5492 9.99999 24.8683 10.9617 26.6342 12.5325L31.3483 7.81833C28.3717 5.04416 24.39 3.33333 20 3.33333C10.7958 3.33333 3.33335 10.7958 3.33335 20C3.33335 29.2042 10.7958 36.6667 20 36.6667C29.2042 36.6667 36.6667 29.2042 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#FFC107"/>
                                <path d="M5.25497 12.2425L10.7308 16.2583C12.2125 12.59 15.8008 9.99999 20 9.99999C22.5491 9.99999 24.8683 10.9617 26.6341 12.5325L31.3483 7.81833C28.3716 5.04416 24.39 3.33333 20 3.33333C13.5983 3.33333 8.04663 6.94749 5.25497 12.2425Z" fill="#FF3D00"/>
                                <path d="M20 36.6667C24.305 36.6667 28.2167 35.0192 31.1742 32.34L26.0159 27.975C24.3425 29.2425 22.2625 30 20 30C15.665 30 11.9842 27.2359 10.5975 23.3784L5.16254 27.5659C7.92087 32.9634 13.5225 36.6667 20 36.6667Z" fill="#4CAF50"/>
                                <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.7592 25.1975 27.56 26.805 26.0133 27.9758C26.0142 27.975 26.015 27.975 26.0158 27.9742L31.1742 32.3392C30.8092 32.6708 36.6667 28.3333 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#1976D2"/>
                            </svg>
                        </div>
                    <span class="w-5/6 px-4 py-3 font-bold text-center text-sm sm:text-base text-white">Sign in with Google</span>
                    </a>
                </div>

                <div class="flex items-center justify-between mt-4">
                    <span class="w-1/5 border-b dark:border-gray-600 lg:w-1/4"></span>
                    <p class="text-xs text-center text-white uppercase">or login with email</p>
                    <span class="w-1/5 border-b dark:border-gray-400 lg:w-1/4"></span>
                </div>


                <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                    {{ status }}
                </div>
                <div class="mt-4">
                    <label class="text-sm sm:text-base text-white" for="LoggingEmailAddress">Adresse email</label>
                    <input id="LoggingEmailAddress" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-100 dark:focus:border-blue-500 focus:outline-none focus:ring" type="email" v-model="form.email" required autofocus >
                </div>

                <div class="mt-4">
                    <div class="flex justify-between">
                        <label class="text-sm sm:text-base text-white" for="password" >Mot de passe</label>
                    </div>
                    <input  id="password" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-100 dark:focus:border-blue-500 focus:outline-none focus:ring" type="password" v-model="form.password" required autocomplete="current-password">
                </div>
                <a v-if="canResetPassword" :href="route('password.request')" class="text-xs sm:text-base text-white hover:underline">Mot de passe oublié?</a>

                <div class="mt-8">
                    <button  type='submit' class="w-full uppercase py-2 px-4 rounded-lg bg-pink-500 border-2 border-transparent text-white text-md mr-4 hover:bg-pink-400 focus:outline-none focus:bg-gray-600">
                       Connexion
                   </button>
                </div>
            </form>
          </div>
      </div>

    </div>
  </main>

</app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
    import { Head, Link } from '@inertiajs/inertia-vue3';
import AppLayout from '../../Layouts/AppLayout.vue'

    export default defineComponent({
        components: {
            Head,
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            Link,
                AppLayout,
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    })
</script>
