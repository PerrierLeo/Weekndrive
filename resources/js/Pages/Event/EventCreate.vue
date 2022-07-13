<template>
    <app-layout title='Weekndrive'>



<div class="bg-gray-800">
  <div class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:max-w-7xl lg:px-8">

    <form @submit.prevent="submit" class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">
      <div>
        <div >
          <h2 class="text-lg font-medium text-white">Inscription Evènement</h2>
                <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                  <div class="sm:col-span-2">
                    <label for="country" class="block text-sm font-medium text-gray-200">Véhicule</label>
                    <div class="mt-1">
                      <select id="country" v-model='form.car_id' class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      <option disabled>Sélectionnez parmi vos véhicules</option>
                      <option v-for='car in user.car' :key='car.id' :value="car">
                            {{car.brand}} {{car.model}}
                      </option>
                      </select>
                    </div>
                        <jet-input-error :message="form.errors.car_id" class="mt-2" />

                  </div>

                  <div  :class="nbPilote < 1 ? 'sm:col-span-2':'sm:col-span-1'">
                    <label for="address"  class="block text-sm font-medium text-gray-200">Pilotes supplémentaires</label>
                    <div class="mt-1">
                      <select @change='pilote' id="second_pilote"  v-model='form.second_pilote' class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      <option disabled>Sélectionnez parmi vos pilotes</option>
                       <option v-for='pilote in user.pilote' :key='pilote.id' :value="pilote">
                         {{pilote.firstname}} {{pilote.lastname}}
                      </option>
                      <option value=''></option>
                      </select>
                      </div>
                        <jet-input-error :message="form.errors.second_pilote" class="mt-2" />
                  </div>

                  <div class="sm:col-span-1" v-if='this.form.second_pilote'>
                    <label for="address" class="block text-sm font-medium text-gray-200" >Troisième Pilote</label>
                    <div class="mt-1">
                      <select @change='pilote' id="thirdPilote" name="thirdPilote" v-model='form.third_pilote' class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      <option disabled>Sélectionnez parmi vos pilotes</option>
                      <option value=''></option>
                       <option v-for='pilote in user.pilote' :key='pilote.id' :value="pilote">
                                                         {{pilote.firstname}} {{pilote.lastname}}
                      </option>
                      </select>
                      </div>
                         <jet-input-error :message="form.errors.third_pilote" class="mt-2" />

                  </div>

                  <div :class="nbCompanion < 1 ? 'sm:col-span-2':'sm:col-span-1'">
                    <label for="address" class="block text-sm font-medium text-gray-200">Premier Accompagnant</label>
                    <div class="mt-1">
                      <select @change='companion' id="firstCompanion" name="firstCompanion" v-model='form.first_companion' class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      <option disabled>Sélectionnez parmi vos accompagnant</option>
                       <option v-for='companion in user.companion' :key='companion.id' :value="companion">
                                                         {{companion.firstname}} {{companion.lastname}}
                      </option>
                      <option value=''></option>
                      </select>
                      </div>
                        <jet-input-error :message="form.errors.first_companion" class="mt-2" />
                  </div>

                  <div class="sm:col-span-1" v-if='this.form.first_companion'>
                    <label for="address" class="block text-sm font-medium text-gray-200" >Second Accompagnant</label>
                    <div class="mt-1">
                      <select @change='companion' id="secondCompanion" name="secondCompanion" v-model='form.second_companion' class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      <option disabled>Sélectionnez parmi vos accompagnant</option>
                       <option v-for='companion in user.companion' :key='companion.id' :value="companion">
                                                         {{companion.firstname}} {{companion.lastname}}
                      </option>
                      <option value=''></option>
                      </select>
                      </div>
                    <jet-input-error :message="form.errors.second_companion" class="mt-2" />
                  </div>
                </div>
            </div>





          <!-- Payment -->
      </div>

      <!-- Order summary -->
      <div class="mt-10 lg:mt-0">
        <h2 class="text-lg font-medium text-white">Récapitulatif</h2>

        <div class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm">
          <h3 class="sr-only">Items in your cart</h3>
          <ul role="list" class="divide-y divide-gray-200">
            <li class="flex py-6 px-4 sm:px-6">
              <div class="flex-shrink-0">
                <img :src="'/storage/'+event.image_event"  alt="Front of men&#039;s Basic Tee in black." class="w-20 rounded-md">
              </div>

              <div class="ml-6 flex-1 flex flex-col">
                <div class="flex">
                  <div class="min-w-0 flex-1">
                    <h4 class="text-sm">
                      <a href="#" class="font-medium text-gray-700 hover:text-gray-800">
                        {{event.name}}
                      </a>
                    </h4>
                    <p class="mt-1 text-sm text-gray-500">
                      Pilote principal : {{user.firstname}} {{user.lastname}}
                    </p>
                    <p class="mt-1 text-sm text-gray-500">
                      Véhicule : {{this.form.car_id.brand}} {{this.form.car_id.model}}
                    </p>
                  </div>

                  <div class="ml-4 flex-shrink-0 flow-root">
                    <p class="mt-1 text-sm font-medium text-gray-900">{{event.price}}€</p>
                  </div>
                </div>


              </div>
            </li>

            <!-- Pilote Supplémentaires -->
             <li class="flex py-6 px-4 sm:px-6">
              <div class="flex-shrink-0">
                <div class="w-20 rounded-md"> </div>
              </div>

              <div class="ml-6 flex-1 flex flex-col">
                <div class="flex">
                  <div class="min-w-0 flex-1">
                    <h4 class="text-sm">
                      <a href="#" class="font-medium text-gray-700 hover:text-gray-800">
                        Pilotes supplémentaires
                      </a>
                    </h4>
                    <p class="mt-1 text-sm text-gray-500" v-if='form.second_pilote'>
                      Second Pilote : {{form.second_pilote.firstname}} {{form.second_pilote.lastname}}</p>
                    <p class="mt-1 text-sm text-gray-500" v-if='form.third_pilote && form.second_pilote'>
                      Troisième Pilote : {{form.third_pilote.firstname}} {{form.third_pilote.lastname}}
                    </p>
                  </div>

                  <div class="ml-4 flex-shrink-0 flow-root">
                    <p class="mt-1 text-sm font-medium text-gray-900">{{getotalpilote}}€</p>
                  </div>
                </div>
              </div>
            </li>


            <!-- Companion -->
              <li class="flex py-6 px-4 sm:px-6">
              <div class="flex-shrink-0">
                <div class="w-20 rounded-md"> </div>
              </div>

              <div class="ml-6 flex-1 flex flex-col">
                <div class="flex">
                  <div class="min-w-0 flex-1">
                    <h4 class="text-sm">
                      <a href="#" class="font-medium text-gray-700 hover:text-gray-800">
                        Accompagnants supplémentaires
                      </a>
                    </h4>
                    <p class="mt-1 text-sm text-gray-500" v-if='form.first_companion'>
                        Premier Accompagnant : {{form.first_companion.firstname}} {{form.first_companion.lastname}}
                    </p>
                    <p class="mt-1 text-sm text-gray-500" v-if='form.second_companion && form.first_companion'>
                      Second Accompagnant : {{form.second_companion.firstname}} {{form.second_companion.lastname}}
                    </p>
                  </div>

                  <div class="ml-4 flex-shrink-0 flow-root">
                  <p class="mt-1 text-sm font-medium text-gray-900" >{{getotalcompanion}}€</p>

                  </div>
                </div>


              </div>
            </li>


            <!-- More products... -->
          </ul>
          <dl class="border-t border-gray-200 py-6 px-4 space-y-6 sm:px-6">
            <div class="flex items-center justify-between">
              <dt class="text-sm">
                Sous total HT
              </dt>
              <dd class="text-sm font-medium text-gray-900">
                {{gettotalpriceht}}€
              </dd>
            </div>

            <div class="flex items-center justify-between border-t border-gray-200 pt-6">
              <dt class="text-base font-medium">
                Total TTC
              </dt>
              <dd class="text-base font-medium text-gray-900">
                  {{gettotalpriceht}} * TVA
              </dd>
            </div>
          </dl>

          <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
             <slot name="actions">
                <button type="submit" class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Valider la participation</button>
            </slot>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>




    </app-layout>
</template>
<script>
import { defineComponent } from 'vue'
    import { useForm } from "@inertiajs/inertia-vue3";

import AppLayout from '@/Layouts/AppLayout.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetInputError from '@/Jetstream/InputError.vue'



export default defineComponent({
    props: ['event', 'user'],
  components: {
      AppLayout,
      JetLabel,
      JetInputError

       },

    data() {
            return {


                nbPilote: '',
                nbCompanion: '',


            }
        },
        setup() {
        const form = useForm({
            car_id: '',
            second_pilote: '',
            third_pilote: '',
            first_companion: '',
            second_companion: '',
            total_price_ht: '',
            total_pilote_price:'',
            total_companion_price:''
        });

        return { form };
    },

     computed:{
                getotalpilote(){
                    return this.form.total_pilote_price = this.nbPilote * this.event.pilote_price
                },
                 getotalcompanion(){
                    return this.form.total_companion_price = this.nbCompanion * this.event.companion_price
                },
                  gettotalpriceht(){
                    return this.form.total_price_ht = this.getotalpilote + this.getotalcompanion + this.event.price
                }

            },
        methods:{

            pilote: function(){
                if(this.form.second_pilote != '' && this.form.third_pilote == ''){
                    return this.nbPilote = 1
                }else if(this.form.second_pilote == '' && this.form.third_pilote != '' ){
                    return this.nbPilote = 0
                }else if(this.form.second_pilote!= '' && this.form.third_pilote != '' ){
                    return this.nbPilote = 2
                }else if(this.form.second_pilote == '' && this.form.third_pilote == '' ){
                    return this.nbPilote = 0}
            },

            companion: function(){
                if(this.form.first_companion != '' && this.form.second_companion == ''){
                    return this.nbCompanion = 1
                }else if(this.form.first_companion == '' && this.form.second_companion != '' ){
                    return this.nbCompanion = 0
                }else if(this.form.first_companion != '' && this.form.second_companion != ''){
                    return this.nbCompanion = 2
                }else if(this.form.first_companion == '' && this.form.second_companion == '' ){
                    return this.nbCompanion = 0}
            },

             submit() {


                this.form.post(route("event_register.store", {id: this.user.id, event_id: this.event.id}),{
                preserveScroll: true,
                onSuccess: () => (this.form.reset()),

                });
            },





        }
})
</script>
