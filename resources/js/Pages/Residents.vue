<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Residents
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                    <!-- Table Residents -->
                    <table class="border-collapse w-full align-center">
                        <thead>
                            <tr>
                                <th class="text-left p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">ID</th>
                                <th class="text-left p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">First Name</th>
                                <th class="text-left p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Last Name</th>
                                <th class="text-left p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Address</th>
                                <th class="text-left p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Gender</th>
                                <th class="text-left p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Status</th>
                                <th class="text-left p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="resident in residents" :key="resident.id" class="text-left bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-left border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Company name</span>
                                    {{resident.id}}
                                </td>
                                
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-left border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Company name</span>
                                    {{resident.first_name}}
                                </td>
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-left border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Country</span>
                                    {{resident.last_name}}
                                </td>
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-left border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Country</span>
                                    {{resident.middle_name}}
                                </td>
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-left border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Country</span>
                                    {{resident.address}}
                                </td>
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-left border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                                    <span class="rounded bg-red-400 py-1 px-3 text-xs font-bold">with case</span>
                                </td>
                                <td class="w-full lg:w-auto p-3 text-gray-800 text-left border border-b block lg:table-cell relative lg:static">
                                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                                    <a href="#" data-toggle="modal" data-target="#viewResident"  v-on:click="viewResidentInfo(resident.id)" class="btn btn-success">
                                        <i class="fas fa-print"></i>
                                    </a>
                                    <a href="#" class="text-blue-400 hover:text-blue-600 underline pl-6">Remove</a>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-primary float-right mt-3 mb-3" data-toggle="modal" data-target="#addResident"> Add New </button>
            </div>
        </div>

        <!-- Add Modal -->
        <div class="modal fade" id="addResident" tabindex="-1" role="dialog" aria-labelledby="addResident" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStudent"> Brgy. Matungao Bulakan, Bulacan </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="addResident" id="formResident">
                            <!-- component -->
                            <div class="relative ml-3 mr-3">
                                <div class="relative">
                                    <div class="">
                                        <div class="flex items-center space-x-5">
                                            <div class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">i</div>
                                            <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                                                <h2 class="leading-relaxed">Create new Resident</h2>
                                                <p class="text-sm text-gray-500 font-normal leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                                            </div>
                                        </div>

                                        <div class="divide-y divide-gray-200">
                                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                                <div class="flex flex-col">
                                                    <label class="leading-loose">First Name</label>
                                                    <input type="text" v-model="resident.first_name" id="firstName" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                </div>
                                                <div class="flex flex-col">
                                                    <label class="leading-loose">Last Name</label>
                                                    <input type="text" v-model="resident.last_name" id="lastName" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                </div>

                                                <div class="flex items-center space-x-4">
                                                    <div class="flex flex-col">
                                                        <div class="flex flex-col">
                                                            <label class="leading-loose">Middle Name</label>
                                                            <input type="text" v-model="resident.middle_name" id="middleName" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Optional">
                                                        </div>
                                                    </div>

                                                    <div class="flex flex-col">
                                                        <label class="leading-loose">Birthdate</label>
                                                        <div class="relative focus-within:text-gray-600 text-gray-400">
                                                            <input type="text" v-model="resident.birthdate" id="birthDate" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="26/02/2020">
                                                            <div class="absolute left-3 top-2">
                                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="flex flex-col">
                                                    <label class="leading-loose">Address</label>
                                                    <input type="text" v-model="resident.address" id="address" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div v-if="errors" class="pt-2 pb-2 bg-red-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg">
                                <div v-for="(v, k) in errors" :key="k" class="p-0 m-0">
                                    <p v-for="error in v" :key="error" class="text-sm p-1 m-0 ">
                                    {{ error }}
                                    </p>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- View Modal -->
        <div class="modal fade" id="viewResident" tabindex="-1" role="dialog" aria-labelledby="viewResident" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewResident"> Brgy. Matungao Bulakan, Bulacan </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <a href="#" v-on:click="printExample()" class="btn btn-success">
                            <i class="fas fa-print"></i>
                        </a>
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

                residentView: [],

                errors: null,
            }
        },

        methods: {

            viewResidentInfo(id){
                axios.get('/api/residents/'+id)
                .then((res) => {
                    this.residentView = res.data;
                }).catch((err) => {
                    console.log(err);
                });
            },

            printExample(){
                Swal.fire({
                    title: 'Print resident '+this.residentView.first_name,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Print'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {

                            axios.get('/api/example/'+this.residentView.id)
                            .then((res) => {
                                var printWindow = window.open();
                                printWindow.document.write(res);
                                printWindow.document.close();
                            }).catch((err) => {
                                console.log(err);
                            });
                        }
                    });

            },

            addResident(){
                axios.post('/api/residents', this.resident)
                .then((response) => {
                    this.resident = '';
                    $('#addResident').modal('hide');
                    this.getResident();

                    Toast.fire({
                        icon:'success',
                        title: 'Resident Successfully created.'
                    });

                    /*Swal.fire(
                        'Created',
                        'You successfully created resident '+response.data.first_name+' '+response.data.first_name+'.',
                        'success'
                    );*/
                    
                }, (error) => {
                    this.errors = error.response.data.errors;
                });
    
                
            },

            getResident(){
                axios.get('/api/residents')
                .then((res) => {
                    this.residents = res.data.data;
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
