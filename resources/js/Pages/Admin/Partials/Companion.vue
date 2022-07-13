<template>

                    <dt class="text-sm font-medium text-gray-500">
                        <div class='flex'>
                            <div class="flex-shrink-0 h-10 w-10 mr-3">
                                    <img src="https://cdn.store-factory.com/www.rebelcar.fr/content/product_8719187h.jpg?v=1478380586" class="h-10 w-10 rounded-full" />
                            </div>
                            <div>
                                 <p>{{companion.civility}} {{companion.firstname}} {{companion.lastname}} </p>
                                    <p>{{companion.birthdate}}</p>


                            </div>

                        </div>
                    </dt>
                    <dd class="mt-1 text-sm flex justify-between text-gray-900 sm:mt-0 sm:col-span-2">

                       <div  class='text-center -ml-4 '>
                            <p class='mx-3'>{{companion.email}}</p>
                            <p class='mx-3'>{{companion.mobile}}</p>
                        </div>

                        <a  @click="startConfirmingDeleteCompanion" class="cursor-pointer inline-flex items-center px-3 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                X
                        </a>


                    </dd>

                     <span>
                        <jet-dialog-modal :show="confirmingDeleteCompanion" @close="closeModal">
                            <template #title>
                                <p>Permis de conduire</p>
                            </template>

                            <template #content>
                         <div>
                            Vueillez confirmer la suppression de l'accompagnant {{companion.firstname}} {{companion.lastname}}.

                    <div class="mt-4">

                    </div>
                         </div>
                     </template>
                     <template #footer>
                        <button type="button"  @click="deleteCompanion" class="mr-3 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
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
        props:['companion'],
        components: {
            JetActionMessage,
            JetButton,
            JetDialogModal,
            JetSecondaryButton
        },
         data() {
             return {
                confirmingDeleteCompanion: false,


            }
        },
        methods: {
             startConfirmingDeleteCompanion() {
                    this.confirmingDeleteCompanion = true;
                },

            closeModal() {
                    this.confirmingDeleteCompanion = false;
            },

            deleteCompanion() {
                this.$inertia.delete(route('companion.destroy', { id: this.companion.id }), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal(),
                    onFinish: () => this.form.reset(),
                })
            },


        }

    })
</script>
