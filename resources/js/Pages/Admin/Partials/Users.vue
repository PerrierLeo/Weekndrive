<template>
    <Head title="Gestion" />
    <div class="flex flex-col lg:w-4/6 mt-2">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <input  @keyup='search' v-model="term" type="text" placeholder="Rechercher via e-mail, nom/prénom" class=" my-3 py-3 w-full rounded-md bg-gray-200 border-transparent  text-sm">
          <div class='bg-white px-3 pt-10 rounded-t-md'>
	        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">
		        <select class="px-4 py-3 w-full rounded-md bg-gray-200 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm" placeholder='ici'>
		          <option value="" disabled selected hidden>Permis</option>
		          <option value="for-rent">En cours</option>
		          <option value="for-sale">Validé</option>
                  <option value="for-sale">Refusé</option>

		        </select>

		        <select class="px-4 py-3 w-full rounded-md bg-gray-200 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
		          <option value="" disabled selected hidden>Voiture</option>
		           <option value="for-rent">En cours</option>
		          <option value="for-sale">Validé</option>
                  <option value="for-sale">Refusé</option>
		        </select>


	         </div>
	    </div>
          <table class="min-w-full divide-y divide-gray-200">

            <thead class="bg-gray-50">

              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                     Nom / Prénom / Mail
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                  Permis
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                  Voitures
                </th>
                 <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                  Pilotes
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                  Participations
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="user in users" :key='user.id' :class="{'bg-gray-200 w-full': user.id%2 === 0}" >
                  <index-display-user :user="user" />
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
    import _ from 'lodash';
    import IndexDisplayUser from "@/Pages/Admin/Partials/IndexDisplayUser.vue"

    export default defineComponent({
        props:['users', 'CountUsers'],
        components: {
            Head,
            IndexDisplayUser
        },
         data() {
             return{
                 term: '',


             }
        },

        methods: {

            search: _.throttle(function(){
                this.$inertia.get(this.route('admin.index.users', {term:this.term}), {}, {preserveState: true, replace: true})

            }, 200),


        }

    })
</script>
