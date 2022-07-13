<template>
    <app-layout title='Weekndrive'>

        <main class="bg-gray-800 h-screen">

            <index :events="$page.props.events"/>

        </main>
    </app-layout>
</template>
<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Index from '@/Pages/Event/Partials/Index.vue'


export default defineComponent({
    props: ['events'],
  components: {
      AppLayout,
      Index, },

})
</script>
