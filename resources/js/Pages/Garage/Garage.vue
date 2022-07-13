<template>
    <app-layout title="Garage">
        <template #header class='flex'>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Garage
            </h2>
        </template>


        <div class='bg-gray-800'>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                <div>
                    <jet-section-border />
                     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4 ">
                         <div class=" grid md:grid-cols-3 lg:grid-cols-3 gap-x-6 gap-y-8">
                            <div class="bg-white relative rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transform duration-200" v-for="car in cars" :key="car.id">
                                <show-car class="mt-10 sm:mt-0" :user="$page.props.user" :car="car" />
                            </div>
                        </div>
                    </div>
                </div>
                <jet-section-border />

             <div>
                    <add-car :countCar='$page.props.countCar' class="mt-10 sm:mt-0" />

                    <jet-section-border />
                </div>

                 <div>
                     <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4 ">
                        <section class=" grid md:grid-cols-3 lg:grid-cols-5 gap-x-6 gap-y-8">
                            <article class="bg-white group relative rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transform duration-200" v-for="pilote in pilotes" :key="pilote.id">
                                <show-pilote :pilote='pilote' class="mt-10 sm:mt-0" />
                            </article>
                        </section>
                    </section>

                    <jet-section-border />


                </div>

                 <div>
                    <add-pilote :user="$page.props.user" :countPilote='countPilote' class="mt-10 sm:mt-0" />

                    <jet-section-border />
                </div>

                 <div>

                     <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4 ">
                        <section class=" grid md:grid-cols-3 lg:grid-cols-5 gap-x-6 gap-y-8">
                            <article class="bg-white group relative rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transform duration-200" v-for="companion in companions" :key="companion.id">
                                <show-companion :companion="companion" class="mt-10 sm:mt-0" />
                            </article>
                        </section>
                    </section>
                    <jet-section-border />



                </div>


                <div>
                    <add-companion :user="$page.props.user" :countCompanion='countCompanion' class="mt-10 sm:mt-0" />

                    <jet-section-border />
                </div>


            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import JetSectionBorder from '@/Jetstream/SectionBorder.vue'

    import AddCar from '@/Pages/Garage/Partials/AddCar.vue'
    import AddPilote from '@/Pages/Garage/Partials/AddPilote.vue'
    import AddCompanion from '@/Pages/Garage/Partials/AddCompanion.vue'

    import ShowCar from '@/Pages/Garage/Partials/ShowCar.vue'
    import ShowPilote from '@/Pages/Garage/Partials/ShowPilote.vue'
    import ShowCompanion from '@/Pages/Garage/Partials/ShowCompanion.vue'

    export default defineComponent({
        props: ['cars', 'user', 'pilotes', 'companions', 'countCar', 'countPilote', 'countCompanion'],

        components: {
            AppLayout,
            JetSectionBorder,
            ShowCar,
            AddPilote,
            AddCompanion,
            AddCar,
            ShowPilote,
            ShowCompanion
        },
    })
</script>
