<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden sm:rounded-lg">
                    <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="p-5 bg-white rounded shadow-sm">
                            <div class="text-base text-gray-400 ">Residents</div>
                            <div class="flex items-center pt-1">
                                <div class="text-2xl font-bold text-gray-900 ">{{count.residentCount}}</div>
                            </div>
                        </div>
                        <div class="p-5 bg-white rounded shadow-sm">
                            <div class="text-base text-gray-400 ">Users</div>
                            <div class="flex items-center pt-1">
                                <div class="text-2xl font-bold text-gray-900 ">{{count.userCount}}</div>
                            </div>
                        </div>
                        <div class="p-5 bg-white rounded shadow-sm">
                            <div class="text-base text-gray-400 ">Forms</div>
                            <div class="flex items-center pt-1">
                                <div class="text-2xl font-bold text-gray-900 ">4</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
            Welcome,
        },

        data(){
            return{
                count: {}
            }
        },

        methods: {
            getResidentNumber(){
                axios.get('/api/resident-number')
                .then((res) => {
                    this.count = res.data;
                    console.log(res.data);
                }).catch((err) => {
                    console.log(err);
                });
            }, 
        },

        created(){
            this.getResidentNumber();
        }
    }
</script>
