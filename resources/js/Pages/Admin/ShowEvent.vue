<template>
    <app-layout>
            <div class="flex items-start bg-gray-800 pb-20">
                <layout class='lg:mr-24'/>
                <event :event="$page.props.event" />
            </div>
    </app-layout>
</template>
<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Layout from '@/Pages/Admin/Partials/Layout.vue'
    import Event from '@/Pages/Admin/Partials/Event.vue'





    export default defineComponent({
        props: ['event'],

        components: {
            AppLayout,
            Layout,
            Event,

        },
    })
</script>
