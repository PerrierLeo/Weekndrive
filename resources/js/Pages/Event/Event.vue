<template>
    <app-layout title='Weekndrive'>

        <main class="bg-gray-800 h-screen">

            <section>
    <div class="bg-gray-800 text-white py-8">
    <div class="container mx-auto flex flex-col items-start md:flex-row my-12 md:my-24">
      <div class="flex flex-col w-full sticky md:top-36 lg:w-1/3 mt-2 md:mt-12 px-8">
        <p class="ml-2 text-yellow-300 uppercase tracking-loose">{{event.title}}</p>
        <p class="text-3xl md:text-4xl leading-normal md:leading-relaxed mb-2">{{event.name}}</p>
        <p class="text-sm md:text-base text-gray-50 mb-4">
        </p>
        <a :href="route('event_register.create', { id: event.id })"
        class="bg-transparent mr-auto hover:bg-yellow-300 text-yellow-300 hover:text-white rounded shadow hover:shadow-lg py-2 px-4 border border-yellow-300 hover:border-transparent">
        Participez!</a>
      </div>
      <div class="ml-0 md:ml-12 lg:w-2/3 sticky">
        <div class="container mx-auto w-full h-full">
          <div class="relative wrap overflow-hidden p-10 h-full">
            <div class="border-2-2 border-yellow-555 absolute h-full border"
              style="right: 50%; border: 2px solid #FFC100; border-radius: 1%;"></div>
            <div class="border-2-2 border-yellow-555 absolute h-full border"
              style="left: 50%; border: 2px solid #FFC100; border-radius: 1%;"></div>
            <div class="mb-8 flex justify-between flex-row-reverse items-center w-full left-timeline">
              <div class="order-1 w-5/12"></div>
              <div class="order-1 w-5/12 px-1 py-4 text-right">
                <p class="mb-3 text-base text-yellow-300">{{event.start_date}} {{event.start_time}}</p>
                <h4 class="mb-3 font-bold text-lg md:text-2xl">Accueil</h4>
                <p class="text-sm md:text-base leading-snug text-gray-50 text-opacity-100">
                 Munissez vous de votre QR code recu par e-mail et de votre plus beau sourire !
                </p>
              </div>
            </div>
            <div class="mb-8 flex justify-between items-center w-full right-timeline">
              <div class="order-1 w-5/12"></div>
              <div class="order-1  w-5/12 px-1 py-4 text-left">
                <p class="mb-3 text-base text-yellow-300">6-9 May, 2021</p>
                <h4 class="mb-3 font-bold text-lg md:text-2xl">Participation</h4>
                <p class="text-sm md:text-base leading-snug text-gray-50 text-opacity-100">
                  Il est temps de faire chauffer les pneus avant l'entrée en piste !
                </p>
              </div>
            </div>
            <div class="mb-8 flex justify-between flex-row-reverse items-center w-full left-timeline">
              <div class="order-1 w-5/12"></div>
              <div class="order-1 w-5/12 px-1 py-4 text-right">
                <p class="mb-3 text-base text-yellow-300"> 10 May, 2021</p>
                <h4 class="mb-3 font-bold text-lg md:text-2xl">Déjeuner</h4>
                <p class="text-sm md:text-base leading-snug text-gray-50 text-opacity-100">
                  Restaurez vous aprés cette première matinée riche en émotion ..
                </p>
              </div>
            </div>

            <div class="mb-8 flex justify-between items-center w-full right-timeline">
              <div class="order-1 w-5/12"></div>

              <div class="order-1  w-5/12 px-1 py-4">
                <p class="mb-3 text-base text-yellow-300">12 May, 2021</p>
                <h4 class="mb-3 font-bold  text-lg md:text-2xl text-left">Prize Distribution</h4>
                <p class="text-sm md:text-base leading-snug text-gray-50 text-opacity-100">
                  The winners will be contacted by our team for their addresses and the winning goodies will be sent at
                  their addresses.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
        </main>
    </app-layout>
</template>
<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'


export default defineComponent({
    props: ['event'],
  components: {
      AppLayout,
       },
    setup() {

    },
})
</script>
