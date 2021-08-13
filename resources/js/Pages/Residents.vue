<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <inertia-link :href="route('houses')">
                    <jet-application-mark class="block w-auto" />

                    Residents
                </inertia-link>
                > Family
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                        <div v-for="(house,index) in house_info" :key="index" class="grid grid-cols-3 gap-2 p-2 rounded">
                            <div class="flex border rounded bg-gray-300 items-center p-2 ">
                                <input type="text" placeholder="House Number" v-model="house.house_number"
                                    class="bg-gray-300 w-full focus:outline-none outline-none border-none text-gray-700" readonly/>
                            </div>
                            <div class="flex border rounded bg-gray-300 items-center p-2 ">
                                <input type="text" placeholder="Street" v-model="house.street"
                                    class="bg-gray-300 w-full focus:outline-none outline-none border-none text-gray-700" readonly/>
                            </div>

                            <div class="flex border rounded bg-gray-300 items-center p-2 ">
                                <input type="text" placeholder="Sitio" v-model="house.sitio"
                                    class="bg-gray-300 w-full focus:outline-none outline-none border-none text-gray-700" readonly/>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
                        <table class="w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">First Name</th>
                                    <th class="py-3 px-6 text-left">Last Name</th>
                                    <th class="py-3 px-6 text-center">Middle Name</th>
                                    <th class="py-3 px-6 text-center">Birth date</th>
                                    <th class="py-3 px-6 text-center">Contact No.</th>
                                    <th class="py-3 px-6 text-center">Occupation</th>
                                    <th class="py-3 px-6 text-center">PWD</th>
                                    <th class="py-3 px-6 text-center">Ethnicity</th>
                                    <th class="py-3 px-6 text-center">Religion</th>
                                    <th class="py-3 px-6 text-center">School</th>
                                    </tr>
                            </thead>
                            <tbody v-for="(resident,index) in residents" :key="index" class="text-gray-600 text-sm font-light" id="resident-body">
                                <tr class="border-b border-gray-200 hover:bg-gray-100" :class="{'bg-yellow-100': residents[index].family_no === 1,  'bg-green-100': residents[index].family_no === 2, 'bg-blue-100': residents[index].family_no === 3, 'bg-purple-100': residents[index].family_no === 4, 'bg-pink-100': residents[index].family_no === 5}">
                                 
                                    <td class="py-3 px-6">
                                        <input type="text" v-model="residents[index].first_name" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none ">
                                    </td>
                                    <td class="py-3 px-6">
                                        <input type="text" v-model="residents[index].last_name" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none ">
                                    </td>
                                    <td class="py-3 px-6">
                                        <input type="text" v-model="residents[index].middle_name" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none ">
                                    </td>
                                    <td class="py-3 px-6">
                                        <input type="date" v-model="residents[index].birth_date" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none ">
                                    </td>
                                    <td class="py-3 px-6">
                                        <input type="text" v-model="residents[index].contact_no" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none ">
                                    </td>
                                    <td class="py-3 px-6">
                                        <input type="text" v-model="residents[index].occupation" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none ">
                                    </td>
                                    <td class="py-3 px-6">
                                        <input type="text" v-model="residents[index].pwd" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none ">
                                    </td>
                                    <td class="py-3 px-6">
                                        <input type="text" v-model="residents[index].ethnicity" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none">
                                    </td>
                                    <td class="py-3 px-6">
                                        <input type="text" v-model="residents[index].religion" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none ">
                                    </td>
                                    <td class="py-3 px-6">
                                        <input type="text" v-model="residents[index].school" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none ">
                                    </td>
                                    
                                </tr>   
                                        
                            </tbody>
                        </table>
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
                residents: [],
                resident: {
                    first_name: '',
                    last_name: '',
                    middle_name: '',
                    birth_date: '',
                    address: '',
                    birthdate: ''
                },

                house_info: [],
                errors: null,
            }
        },

        methods: {


            getResident(){
                const url = window.location.href;
                const lastParam = url.split("/").slice(-1)[0];

                axios.get('/api/resident-house/'+lastParam)
                .then((res) => {
                    this.residents = res.data.residents;
                    this.house_info = res.data.house_info;
                }).catch((err) => {
                    console.log(err);
                });
            },

            updateResident(){

            }
        },

        created(){
            this.getResident();
            
        }
    }
</script>
