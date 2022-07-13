<template>
    <app-layout>
        <main class="bg-gray-800 dark:bg-gray-800  h-screen overflow-hidden relative">
            <div class="flex items-start">
                <layout class='lg:mr-24'/>
                <events :events="$page.props.events.data"  />
            </div>
        </main>
    </app-layout>
</template>
<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Layout from '@/Pages/Admin/Partials/Layout.vue'
    import Events from '@/Pages/Admin/Partials/Events.vue'




    export default defineComponent({
        props: ['events'],

        components: {
            AppLayout,
            Layout,
            Events

        },
    })
</script>
