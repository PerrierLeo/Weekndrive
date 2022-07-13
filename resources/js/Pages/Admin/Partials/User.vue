<template>
    <Head title="Gestion" />
    <div class="flex flex-col lg:w-4/6 mt-2">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <div class='bg-white flex justify-between px-3 rounded-t-md'>
              <div class=" my-3 px-6 py-3 w-full font-bold text-gray-600 uppercase text-sm">Informations Utilisateur</div>
              <div @click="startDeleteUser" class=" cursor-pointer my-3 px-6 py-3 font-bold text-red-600 uppercase text-sm">Supprimer </div>

	    </div>
          <table class="min-w-full divide-y divide-gray-200">


             <div class="bg-white shadow overflow-hidden sm:rounded-b-lg">
                <div class="border-t border-gray-200">


                <dl>
                 <form @submit.prevent="submit">
                    <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Civilité
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0  sm:col-span-2">
                         <div class="col-span-2 sm:col-span-5" >
                        <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="civility" v-model="form.civility"
                        :disabled="isCivility ? true : false">
                            <option value="MR">
                                Mr
                            </option>
                            <option value="M">
                                M
                            </option>
                        </select>
                  <!--  <jet-input-error :message="form.errors.civility" class="mt-2" /> -->
                        </div>

                    </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Nom Prénom
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                         <!-- Firstname -->
                         <div class="col-span-6 sm:col-span-3">
                             <jet-input id="firstname" type="text" class="mt-1 block" v-model="form.firstname"
                             :disabled="isCivility ? true : false"/>
                             <!--<jet-input-error :message="form.errors.firstname" class="mt-2" />-->
                         </div>

                         <!-- Lastname -->
                         <div class="col-span-6 sm:col-span-3">
                             <jet-input id="lastname" type="text" class="mt-1 block" v-model="form.lastname"
                             :disabled="isCivility ? true : false"/>
                             <!--<jet-input-error :message="form.errors.lastname" class="mt-2" />-->
                         </div>
                    </dd>
                    </div>
                    <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Date de naissance
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900  sm:mt-0 sm:col-span-2">
                        <div class="col-span-6 sm:col-span-3" >
                             <jet-input id="birthdate" type="date" class="mt-1 block" v-model="form.birthdate"
                             :disabled="isCivility ? true : false"/>
                             <!--<jet-input-error :message="form.errors.birthdate" class="mt-2" />-->
                        </div>
                    </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Adresse Email
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                         <!-- Email -->
                         <div class="col-span-6 sm:col-span-3">
                             <jet-input id="email" type="email" class="mt-1 block" v-model="form.email"
                             :disabled="isCivility ? true : false"/>
                            <!-- <jet-input-error :message="form.errors.email" class="mt-2" />-->
                         </div>
                    </dd>
                    </div>
                    <div class="bg-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                        Mobile
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                          <!-- Mobile -->
                        <div class="col-span-6 sm:col-span-3">
                            <jet-input id="mobile" type="text" class="mt-1 block" v-model="form.mobile"
                            :disabled="isCivility ? true : false"/>
                            <!--<jet-input-error :message="form.errors.mobile" class="mt-2" />-->
                        </div>
                    </dd>
                    </div>
                        <!-- Driving_Licence -->
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm flex font-medium text-gray-500">
                        <div>Permis de conduire</div>
                         <div class="text-sm   flex justify-between  text-gray-900" v-if="user.licence_status === 'valide'" >
                                <svg class="w-6 h-6 ml-2 text-white fill-current bg-green-500 rounded-xl overflow-hidden" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
                                 </svg>
                            </div>

                            <div class="text-sm flex justify-between  text-gray-900" v-if="user.licence_status === 'invalide'" >
                                <svg class="w-6 h-6 ml-2 text-white fill-current bg-red-500 rounded-xl overflow-hidden" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z"/>
                                </svg>
                            </div>

                            <div class="text-sm  flex justify-between text-gray-900" v-else-if="user.licence_status === 'send'" >

                                <svg class="w-6 h-6 text-white fill-current bg-yellow-500 ml-2 rounded-xl overflow-hidden" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg" title="en attente de validation">
                                     <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"/>
                                </svg>
                        </div>
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 flex justify-between sm:mt-0 sm:col-span-2">

                         <select class="text-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="licence_status" v-model='form.licence_status' :disabled="isCivility ? true : false">
                                         <option  class='text-center text-gray-500' disabled selected hidden>
                                        </option>
                                        <option value="valide">
                                            Valide
                                        </option>
                                        <option value="invalide">
                                            Invalide
                                        </option>
                        </select>
                       <a @click='startConfirmingDrivingLicence' class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" v-if='user.driving_licence'>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="white">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                        </a>
                       <a @click='startConfirmingDrivingLicence' class="cursor-pointer inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" v-else>
                                Non renseigné
                        </a>


                    </dd>
                         <!-- Modale -->
                            <span>
                                <jet-dialog-modal :show="confirmingDrivingLicence" @close="closeModal">
                                    <template #title>
                                        <p>Permis de conduire</p>
                                    </template>

                                    <template #content>
                                        <div>
                                            <iframe :src="'/storage/'+user.driving_licence" class='h-screen items-center w-11/12'></iframe>
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

                    <div class="bg-gray-200 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">

                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                         <!-- Button -->

                         <div class="col-span-6 sm:col-span-3 text-right">

                         <slot name="actions">
                             <div class='flex justify-end'>
                                <a @click='isState' class="cursor-pointer inline-flex items-center px-4 py-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
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

                     <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                         <div class='bg-white px-3 rounded-md'>
                            <div class=" my-3 px-6 py-3 w-full font-bold text-gray-600 uppercase text-sm">Véhicules</div>
	                    </div>
                    </dt>


                    </div>
                    <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6" v-for='car in user.car' :key='car.id' :class="{'bg-gray-100 w-full': car.id%2 === 1}">
                     <car :car="car" />
                     </div>

                     <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                          <div class='bg-white px-3 rounded-md'>
                                 <div class=" my-3 px-6 py-3 w-full font-bold text-gray-600 uppercase text-sm">Pilotes</div>
	                        </div>
                    </dt>
                    </div>
                    <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6" v-for='pilote in user.pilote' :key='pilote.id' :class="{'bg-gray-100 w-full': pilote.id%2 === 1}">
                    <pilote :pilote="pilote" />
                    </div>

                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">
                         <div class='bg-white px-3 rounded-md'>
                            <div class=" my-3 px-6 py-3 w-full font-bold text-gray-600 uppercase text-sm">Accompagnants</div>
	                    </div>
                    </dt>


                    </div>
                    <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6" v-for='companion in user.companion' :key='companion.id' :class="{'bg-gray-100 w-full': companion.id%2 === 0}">
                    <companion :companion="companion" />
                    </div>


                </dl>
                 <span>
                 <jet-dialog-modal :show="confirmingDeleteUser" @close="closeModal">
                     <template #title>
                         <p>Supprimer Utilisateur</p>
                     </template>
                     <template #content>
                         <div>
                            Vueillez confirmer la suppression de l'utilistaeur {{user.firstname}} {{user.lastname}}.

                         </div>
                     </template>
                     <template #footer>
                          <button type="button"  @click="deleteUser" class="mr-3 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            Supprimer
                        </button>
                         <jet-button type="button"  @click="closeModal">
                            Annuler
                        </jet-button>

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



    export default defineComponent({
        props:['user'],
        components: {
            Head,
            JetInput,
            JetInputError,
            JetLabel,
            JetActionMessage,
            JetButton,
            JetDialogModal,
            Car,
            JetSecondaryButton,
            Pilote,
            Companion
        },
         data() {
             return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    civility: this.user.civility,
                    firstname: this.user.firstname,
                    lastname: this.user.lastname,
                    birthdate: this.user.birthdate,
                    mobile: this.user.mobile,
                    email: this.user.email,
                    licence_status: this.user.licence_status
                }),
                isCivility: true,
                confirmingDrivingLicence: false,
                confirmingDeleteUser: false,



            }
        },
        methods: {

            submit() {
                this.form.put(route("admin.user.update", { id: this.user.id}),{
                preserveScroll: true,
                onSuccess: () => (this.isCivility = true)

                });
            },
            isState(){
                    this.isCivility = false;

            },
            startConfirmingDrivingLicence() {
                    this.confirmingDrivingLicence = true;
                },

                startDeleteUser() {
                    this.confirmingDeleteUser= true;
                },


            closeModal() {
                this.confirmingDrivingLicence = false;
                this.confirmingDeleteUser = false;
            },

            deleteUser() {
                this.$inertia.delete(route('admin.user.destroy', { id: this.user.id }), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal(),
                    onFinish: () => this.form.reset(),
                })
            },

        }

    })
</script>
