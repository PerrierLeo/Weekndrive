<template>
    <jet-form-section @submitted="submit">
        <template #title>
           <p class='text-white'>Voitures</p>
        </template>

        <template #description>
           <p class='text-white'>Ajoutez vos voiture à votre garage</p>
           <p class='text-white'>(3 maximums)</p>

        </template>



        <template #form>

             <!-- Brand -->
            <div class="col-span-6 sm:col-span-3">
            <jet-label for="brand" value="Marque" />
            <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="brand" v-model="form.brand" required >
                <option value="porsche">
                    Porsche
                </option>
                <option value="ferrarri">
                    Ferrari
                </option>
                 <option value="lamborghini">
                    Lamborghini
                </option>
            </select>
            </div>

             <!-- Model -->
            <div class="col-span-6 sm:col-span-3">
            <jet-label for="model" value="Modèle" />
            <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" id="model" v-model="form.model" required >
                <option value="911">
                    911
                </option>
                <option value="GTO">
                    GTO
                </option>
                <option value="panamera">
                    Panamera
                </option>
            </select>
                <jet-input-error :message="form.errors.model" class="mt-2" />
            </div>

             <!-- Year -->
            <div class="col-span-6 sm:col-span-3">
                <jet-label for="year" value="Année du véhicule" />
                <jet-input id="year" type="text" class="mt-1 block w-full" v-model="form.year" />
                <jet-input-error :message="form.errors.year" class="mt-2" required/>
            </div>

            <!-- LicencePlate -->
            <div class="col-span-6 sm:col-span-3">
                <jet-label for="licencePlate" value="Immatriculation" />
                <jet-input id="licencePlate" type="text" class="mt-1 block w-full" v-model="form.license_plate" pattern='^[A-Z]{2}[-][0-9]{3}[-][A-Z]{2}$' placeholder='XX-123-XX' />
                <jet-input-error :message="form.errors.licencePlate" class="mt-2" required/>
            </div>


               <!-- Photo véhicule -->
            <div class="col-span-6 sm:col-span-4">

                <jet-label for="file" value="Photo du véhicule" />
                <input id='file' type="file" class="mt-2 inline-flex items-center  bg-white border border-gray-300  font-semibold text-xs text-gray-700 tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition"
                            ref="car_photo"
                            @change="previewImage" required>
                <jet-input-error :message="form.errors.car_photo" class="mt-2" />
            </div>

             <!-- GrayCard -->
            <div class="col-span-6 sm:col-span-4">

                <jet-label for="fileGrayCard" value="Carte grise" />
                <input id='fileGrayCard' type="file" class="mt-2 inline-flex items-center  bg-white border border-gray-300  font-semibold text-xs text-gray-700 tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition"
                            ref="gray_card"
                            @change="previewGrayCard" required>
                <jet-input-error :message="form.errors.gray_card" class="mt-2" />

            </div>

             <!-- GreenCard -->
            <div class="col-span-6 sm:col-span-4">

                <jet-label for="fileGreenCard" value="Carte verte" />
                <input id='fileGreenCard' type="file" class="mt-2 inline-flex items-center  bg-white border border-gray-300  font-semibold text-xs text-gray-700 tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition"
                            ref="green_card"
                            @change="previewGreenCard" required>
                <jet-input-error :message="form.errors.green_card" class="mt-2" />

            </div>


        </template>

        <template #actions >
            <div v-if='countCar < 3'>
                <jet-action-message :on="form.recentlySuccessful" class="mr-3" >
                    Véhicule ajouté.
                </jet-action-message>

                <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Ajouter véhicule
                </jet-button>
            </div>
            <div v-else>
                <p>Pour ajouter un nouveau véhicule, veuillez en supprimer un.</p>

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
        props: ['countCar'],
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
                    url: null,
                    urlGrayCard: null,
                    urlGreenCard: null
            }
        },

        setup() {
        const form = useForm({
            brand: '',
            model: '',
            license_plate: '',
            year: '',
            car_photo: '',
            gray_card: '',
            green_card: '',
        });

        return { form };
    },

        methods: {

            submit() {


                this.form.car_photo = this.$refs.car_photo.files[0];
                this.form.green_card = this.$refs.green_card.files[0];
                this.form.gray_card = this.$refs.gray_card.files[0];


                this.form.post(route("car.store"),{
                preserveScroll: true,
                onSuccess: () => (this.$refs.car_photo.value=null, this.$refs.green_card.value=null, this.$refs.gray_card.value=null, this.form.reset())

                });
            },

        previewImage(e){
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        },

           previewGreenCard(e){
            const fileGreenCard = e.target.files[0];
            this.urlGreenCard = URL.createObjectURL(fileGreenCard);
        },

           previewGrayCard(e){
            const fileGrayCard = e.target.files[0];
            this.urlGrayCard = URL.createObjectURL(fileGrayCard);
        }


        },
    })
</script>
