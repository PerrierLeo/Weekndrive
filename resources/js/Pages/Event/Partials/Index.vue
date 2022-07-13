<template>
     <div class="bg-gray-800  relative z-20 items-center overflow-hidden">

         <!-- Event 1 -->

      <div class="container justify-between mx-auto px-6 flex relative py-16" v-for='event in events' :key='event.id'>
        <div class="flex flex-col relative z-20 w-1/2">
          <span class="w-20 h-2 bg-white mb-12"> </span>
          <h1 class="font-bebas-neue uppercase text-4xl sm:text-3xl font-black flex flex-col leading-none text-white">
             {{event.title}}
            <span class="text-2xl sm:text-5xl">  {{event.name}} </span>
          </h1>
          <p class="text-sm mt-10 sm:text-base text-justify text-white">
            {{event.description}}
          </p>
          <div class="flex mt-8">
            <a :href="route('event.show', { id: event.id })" class="uppercase py-2 px-4 rounded-lg bg-pink-500 border-2 border-transparent text-white text-md mr-4 hover:bg-pink-400 ">
                Détails & Programme
            </a>
            <a
              href="#"
              class="uppercase py-2 px-4 rounded-lg bg-transparent border-2 border-pink-500 text-white hover:bg-pink-500 hover:text-white text-md">
              S'inscrire
            </a>
          </div>
        </div>
         <div class="flex flex-col relative z-20 w-1/3 mt-28">
             <img :src="'/storage/'+event.image_event" class=''>

        </div>
      </div>



    </div>

</template>
<script>
import { defineComponent } from 'vue'


export default defineComponent({
    props: ['events'],
  components: {
       },
    setup() {

    },
})
</script>
