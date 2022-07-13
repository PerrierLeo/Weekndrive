<template>
    <app-layout>
        <main class="bg-gray-800 dark:bg-gray-800  h-screen overflow-hidden relative">
            <div class="flex items-start">
                <layout class='lg:mr-24'/>
                <users :users="$page.props.users.data" :CountUsers="$page.props.CountUsers" />

            </div>
        </main>
    </app-layout>
</template>
<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Layout from '@/Pages/Admin/Partials/Layout.vue'
    import Users from '@/Pages/Admin/Partials/Users.vue'




    export default defineComponent({
        props: ['users', 'CountUsers', 'CountEvents', 'events'],

        components: {
            AppLayout,
            Layout,
            Users

        },
    })
</script>
