<template>
    <jet-form-section @submitted="submit">
        <template #title>
            <p class='text-white'>Documents</p>
        </template>

        <template #description>
            <p class='text-white'>Mettre à jour vos documents.</p>

        </template>

        <template #form>

             <div class="col-span-6 sm:col-span-4" v-if="user.licence_status === 'valide'">

                <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg">
                    <div>
                        <svg class="w-6 h-6 text-white fill-current bg-green-500 rounded-xl overflow-hidden" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
                         </svg>
                    </div>
                    <div class="mx-3">
                            <span class="font-semibold text-green-500 dark:text-blue-400">Permis</span>
                            <p class="text-sm text-gray-600 dark:text-gray-200">Votre permis a été par nos équipes ! </p>
                    </div>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4" v-if="user.licence_status === 'send'">

                <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg">
                    <div>
                        <svg class="w-6 h-6 text-white fill-current bg-blue-500 rounded-xl overflow-hidden" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
                         </svg>
                    </div>
                    <div class="mx-3">
                            <span class="font-semibold text-blue-500 dark:text-blue-400">Permis</span>
                            <p class="text-sm text-gray-600 dark:text-gray-200">Votre permis est en cours de validation par nos équipes ! </p>
                    </div>
                </div>
            </div>

            <div class="col-span-6 sm:col-span-4" v-if="user.licence_status === 'invalide'">

                <div class="flex w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg">
                    <div>
                       <svg class="w-6 h-6 ml-2 text-white fill-current bg-red-500 rounded-xl overflow-hidden" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z"/>
                        </svg>
                    </div>
                    <div class="mx-3">
                            <span class="font-semibold text-red-500 dark:text-blue-400">Permis</span>
                            <p class="text-sm text-gray-600 dark:text-gray-200">Le permis ne correspond pas, merci selectionner le bon fichier. </p>
                    </div>
                </div>
            </div>







             <div class="col-span-6 sm:col-span-4">

                <jet-label for="file" value="Permis de conduire" />
                <input id='file' type="file" class="mt-2 inline-flex items-center  bg-white border border-gray-300  font-semibold text-xs text-gray-700 tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition"
                            ref="driving_licence"
                            @change="previewImage">
            </div>




        </template>

        <template #actions >
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Effectué.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Mettre à jour
            </jet-button>
        </template>




    </jet-form-section>
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

    export default defineComponent({
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
        },
        props: ['user'],
        data() {
            return {
                url: null,
            };
        },
        setup() {
            const form = useForm({
            driving_licence: null,
        });

return { form };
},
methods: {
    submit() {
        if (this.$refs.driving_licence) {
            this.form.driving_licence= this.$refs.driving_licence.files[0]
        }
        this.form.post(route("driving_licence.store"),{
        preserveScroll: true,
    });
},
    selectNewPhoto() {
                this.$refs.driving_licence.click();
            },

    previewImage(e) {
        const file = e.target.files[0];
        this.url = URL.createObjectURL(file);
    },
},



})
</script>
