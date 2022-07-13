
<template>
<body>
    <header class="h-24 sm:h-32 flex items-center z-30 w-full bg-gray-800">
        <Head :title="title">
            <meta name="Weekndrive" content="Weekndrive">
            <link rel="icon" type="image/svg+xml" href="/favicon.ico" />
        </Head>

      <div class="container mx-auto px-6 flex items-center justify-between">
        <div class="uppercase font-bebas-neue text-white font-black text-5xl"><a href='/'>Weekndrive</a></div>
        <div class="flex items-center">
          <nav
            class="font-sen text-white uppercase text-lg lg:flex items-center hidden">
            <a :href="route('event.index')"  class="py-2 px-6 flex"> évènements </a>
            <a href="#" class="py-2 px-6 flex"> Qui sommes-nous ? </a>
            <a href="#" class="py-2 px-6 flex"> Articles </a>
            <a href="#" class="py-2 px-6 flex"> Contact </a>
          </nav>
          <div class="hidden sm:flex sm:items-center sm:ml-6">
            <!-- Settings Dropdown -->
            <div class="ml-3 relative">
              <jet-dropdown align="right" width="48">
                <template #trigger>
                  <span class="inline-flex rounded-md">
                    <button
                      type="button"
                      class=" inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-lg bg-pink-500 text-white hover:text-gray-700 focus:outline-none transition">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                      </svg>
                    </button>
                  </span>
                </template>

                <template #content>

                  <jet-dropdown-link :href="route('admin.index')" v-if="$page.props.user && $page.props.user.isAdmin">
                    Admin
                    <div class="border-t border-gray-100"></div>

                  </jet-dropdown-link>

                  <jet-dropdown-link :href="route('profile.show')" v-if="$page.props.user">
                    Profile
                  </jet-dropdown-link>

                  <jet-dropdown-link :href="route('garage.index')" v-if="$page.props.user">
                    Garage
                  </jet-dropdown-link>

                 <jet-dropdown-link :href="route('orders.show')" v-if="$page.props.user">
                    Participations
                  </jet-dropdown-link>


                   <jet-dropdown-link :href="route('login')" v-else>
                    Connexion
                  </jet-dropdown-link>

                  <jet-dropdown-link
                    :href="route('api-tokens.index')"
                    v-if="$page.props.jetstream.hasApiFeatures"
                  >
                    API Tokens
                  </jet-dropdown-link>

                  <div class="border-t border-gray-100"></div>

                  <!-- Authentication -->
                  <form @submit.prevent="logout" v-if="$page.props.user">
                    <jet-dropdown-link as="button"> Déconnexion </jet-dropdown-link>
                  </form>

                   <jet-dropdown-link :href="route('register')" v-else>
                    Inscription
                  </jet-dropdown-link>
                </template>
              </jet-dropdown>
            </div>
          </div>

          <button class="lg:hidden flex flex-col ml-4">
            <span class="w-6 h-1 bg-white mb-1"> </span>
            <span class="w-6 h-1 bg-white mb-1"> </span>
            <span class="w-6 h-1 bg-white mb-1"> </span>
          </button>
        </div>
      </div>
    </header>

    <main class='bg-gray-800'>
        <slot>
        </slot>
    </main>

</body>
</template>
<script>
import { Head, Link } from "@inertiajs/inertia-vue3";

import DropdownLink from "../Jetstream/DropdownLink.vue";
import JetDropdownLink from "@/Jetstream/DropdownLink.vue";
import JetDropdown from "@/Jetstream/Dropdown.vue";

export default {
     props: {
            title: String,
        },
  components: {

    Head,
    Link,
    DropdownLink,
    JetDropdownLink,
    JetDropdown,
  },

  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
  },

  methods: {
    logout() {
      this.$inertia.post(route("logout"));
    },
  },
};
</script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');
</style>
