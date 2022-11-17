<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <inertia-link :href="route('houses')">
                    <jet-application-mark class="block w-auto" />

                    Residents
                </inertia-link>
                > Census
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3">
                   <form @submit.prevent="" id="formResident">
                        <div class="w-full">
                            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                                <div class="grid grid-cols-3 gap-2 p-2 rounded">
                                    <div class="flex border rounded bg-gray-300 items-center p-2 ">
                                        <input type="text" placeholder="House Number" v-model="house.house_number"
                                            class="bg-gray-300 w-full focus:outline-none outline-none border-none text-gray-700"/>
                                    </div>
                                    <div class="flex border rounded bg-gray-300 items-center p-2 ">
                                        <input type="text" placeholder="Street" v-model="house.street"
                                            class="bg-gray-300 w-full focus:outline-none outline-none border-none text-gray-700"/>
                                    </div>

                                    <div class="flex border rounded bg-gray-300 items-center p-2 ">
                                        <input type="text" placeholder="Sitio" v-model="house.sitio"
                                            class="bg-gray-300 w-full focus:outline-none outline-none border-none text-gray-700"/>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
                                <button class="btn btn-primary float-right mb-2" v-on:click="addRow()"> Add Row </button>
                                
                                <table class="w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                            <th class="py-3 px-6 text-left"></th>
                                            <th class="py-3 px-6 text-left">Fam No.</th>
                                            <th class="py-3 px-6 text-left">First Name</th>
                                            <th class="py-3 px-6 text-left">Last Name</th>
                                            <th class="py-3 px-6 text-center">Middle Name</th>
                                            <th class="py-3 px-6 text-center">Gender</th>
                                            <th class="py-3 px-6 text-center">Birth date</th>
                                            <th class="py-3 px-6 text-center">Contact No.</th>
                                            <th class="py-3 px-6 text-center">Occupation</th>
                                            <th class="py-3 px-6 text-center">Solo Parent</th>
                                            <th class="py-3 px-6 text-center">PWD</th>
                                            <th class="py-3 px-6 text-center">Ethnicity</th>
                                            <th class="py-3 px-6 text-center">Religion</th>
                                            <th class="py-3 px-6 text-center">School</th>
                                            </tr>
                                    </thead>
                                    <tbody v-for="(resident,index) in residents" :key="index" class="text-gray-600 text-sm font-light" id="resident-body">
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="py-3 px-6 pr-0">
                                                <div class="w-4 transform hover:text-red-500 hover:scale-110" v-on:click="removeRow(index)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </div>
                                            </td>

                                            <td class="py-3 px-6">
                                                <select v-model="residents[index].family_no" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none ">
                                                    <option value="1" selected>1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </td>

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
                                                <select v-model="residents[index].gender" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none ">
                                                    <option value="Female" selected>Female</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Others">Others</option>
                                                </select>
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
                                                <select v-model="residents[index].solo_parent" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none ">
                                                    <option value="Yes" selected>Yes</option>
                                                    <option value="No">No</option>
                                                </select>
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
                    
                        <div v-if="errors" class="pt-2 pb-2 bg-red-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg">
                            <div v-for="(v, k) in errors" :key="k" class="p-0 m-0">
                                <p v-for="error in v" :key="error" class="text-sm p-1 m-0 ">
                                {{ error }}
                                </p>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary float-right" v-on:click="addResident">Add</button>
                        
                    </form>
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

                residents: [
                    {
                        family_no: '',
                        first_name: '',
                        last_name: '',
                        middle_name: '',
                        gender: '',
                        birth_date: '',
                        contact_no: '',
                        occupation: '',
                        solo_parent: '',
                        pwd: '',
                        ethnicity: '',
                        religion: '',
                        school: ''
                    }
                ],

                house: {
                    house_number: '',
                    street: '',
                    sitio: ''
                },

                errors: null,
            }
        },

        methods: {
            addRow(){
                this.residents.push({
                        family_no: '',
                        first_name: '',
                        last_name: '',
                        middle_name: '',
                        gender: '',
                        birth_date: '',
                        contact_no: '',
                        occupation: '',
                        solo_parent: '',
                        pwd: '',
                        ethnicity: '',
                        religion: '',
                        school: ''});
            },

            removeRow(index){
                if(this.residents.length != 1){
                    this.residents.splice(index, 1);
                }
                
            },

            addResident(){
                axios.post('/api/residents',{
                    'residents': this.residents,
                    'house_info': this.house
                })
                .then((response) => {

                    Toast.fire({
                        icon:'success',
                        title: 'Resident(s) Successfully created.'
                    });

                    this.residents.splice(1,this.residents.length);
                    this.house = {
                        house_number: '',
                        street: '',
                        sitio: ''
                    },
                    this.residents[0] = {
                        family_no: '',
                        first_name: '',
                        last_name: '',
                        middle_name: '',
                        gender: '',
                        birth_date: '',
                        contact_no: '',
                        occupation: '',
                        solo_parent: '',
                        pwd: '',
                        ethnicity: '',
                        religion: '',
                        school: ''
                    };

                    
                }, (error) => {
                    this.errors = error.response.data.errors;
                });
    
                
            },
        }

    }
</script>
