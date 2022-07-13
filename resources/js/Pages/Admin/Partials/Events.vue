<template>
    <Head title="Gestion" />
    <div class="flex flex-col lg:w-4/6 mt-2">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <input  @keyup='search' v-model="term" type="text" placeholder="Rechercher par nom ou date de début" class=" my-3 py-3 w-full rounded-md bg-gray-200 border-transparent  text-sm">
          <div class='bg-white flex justify-between px-3 pt-10 rounded-t-md'>
	        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">
		        <select class="px-4 py-3 w-full rounded-md bg-gray-200 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm" placeholder='ici'>
		          <option value="" disabled selected hidden>Status</option>
		          <option value="for-rent">En cours</option>
		          <option value="for-sale">Validé</option>
                  <option value="for-sale">Refusé</option>

		        </select>

		        <select class="px-4 py-3 w-full rounded-md bg-gray-200 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
		          <option value="" disabled selected hidden>Date</option>
		           <option value="for-rent">En cours</option>
		          <option value="for-sale">Validé</option>
                  <option value="for-sale">Refusé</option>
		        </select>


	         </div>
            <div @click="startCreateEvent" class=" cursor-pointer my-3 px-6 py-3 font-bold text-blue-600 uppercase text-sm">Créer un évènement </div>

	    </div>
        <span>
                        <jet-dialog-modal :show="confirmingCreateEvent" @close="closeModal">
                            <template #title>
                                <p>Création d'évènement</p>
                            </template>

                            <template #content>
                                <div>
                                    <create-event :events="$page.props.events"/>
                                </div>

                            </template>

                            <template #footer>
                                <jet-secondary-button @click="closeModal">
                                    Fermer
                                </jet-secondary-button>
                            </template>
                        </jet-dialog-modal>
         </span>

          <table class="min-w-full divide-y divide-gray-200">

            <thead class="bg-gray-50">

              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                     Evènement
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                  Status
                </th>
                 <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                  Place
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                    Participation en attente
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                  Date
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="event in events" :key='event.id' :class="{'bg-gray-200 w-full': event.id%2 === 0}" >
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                      <img :src="'/storage/'+event.image_event" class="h-10 w-10 rounded-full" />
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{event.name}}
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm   text-gray-900" v-if="event.status === 'valide'" >
                        <svg class="w-6 h-6 ml-2 text-white fill-current bg-green-500 rounded-xl overflow-hidden" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
                        </svg>
                    </div>

                     <div class="text-sm   text-gray-900" v-if="event.status === 'invalide'" >
                        <svg class="w-6 h-6 ml-2 text-white fill-current bg-red-500 rounded-xl overflow-hidden" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z"/>
                                    </svg>
                    </div>

                  <div class="text-sm   text-gray-900" v-else-if="event.status === 'send'" >
                       <svg class="w-6 h-6 text-white fill-current bg-yellow-500 ml-2 rounded-xl overflow-hidden" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg" title="en attente de validation">
                                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"/>
                        </svg>
                  </div>

                    <div class="text-sm   text-gray-900" v-else-if="event.status === null" >
                       <svg class="w-6 h-6 text-white fill-current bg-gray-500 ml-2 rounded-xl overflow-hidden" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg" title="en attente de validation">
                                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"/>
                        </svg>
                  </div>
                  <div class="text-sm text-gray-500">status</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    {{event.available_place}}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    à trouver
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="px-2 text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    {{event.start_date}}
                  </div>
                  <div class="px-2 text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    {{event.end_date}}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <span class="hidden sm:block">
                        <a :href="route('admin.event.show', { id: event.id })" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                    </span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


</template>


<script>
    import { defineComponent } from 'vue'
    import { Head } from '@inertiajs/inertia-vue3';
    import CreateEvent from '@/Pages/Admin/Partials/CreateEvent.vue'
    import JetDialogModal from '@/Jetstream/DialogModal.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
    import JetButton from '@/Jetstream/Button.vue'
    import JetInputError from '@/Jetstream/InputError.vue'

    import _ from 'lodash';

    export default defineComponent({
        props:['events'],
        components: {
            Head,
            CreateEvent,
            JetDialogModal,
            JetSecondaryButton,
            JetActionMessage,
            JetButton,
            JetInputError,
        },
         data() {
             return{
                 term: '',
                confirmingCreateEvent: false,
             }
        },
        methods: {

            search: _.throttle(function(){
                this.$inertia.get(this.route('admin.index.events', {term:this.term}), {}, {preserveState: true, replace: true})

            }, 200),

            CarInclude(user){
                for (let i = 0; i < user.car.length; i++ )
                console.log(user.car[i].status.includes('send'));
                return this.user == true;
            },

             startCreateEvent() {
                    this.confirmingCreateEvent= true;
                },

            closeModal() {
                this.confirmingCreateEvent = false;

            },
        }

    })
</script>
