<template>
    <div class=''>
        <form @submit.prevent="submit">

            <!-- name -->
            <div class="col-span-2 sm:col-span-4">
                <jet-label for="name" value="Nom de l'évènement" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" />
                <jet-input-error :message="form.errors.name" class="mt-2" required/>
            </div>

            <!-- title -->
            <div class="col-span-2 sm:col-span-6">
                <jet-label for="title" value="Titre" />
                <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" />
                <jet-input-error :message="form.errors.title" class="mt-2" required/>
            </div>

            <!-- title -->
            <div class="col-span-6 sm:col-span-6">
                <jet-label for="description" value="Présentation" />
                <textarea id='description' class="block w-full h-40 px-4 py-2 text-gray-700 bg-white border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" v-model="form.description"></textarea>
                <jet-input-error :message="form.errors.description" class="mt-2" required/>
            </div>


            <!-- start_date -->
            <div class="col-span-6 sm:col-span-3">
                <jet-label class='text-green-500 font-bold' for="start_date" value="Date de début" />
                <jet-input id="start_date" type="date" class="mt-1 block w-full" v-model="form.start_date"  />
                <jet-input-error :message="form.errors.licencePlate" class="mt-2" required/>
            </div>

             <!-- start_time -->
            <div class="col-span-6 sm:col-span-3">
                <jet-label  class='text-green-500 font-bold' for="start_time" value="Heure de début" />
                <jet-input id="start_time" type="time" class="mt-1 block w-full" v-model="form.start_time"  />
                <jet-input-error :message="form.errors.start_time" class="mt-2" required/>
            </div>

            <!-- end_date -->
            <div class="col-span-6 sm:col-span-3">
                <jet-label class='text-red-500 font-bold' for="end_date" value="Date de fin" />
                <jet-input id="end_date" type="date" class="mt-1 block w-full" v-model="form.end_date"  />
                <jet-input-error :message="form.errors.licencePlate" class="mt-2" required/>
            </div>

             <!-- end_time -->
            <div class="col-span-6 sm:col-span-3">
                <jet-label  class='text-red-500 font-bold' for="end_time" value="Heure de fin" />
                <jet-input id="end_time" type="time" class="mt-1 block w-full" v-model="form.end_time"  />
                <jet-input-error :message="form.errors.end_time" class="mt-2" required/>
            </div>

             <!-- available_car -->
            <div class="col-span-6 sm:col-span-3">
                <jet-label  for="available_car" value="Nombre de voiture accepté" />
                <jet-input id="available_car" type="number" class="mt-1 block w-full" v-model="form.available_car"  />
                <jet-input-error :message="form.errors.available_car" class="mt-2" required/>
            </div>

             <!-- available_place -->
            <div class="col-span-6 sm:col-span-3">
                <jet-label  for="available_place" value="Nombre de personne maximum" />
                <jet-input id="available_place" type="number" class="mt-1 block w-full" v-model="form.available_place"  />
                <jet-input-error :message="form.errors.available_place" class="mt-2" required/>
            </div>


             <!-- price -->

            <div class="col-span-6 sm:col-span-3">
                <jet-label  for="price" value="Prix Participation" />
                <jet-input id="price" type="number" class="mt-1 block w-full" v-model="form.price"  />
                <jet-input-error :message="form.errors.price" class="mt-2" required/>
            </div>

             <!-- pilote_price -->

            <div class="col-span-6 sm:col-span-3">
                <jet-label  for="pilote_price" value="Prix par pilote supplémentaire" />
                <jet-input id="pilote_price" type="number" class="mt-1 block w-full" v-model="form.pilote_price"  />
                <jet-input-error :message="form.errors.pilote_price" class="mt-2" required/>
            </div>

             <!-- companion_price -->

            <div class="col-span-6 sm:col-span-3">
                <jet-label  for="companion_price" value="Prix par accompagnant" />
                <jet-input id="companion_price" type="number" class="mt-1 block w-full" v-model="form.companion_price"  />
                <jet-input-error :message="form.errors.companion_price" class="mt-2" required/>
            </div>


               <!--image_event-->
            <div class="col-span-6 sm:col-span-4">

                <jet-label for="file" value="Image de présentation" />
                <input id='file' type="file" class="mt-2 inline-flex items-center  bg-white border border-gray-300  font-semibold text-xs text-gray-700 tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition"
                            ref="image_event"
                            @change="previewImage" required>
                <jet-input-error :message="form.errors.image_event" class="mt-2" />
            </div>



            <slot name="actions">
                            <jet-action-message :on="form.recentlySuccessful" class="ml-4 mt-1">
                                Evènement créé.
                            </jet-action-message>

                            <jet-button class='mt-5 ml-3' :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Créer l'évènement
                            </jet-button>
                        </slot>
        </form>
    </div>

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
            }
        },

        setup() {
        const form = useForm({
            name: '',
            title: '',
            description: '',
            start_date: '',
            end_date: '',
            start_time: '',
            end_time: '',
            available_car: '',
            available_place:'',
            price: '',
            pilote_price:'',
            companion_price:'',
            image_event:'',
        });

        return { form };
    },

        methods: {

            submit() {


                this.form.image_event= this.$refs.image_event.files[0];

                this.form.post(route("admin.event.store"),{
                preserveScroll: true,
                onSuccess: () => (this.$refs.image_event.value=null, this.form.reset()),

                });
            },

        previewImage(e){
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        },


        },
    })
</script>
