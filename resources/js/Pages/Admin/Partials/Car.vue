<template>

                    <dt class="text-sm font-medium text-gray-500">
                        <div class='flex'>
                             <div class="flex-shrink-0 h-10 w-10 mr-3">
                                    <img :src="'/storage/'+car.car_photo" class="h-10 w-10 rounded-full" />
                            </div>
                            <div>
                                 <span>{{car.brand}} {{car.model}} {{car.year}} </span>
                                <div class='flex'>
                                    <span>{{car.license_plate}}</span>

                                    <div class="text-sm   flex justify-between  text-gray-900" v-if="car.status === 'valide'" >
                                         <svg class="w-6 h-6 ml-2 text-white fill-current bg-green-500 rounded-xl overflow-hidden" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
                                          </svg>
                                     </div>

                                     <div class="text-sm  flex justify-between text-gray-900" v-if="car.status === 'invalide'" >
                                         <svg class="w-6 h-6 ml-2 text-white fill-current bg-red-500 rounded-xl overflow-hidden" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z"/>
                                         </svg>
                                     </div>

                                     <div class="text-sm text-gray-900" v-else-if="car.status === 'send'" >

                                         <svg class="w-6 h-6 text-white fill-current bg-yellow-500 ml-2 rounded-xl overflow-hidden" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg" title="en attente de validation">
                                              <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"/>
                                         </svg>
                                        </div>

                                </div>

                            </div>

                        </div>
                    </dt>
                    <dd class="mt-1 text-sm flex justify-between text-gray-900 sm:mt-0 sm:col-span-2">

                        <div  class='text-center'>
                            <p class='mx-3'>Carte grise</p>
                             <button  @click="startConfirmingGrayCard">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        <div  class='text-center '>
                            <p class='mx-3'>Carte verte</p>
                             <button  @click="startConfirmingGreenCard">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        <form @submit.prevent="submit(car.id)" class='flex'>

                        <div>
                            <select class=" text-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mx-3" id="status" v-model='form.status' >

                                        <option value="valide">
                                            Valide
                                        </option>
                                        <option value="invalide">
                                            Invalide
                                        </option>
                            </select>

                        </div>



                        <slot name="actions">
                            <jet-action-message :on="form.recentlySuccessful" class="ml-4 mt-1">
                                Effectué.
                            </jet-action-message>

                            <jet-button class='ml-3' :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Mettre à jour

                            </jet-button>

                        </slot>
                        </form>
                        <a  @click="startConfirmingDeleteCar" class="cursor-pointer inline-flex items-center px-3 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                X
                        </a>
                    </dd>

                    <span>
                        <jet-dialog-modal :show="confirmingGrayCard" @close="closeModal">
                            <template #title>
                                <p>Carte grise</p>
                            </template>

                            <template #content>
                            <iframe :src="'/storage/'+car.gray_card" class='h-screen items-center w-11/12'></iframe>
                            </template>

                            <template #footer>
                                <jet-secondary-button @click="closeModal">
                                    Fermer
                                </jet-secondary-button>
                            </template>
                        </jet-dialog-modal>
                    </span>


                    <span>
                        <jet-dialog-modal :show="confirmingGreenCard" @close="closeModal">
                            <template #title>
                                <p>Carte verte</p>
                            </template>

                            <template #content>
                            <iframe :src="'/storage/'+car.green_card" class='h-screen items-center w-11/12'></iframe>
                            </template>

                            <template #footer>
                                <jet-secondary-button @click="closeModal">
                                    Fermer
                                </jet-secondary-button>
                            </template>
                        </jet-dialog-modal>
                    </span>

                <span>
                 <jet-dialog-modal :show="confirmingDeleteCar" @close="closeModal">
                     <template #title>
                         <p>Supprimer Voiture</p>
                     </template>
                     <template #content>
                         <div>
                            Vueillez confirmer la suppression de la {{car.brand}} {{car.model}}.
                         </div>
                     </template>
                     <template #footer>
                        <button type="button"  @click="deleteCar" class="mr-3 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            Supprimer
                        </button>
                         <jet-button type="button"  @click="closeModal">
                            Annuler
                        </jet-button>

                     </template>
                 </jet-dialog-modal>
                </span>

</template>


<script>
    import { defineComponent } from 'vue'
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetDialogModal from '@/Jetstream/DialogModal.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'


    export default defineComponent({
        props:['car'],
        components: {
            JetActionMessage,
            JetButton,
            JetDialogModal,
            JetSecondaryButton
        },
         data() {
             return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    status: this.status,
                }),
                confirmingGrayCard: false,
                confirmingGreenCard: false,
                confirmingDeleteCar: false

            }
        },
        methods: {

            submit($id) {
                this.form.put(route("admin.car.update", { id: $id}),{
                preserveScroll: true,
                onSuccess: () => (this.form.reset)

                });
            },
           startConfirmingGreenCard() {

                    this.confirmingGreenCard = true;
                },
            startConfirmingGrayCard() {

                    this.confirmingGrayCard = true;
                },
             startConfirmingDeleteCar() {

                    this.confirmingDeleteCar = true;
                },
            closeModal() {
                this.confirmingGrayCard = false,
                this.confirmingGreenCard = false,
                this.confirmingDeleteCar = false

            },
            deleteCar() {
                this.$inertia.delete(route('car.destroy', { id: this.car.id }), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal(),
                    onFinish: () => this.form.reset(),
                })
            },

        }

    })
</script>
