<template>
<!-- Create By Joker Banny -->

                     <a  @click="startConfirmingDeletePilote" class="cursor-pointer absolute z-20 inline-flex items-center px-3 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                X
                    </a>
                    <div class="relative flex items-center justify-center w-full h-80 md:h-64 lg:h-44">


                        <img class="h-28 w-28 object-cover object-center rounded-full"
                            src="https://cdn.store-factory.com/www.rebelcar.fr/content/product_8719187h.jpg?v=1478380586" alt="photo">


                    </div>

                    <div class="px-3 py-4">
                        <h3 class="text-sm text-gray-500 pb-2">
                            <a class="bg-indigo-600 py-1 px-2 text-white rounded-lg" href="#">
                                <span class="absolute inset-0"></span>
                                <span>{{pilote.firstname}}</span>
                                <span class='ml-2'>{{pilote.lastname}}</span>
                            </a>
                        </h3>


                        <div class="col-span-6 sm:col-span-4 mt-2" v-if="pilote.licence_status == 'send'">
                            <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg">
                                <div>
                                     <svg class="w-6 h-6 text-white fill-current bg-blue-500 rounded-xl overflow-hidden" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"/>
                                    </svg>
                                </div>
                                <div class="mx-3">
                                    <span class="font-semibold text-blue-500 dark:text-blue-400">En cours</span>
                                    <p class="text-sm text-gray-600 dark:text-gray-200">Votre Pilote est en cours de validation par nos équipes !</p>

                                </div>
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-4 mt-2" v-if="pilote.licence_status  == 'valide'">
                            <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg">
                                <div>
                                    <svg class="w-6 h-6 text-white fill-current bg-green-500 rounded-xl overflow-hidden" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
                                    </svg>
                                </div>
                                <div class="mx-3">
                                    <span class="font-semibold text-green-500 dark:text-greend-400">Certifié</span>
                                    <p class="text-sm text-gray-600 dark:text-gray-200">Votre pilote est validé par nos équipes !</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-6 sm:col-span-4 mt-2" v-if="pilote.licence_status  == 'invalide'">
                            <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg">
                                <div>
                                    <svg class="w-6 h-6 text-white fill-current bg-red-500 rounded-xl overflow-hidden" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z"/>
                                    </svg>
                                </div>
                                <div class="mx-3">
                                    <span class="font-semibold text-red-500 dark:text-red-400">Refusé</span>
                                    <p class="text-sm text-gray-600 dark:text-gray-200">Votre pilote n'a pas été accepté.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                <span>
                 <jet-dialog-modal :show="confirmingDeletePilote" @close="closeModal">
                     <template #title>
                         <p>Supprimer Pilote</p>
                     </template>
                     <template #content>
                         <div>
                            Vueillez confirmer la suppression de la {{pilote.firstname}} {{pilote.lastname}}.
                         </div>
                     </template>
                     <template #footer>
                        <button type="button"  @click="deletePilote" class="mr-3 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
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
    import { useForm } from "@inertiajs/inertia-vue3";
    import JetButton from '@/Jetstream/Button.vue'
    import JetFormSection from '@/Jetstream/FormSection.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import JetSectionBorder from '@/Jetstream/SectionBorder.vue'
    import JetDialogModal from '@/Jetstream/DialogModal.vue'




    export default defineComponent({
        props: ['pilote'],
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
            JetCheckbox,
            JetSectionBorder,
            JetDialogModal
        },

        data() {
            return {
            confirmingDeletePilote: false
            }
        },
        methods: {

             startConfirmingDeletePilote() {
                this.confirmingDeletePilote = true;
                },
            closeModal() {
                this.confirmingDeletePilote = false

            },
            deletePilote() {
                this.$inertia.delete(route('pilote.destroy', { id: this.pilote.id }), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal(),
                    onFinish: () => this.form.reset(),
                })
            },

        }
    })
</script>
