<template>
    <app-layout>
            <div class="flex items-start">
                <layout class='lg:mr-24'/>
                <user :user="$page.props.user" />
            </div>
    </app-layout>
</template>
<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Layout from '@/Pages/Admin/Partials/Layout.vue'
    import User from '@/Pages/Admin/Partials/User.vue'





    export default defineComponent({
        props: ['user'],

        components: {
            AppLayout,
            Layout,
            User,

        },
    })
</script>
