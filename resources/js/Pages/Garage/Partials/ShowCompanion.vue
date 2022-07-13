<template>
<!-- Create By Joker Banny -->
                    <a  @click="startConfirmingDeleteCompanion" class="cursor-pointer absolute z-20 inline-flex items-center px-3 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-400 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
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
                                <span>{{companion.firstname}}</span>
                                <span class='ml-2'>{{companion.lastname}}</span>
                            </a>
                        </h3>
                    </div>

                <span>
                 <jet-dialog-modal :show="confirmingDeleteCompanion" @close="closeModal">
                     <template #title>
                         <p>Supprimer Pilote</p>
                     </template>
                     <template #content>
                         <div>
                            Vueillez confirmer la suppression de la {{companion.firstname}} {{companion.lastname}}.
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
        props: ['companion'],
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
                 confirmingDeleteCompanion: false
            }
        },



        methods: {

            startConfirmingDeleteCompanion() {
                this.confirmingDeleteCompanion = true;
                },
            closeModal() {
                this.confirmingDeleteCompanion = false

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
