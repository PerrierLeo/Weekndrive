<template>
    <Head title="Gestion" />
    <div class="flex flex-col lg:w-4/6 mt-2">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <div class='bg-white flex justify-between px-3 rounded-t-md'>
              <div class=" my-3 px-6 py-3 w-full font-bold text-gray-600 uppercase text-sm">Informations évènement</div>
              <div @click="startDeleteEvent" class=" cursor-pointer my-3 px-6 py-3 font-bold text-red-600 uppercase text-sm">Supprimer </div>

	    </div>
          <table class="min-w-full divide-y divide-gray-200">


             <div class="bg-white shadow overflow-hidden sm:rounded-b-lg">
                <div class="border-t border-gray-200">


                <dl>
                 <form @submit.prevent="submit">
                    <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Nom
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                         <!-- Nom -->
                         <div class="col-span-6 sm:col-span-3">
                             <jet-input id="name" type="text" class="mt-1 block" v-model="form.name"
                             :disabled="isCivility ? true : false"/>
                             <!--<jet-input-error :message="form.errors.firstname" class="mt-2" />-->
                         </div>
                    </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Titre / Description
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                         <!-- Title -->
                         <div class="col-span-6 sm:col-span-3">
                             <jet-input id="title" type="text" class="mt-1 block" v-model="form.title"
                             :disabled="isCivility ? true : false"/>
                             <!--<jet-input-error :message="form.errors.firstname" class="mt-2" />-->
                         </div>

                         <!-- Description -->
                         <div class="col-span-6 sm:col-span-3">
                            <jet-input-error :message="form.errors.description" class="mt-2" />
                             <textarea id="description" type="text" class="mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" v-model="form.description"
                             :disabled="isCivility ? true : false"/>
                             <!--<jet-input-error :message="form.errors.lastname" class="mt-2" />-->
                         </div>
                    </dd>
                    </div>
                           <!-- Date -->

                    <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Dates
                    </dt>
                    <dd class="mt-1 text-sm flex  text-gray-900  sm:mt-0 sm:col-span-2">
                        <div class="col-span-6 mr-4 sm:col-span-3" >
                            <jet-label for="start_date" value="Début"/>
                             <jet-input id="start_date" type="date" class="mt-1 block" v-model="form.start_date"
                             :disabled="isCivility ? true : false"/>
                             <!--<jet-input-error :message="form.errors.birthdate" class="mt-2" />-->
                        </div>

                        <div class="col-span-6 sm:col-span-3" >
                            <jet-label for="end_date" value="Fin"/>
                             <jet-input id="end_date" type="date" class="mt-1 block" v-model="form.end_date"
                             :disabled="isCivility ? true : false"/>
                             <!--<jet-input-error :message="form.errors.birthdate" class="mt-2" />-->
                        </div>
                    </dd>
                    </div>

                        <!-- Time -->
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Heures
                    </dt>
                    <dd class="mt-1 text-sm flex  text-gray-900  sm:mt-0 sm:col-span-2">
                        <div class="col-span-6 mr-4 sm:col-span-3" >
                            <jet-label for="start_time" value="Début"/>
                             <jet-input id="start_time" type="time" class="mt-1 block" v-model="form.start_time"
                             :disabled="isCivility ? true : false"/>
                             <!--<jet-input-error :message="form.errors.birthdate" class="mt-2" />-->
                        </div>

                        <div class="col-span-6 sm:col-span-3" >
                            <jet-label for="end_time" value="Fin"/>
                             <jet-input id="end_time" type="time" class="mt-1 block" v-model="form.end_time"
                             :disabled="isCivility ? true : false"/>
                             <!--<jet-input-error :message="form.errors.birthdate" class="mt-2" />-->
                        </div>
                    </dd>
                    </div>


                        <!-- Place -->
                    <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Place
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">

                        <div class="col-span-6 sm:col-span-3">
                            <jet-input id="available_place" type="number" class="mt-1 block" v-model="form.available_place"
                            :disabled="isCivility ? true : false"/>
                            <!--<jet-input-error :message="form.errors.mobile" class="mt-2" />-->
                        </div>
                    </dd>
                    </div>

                        <!-- Price -->
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Prix participation
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <div class="col-span-6 flex sm:col-span-3">
                            <jet-input id="price" type="number" class="mt-1 block" v-model="form.price"
                            :disabled="isCivility ? true : false"/>
                            <span>€</span>
                            <!--<jet-input-error :message="form.errors.mobile" class="mt-2" />-->
                        </div>
                    </dd>
                    </div>

                      <!-- Price for Pilote-->
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Prix par Pilote
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <div class="col-span-6 flex sm:col-span-3">
                            <jet-input id="pilote_price" type="number" class="mt-1 block" v-model="form.pilote_price"
                            :disabled="isCivility ? true : false"/>
                            <span>€</span>
                            <!--<jet-input-error :message="form.errors.mobile" class="mt-2" />-->
                        </div>
                    </dd>
                    </div>

                     <!-- Price for Companion-->
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Prix par Accompagnant
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <div class="col-span-6 flex sm:col-span-3">
                            <jet-input id="companion_price" type="number" class="mt-1 block" v-model="form.companion_price"
                            :disabled="isCivility ? true : false"/>
                            <span>€</span>
                            <!--<jet-input-error :message="form.errors.mobile" class="mt-2" />-->
                        </div>
                    </dd>
                    </div>

                        <!-- Status -->
                    <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm flex font-medium text-gray-500">
                        <div>Status</div>
                         <div class="text-sm   flex justify-between  text-gray-900" v-if="event.status === 'available'" >
                                <svg class="w-6 h-6 ml-2 text-white fill-current bg-green-500 rounded-xl overflow-hidden" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
                                 </svg>
                            </div>


                            <div class="text-sm  flex justify-between text-gray-900" v-else-if="event.status === 'archived'" >

                                <svg class="w-6 h-6 text-white fill-current bg-yellow-500 ml-2 rounded-xl overflow-hidden" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg" title="en attente de validation">
                                     <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"/>
                                </svg>
                        </div>
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 flex justify-between sm:mt-0 sm:col-span-2">

                         <select class="text-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="licence_status" v-model='form.status' :disabled="isCivility ? true : false">
                                         <option  class='text-center text-gray-500' disabled selected hidden>
                                        </option>
                                        <option value="available">
                                            En ligne
                                        </option>
                                        <option value="archived">
                                            Archivé
                                        </option>
                        </select>

                    </dd>

                    </div>

                    <div class="bg-gray-200 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">

                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                         <!-- Button -->

                         <div class="col-span-6 sm:col-span-3 text-right">

                         <slot name="actions" class=''>
                             <div class='flex justify-end'>
                                 <a @click='isState' class="cursor-pointer	 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                Modifier
                            </a>
                            <jet-action-message :on="form.recentlySuccessful" class="ml-4 mt-1">
                                Effectué.
                            </jet-action-message>

                            <jet-button class='ml-3' :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Mettre à jour
                            </jet-button>
                            </div>
                        </slot>
                         </div>
                    </dd>
                    </div>

                </form>


                </dl>
                 <span>
                 <jet-dialog-modal :show="confirmingDeleteEvent" @close="closeModal">
                     <template #title>
                         <p>Supprimer</p>
                     </template>
                     <template #content>
                         <div>
                            Vueillez confirmer la suppression de l'évènement {{event.name}}.

                    <div class="mt-4">
                     <button type="button"  @click="deleteEvent" class="py-2 px-4 justify-between  bg-red-600 hover:bg-red-800 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                    Supprimer
                </button>
                    </div>
                         </div>
                     </template>
                     <template #footer>
                         <jet-secondary-button @click="closeModal">
                             Fermer
                         </jet-secondary-button>
                     </template>
                 </jet-dialog-modal>
         </span>
                </div>
            </div>
          </table>
        </div>
      </div>
    </div>
  </div>


</template>


<script>
    import { defineComponent } from 'vue'
    import { Head } from '@inertiajs/inertia-vue3';
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetDialogModal from '@/Jetstream/DialogModal.vue'
    import Car from '@/Pages/Admin/Partials/Car.vue'
    import Pilote from '@/Pages/Admin/Partials/Pilote.vue'
    import Companion from '@/Pages/Admin/Partials/Companion.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
    import JetTextarea from '@/Jetstream/Textarea.vue'




    export default defineComponent({
        props:['event'],
        components: {
            Head,
            JetInput,
            JetInputError,
            JetLabel,
            JetActionMessage,
            JetButton,
            JetDialogModal,
            JetTextarea,
            Car,
            JetSecondaryButton,
            Pilote,
            Companion
        },
         data() {
             return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    name: this.event.name,
                    title: this.event.title,
                    description: this.event.description,
                    start_date: this.event.start_date,
                    end_date: this.event.end_date,
                    start_time: this.event.start_time,
                    end_time: this.event.end_time,
                    available_place: this.event.available_place,
                    status: this.event.status,
                    price: this.event.price,
                    pilote_price: this.event.pilote_price,
                    companion_price: this.event.companion_price

                }),
                isCivility: true,
                confirmingDeleteEvent: false,



            }
        },
        methods: {

            submit() {
                this.form.put(route("admin.event.update", { id: this.event.id}),{
                preserveScroll: true,
                onSuccess: () => (this.isCivility = true)

                });
            },
            isState(){
                    this.isCivility = false;

            },

                startDeleteEvent() {
                    this.confirmingDeleteEvent= true;
                },


            closeModal() {
                this.confirmingDeleteEvent = false;
            },

            deleteEvent() {
                this.$inertia.delete(route('admin.event.destroy', { id: this.event.id }), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal(),
                    onFinish: () => this.form.reset(),
                })
            },

        }

    })
</script>
