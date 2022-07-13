<template>
    <app-layout title='Weekndrive'>



<div class="bg-white-800">

{{this.$page.props.charge}}


</div>




    </app-layout>
</template>
<script>
import { defineComponent } from 'vue'

import AppLayout from '@/Layouts/AppLayout.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetInputError from '@/Jetstream/InputError.vue'



export default defineComponent({
    props: ['charge'],
  components: {
      AppLayout,
      JetLabel,
      JetInputError

       },

    data() {
            return {





            }
        },

    })







</script>
