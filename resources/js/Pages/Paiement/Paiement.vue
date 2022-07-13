<template>
  <main class="lg:min-h-full lg:overflow-hidden lg:flex lg:flex-row-reverse bg-gray-800">
    <div class="px-4 py-6 sm:px-6 lg:hidden">
      <div class="max-w-lg mx-auto flex">
        <a href="#">
          <span class="sr-only">Workflow</span>
          <img src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&amp;shade=600" alt="" class="h-8 w-auto" />
        </a>
      </div>
    </div>

    <h1 class="sr-only">Checkout</h1>

    <!-- Checkout form -->
    <section aria-labelledby="payment-heading" class="flex-auto overflow-y-auto px-4 pt-12 pb-16 sm:px-6 sm:pt-16 lg:px-8 lg:pt-0 lg:pb-24">
      <div class="max-w-lg mx-auto">
        <div class="hidden pt-10 pb-16 lg:flex">
          <a href="#">
            <span class="sr-only">Workflow</span>
          </a>
        </div>

        <button type="button" class="w-full flex items-center justify-center bg-black border border-transparent text-white rounded-md py-2 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900">
          <span class="sr-only">Pay with Apple Pay</span>
          <svg class="h-5 w-auto" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 20">
            <path d="M9.536 2.579c-.571.675-1.485 1.208-2.4 1.132-.113-.914.334-1.884.858-2.484C8.565.533 9.564.038 10.374 0c.095.951-.276 1.884-.838 2.579zm.829 1.313c-1.324-.077-2.457.751-3.085.751-.638 0-1.6-.713-2.647-.694-1.362.019-2.628.79-3.323 2.017-1.429 2.455-.372 6.09 1.009 8.087.676.99 1.485 2.075 2.552 2.036 1.009-.038 1.409-.656 2.628-.656 1.228 0 1.58.656 2.647.637 1.104-.019 1.8-.99 2.475-1.979.771-1.122 1.086-2.217 1.105-2.274-.02-.019-2.133-.828-2.152-3.263-.02-2.036 1.666-3.007 1.742-3.064-.952-1.408-2.437-1.56-2.951-1.598zm7.645-2.76v14.834h2.305v-5.072h3.19c2.913 0 4.96-1.998 4.96-4.89 0-2.893-2.01-4.872-4.885-4.872h-5.57zm2.305 1.941h2.656c2 0 3.142 1.066 3.142 2.94 0 1.875-1.142 2.95-3.151 2.95h-2.647v-5.89zM32.673 16.08c1.448 0 2.79-.733 3.4-1.893h.047v1.779h2.133V8.582c0-2.14-1.714-3.52-4.351-3.52-2.447 0-4.256 1.399-4.323 3.32h2.076c.171-.913 1.018-1.512 2.18-1.512 1.41 0 2.2.656 2.2 1.865v.818l-2.876.171c-2.675.162-4.123 1.256-4.123 3.159 0 1.922 1.495 3.197 3.637 3.197zm.62-1.76c-1.229 0-2.01-.59-2.01-1.494 0-.933.752-1.475 2.19-1.56l2.562-.162v.837c0 1.39-1.181 2.379-2.743 2.379zM41.1 20c2.247 0 3.304-.856 4.227-3.454l4.047-11.341h-2.342l-2.714 8.763h-.047l-2.714-8.763h-2.409l3.904 10.799-.21.656c-.352 1.114-.923 1.542-1.942 1.542-.18 0-.533-.02-.676-.038v1.779c.133.038.705.057.876.057z" />
          </svg>
        </button>

        <div class="relative mt-8">
          <div class="absolute inset-0 flex items-center" aria-hidden="true">
            <div class="w-full border-t border-gray-200" />
          </div>
          <div class="relative flex justify-center">
            <span class="px-4 bg-white text-sm font-medium text-gray-500">
              or
            </span>
          </div>
        </div>

        <form class="mt-6">
          <div class="grid grid-cols-12 gap-y-6 gap-x-4">
            <div class="col-span-full">
              <label for="email-address" class="block text-sm font-medium text-gray-200">Email</label>
              <div class="mt-1">
                <input type="email" id="email-addsress" name="email-address" v-model='email' autocomplete="email" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
              </div>
            </div>

             <div class="col-span-full">
              <label for="address" class="block text-sm font-medium text-gray-200">Adresse</label>
              <div class="mt-1">
                <input type="text" id="address" name="address" v-model='customer.address' autocomplete="street-address" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
              </div>
            </div>

             <div class="col-span-full sm:col-span-6">
              <label for="city" class="block text-sm font-medium text-gray-200">Ville</label>
              <div class="mt-1">
                <input type="text" id="city" name="city" v-model='customer.city' autocomplete="address-level2" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
              </div>
            </div>

              <div class="col-span-full sm:col-span-6">
              <label for="postal-code" class="block text-sm font-medium text-gray-200">Code Postal</label>
              <div class="mt-1">
                <input type="text" id="postal-code" name="postal-code" v-model='customer.postal_code' autocomplete="postal-code" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
              </div>
            </div>
          </div>

            <div class="col-span-full">
              <label for="name-on-card" class="block text-sm font-medium text-gray-200">Name on card</label>
              <div class="mt-1">
                <input type="text" id="card-holder-name" name="card-holder-name" v-model='customer.card_holder_name' autocomplete="cc-name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
              </div>
            </div>

            <div class="col-span-full">
              <label for="card-element" class="block text-sm font-medium text-gray-200">Credit Card</label>
              <div class="mt-1">
                <div id="card-element"></div>
              </div>
            </div>

    </form>
      </div>

    </section>
  </main>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import JetLabel from '@/Jetstream/Label.vue'
export default defineComponent({
    props: ['event'],
  components: {
      AppLayout,
      JetLabel,

    },
    data() {
            return {

                }



    },


     computed:{


            },
        methods:{




        }
})

</script>

