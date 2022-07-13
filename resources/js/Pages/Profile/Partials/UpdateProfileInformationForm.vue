<template>


    <jet-form-section @submitted="updateProfileInformation">
        <template #title >
            <p class='text-white'>Informations personnelles</p>
        </template>

     <template #description class='text-white'>
           <p class='text-white'> Mettre à jour vos informations.</p>

        </template>


        <template #form>

            <!-- Civility -->
                <div class="col-span-2 sm:col-span-5" >
                    <jet-label for="civility" value="Civilité"/>
                        <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="civility" v-model="form.civility"
                         :disabled="isCivility ? true : false">
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
                <jet-input id="firstname" type="text" class="mt-1 block w-full" v-model="form.firstname" disabled />
                <jet-input-error :message="form.errors.firstname" class="mt-2" />
            </div>

            <!-- Lastname -->
            <div class="col-span-6 sm:col-span-3">
                <jet-label for="lastname" value="Prénom" />
                <jet-input id="lastname" type="text" class="mt-1 block w-full" v-model="form.lastname" disabled />
                <jet-input-error :message="form.errors.lastname" class="mt-2" />
            </div>



            <!-- Email -->
            <div class="col-span-6 sm:col-span-3">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" disabled/>
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
                :disabled=" isBirthdate ? true : false"/>
                <jet-input-error :message="form.errors.birthdate" class="mt-2" />
            </div>



        </template>



        <template #actions>
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
    import JetButton from '@/Jetstream/Button.vue'
    import JetFormSection from '@/Jetstream/FormSection.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
    import JetCheckbox from '@/Jetstream/Checkbox.vue'
    import { useForm } from '@inertiajs/inertia-vue3'



    export default defineComponent({
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

        props: ['user'],

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
                }),
                isCivility: '',
                isBirthdate: true,

            }
        },

        methods: {
            updateProfileInformation() {
                if (this.$refs.photo) {
                    this.form.photo = this.$refs.photo.files[0]
                }

                this.form.post(route('user-profile-information.update'), {
                    errorBag: 'updateProfileInformation',
                    preserveScroll: true,
                    onSuccess: () => (this.isState()),


                });

            },

            isState(){
                if(this.user.civility){
                    this.isCivility = true;
                }else{
                    this.isCivility = false;
                };

                if(this.user.birthdate){
                    this.isBirthdate = true;
                }else{
                    this.isBirthdate = false;
                };
            }

        },

        mounted()
        {
            this.isState();
        }


    })
</script>
