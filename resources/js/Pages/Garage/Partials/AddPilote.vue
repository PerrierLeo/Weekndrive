<template>
    <jet-form-section @submitted="submit">
        <template #title>
           <p class='text-white'>Pilotes</p>
        </template>

        <template #description>
           <p class='text-white'>Ajoutez les pilotes qui vous accompagnes</p>
            <p class='text-white'> (5 maximums)</p>

        </template>



        <template #form>

            <!-- Civility -->
                <div class="col-span-2 sm:col-span-5" >
                    <jet-label for="civility" value="Civilité"/>
                        <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="civility" v-model="form.civility"
                         >
                            <option value="MR">
                                Mr
                            </option>
                            <option value="M">
                                M
                            </option>
                        </select>
                    <jet-input-error :message="form.errors.civility" class="mt-2" />
                </div>


            <!-- Firstname -->
            <div class="col-span-6 sm:col-span-3">
                <jet-label for="firstname" value="Nom" />
                <jet-input id="firstname" type="text" class="mt-1 block w-full" v-model="form.firstname"  />
                <jet-input-error :message="form.errors.firstname" class="mt-2" />
            </div>

            <!-- Lastname -->
            <div class="col-span-6 sm:col-span-3">
                <jet-label for="lastname" value="Prénom" />
                <jet-input id="lastname" type="text" class="mt-1 block w-full" v-model="form.lastname"  />
                <jet-input-error :message="form.errors.lastname" class="mt-2" />
            </div>



            <!-- Email -->
            <div class="col-span-6 sm:col-span-3">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" />
                <jet-input-error :message="form.errors.email" class="mt-2" />
            </div>

            <!-- Mobile -->
            <div class="col-span-6 sm:col-span-3">
                <jet-label for="mobile" value="Mobile" />
                <jet-input id="mobile" type="text" class="mt-1 block w-full" v-model="form.mobile" />
                <jet-input-error :message="form.errors.mobile" class="mt-2" />
            </div>

             <!-- Birthdate -->
            <div class="col-span-6 sm:col-span-3" >
                <jet-label for="birthdate" value="Date de naissance" />
                <jet-input id="birthdate" type="date" class="mt-1 block w-full" v-model="form.birthdate"
               />
                <jet-input-error :message="form.errors.birthdate" class="mt-2" />
            </div>

            <!-- DrivingLicence -->
            <div class="col-span-6 sm:col-span-3">

                <jet-label for="filePiloteLicence" value="Permis de conduire" />
                <input id='filePiloteLicence' type="file" class="mt-2 inline-flex items-center  bg-white border border-gray-300  font-semibold text-xs text-gray-700 tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition"
                            ref="driving_licence"
                            @change="previewDrivingLicence" required>
                <jet-input-error :message="form.errors.driving_licence" class="mt-2" />

            </div>

        </template>

        <template #actions>
            <div v-if='countPilote < 5'>
                <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                    Pilote ajouté.
                </jet-action-message>

                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Ajouter Pilote
                </jet-button>
            </div>
            <div v-else>
                <p>Pour ajouter un nouveau Pilote, veuillez en supprimer un.</p>

            </div>
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
    import JetCheckbox from '@/Jetstream/Checkbox.vue'


    export default defineComponent({
        props: ['countPilote'],
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
            JetCheckbox
        },

        data() {
            return {
                    urlDrivingLicence: null,
            }
        },

        setup() {
        const form = useForm({
            civility: '',
            firstname: '',
            lastname: '',
            email: '',
            mobile: '',
            birthdate: '',
            driving_licence: '',
        });

        return { form };
    },

        methods: {

            submit() {

                this.form.driving_licence= this.$refs.driving_licence.files[0];


                this.form.post(route('pilote.store'),{
                preserveScroll: true,
                onSuccess: () => (this.$refs.driving_licence.value=null, this.form.reset())

                });
            },

        previewDrivingLicence(e){
            const file = e.target.files[0];
            this.urlDrivingLicence = URL.createObjectURL(file);
        },



        },
    })
</script>
