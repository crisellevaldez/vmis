<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Forms
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                    <div class="w-full max-w-screen-xl mx-auto px-6">
         
                        <div class="block text-gray-700 text-lg font-semibold py-2 px-2">
                            Verify Resident:
                        </div>
                        <div class="flex items-center bg-gray-200 rounded-md">
                            <div class="pl-2">
                                <svg class="fill-current text-gray-500 w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path class="heroicon-ui"
                                        d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
                                </svg>
                            </div>
                            <input
                                class="w-full rounded-md bg-gray-200 text-gray-700 leading-tight outline-none border-none py-2 px-2"
                                id="search" type="text" placeholder="Search teams or members">
                            
                            <select id="select-state" placeholder="Pick a state...">
    <option value="">Select a state...</option>
    <option value="AL">Alabama</option>
    <option value="AK">Alaska</option>
    <option value="AZ">Arizona</option>
    <option value="AR">Arkansas</option>
    <option value="CA">California</option>
    <option value="CO">Colorado</option>
    <option value="CT">Connecticut</option>
    <option value="DE">Delaware</option>
    <option value="DC">District of Columbia</option>
    <option value="FL">Florida</option>
    <option value="GA">Georgia</option>
    <option value="HI">Hawaii</option>
    <option value="ID">Idaho</option>
    <option value="IL">Illinois</option>
    <option value="IN">Indiana</option>
  </select>
                        </div>
                        <div class="py-3 text-sm">
                            <div id="business-form" class="flex justify-start cursor-pointer text-gray-700 rounded-md px-2 py-2 my-2" v-on:click="formSelect(1)">
                                <span class="bg-gray-400 h-2 w-2 m-2 rounded-full"></span>
                                <div class="flex-grow font-medium px-2">Business Permit</div>
                                <div class="text-sm font-normal text-gray-500 tracking-wide">Team</div>
                            </div>

                            <div id="business-form" class="flex justify-start cursor-pointer text-gray-700 rounded-md px-2 py-2 my-2" v-on:click="formSelect(1)">
                                <span class="bg-gray-400 h-2 w-2 m-2 rounded-full"></span>
                                <div class="flex-grow font-medium px-2">Business Permit</div>
                                <div class="text-sm font-normal text-gray-500 tracking-wide">Team</div>
                            </div>
                            
                        </div>
                        <div class="block text-sm text-right py-2 px-3 -mx-3 mb-3 rounded-b-lg">
                            
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" data-toggle="modal" data-target="#addResident">
                                Request Form
                            </button>
                        </div>
                    </div>
                </div>
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
                                                <h2 v-if="form.business=1" class="leading-relaxed">Business Permit</h2>
                                                <p class="text-sm text-gray-500 font-normal leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                                            </div>
                                        </div>

                                        <div class="divide-y divide-gray-200">
                                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                                <div class="flex flex-col">
                                                    <label class="leading-loose">Business Name</label>
                                                    <input type="text" v-model="business.name" id="businessName" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
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

                            <a href="#" v-on:click="printExample()" class="btn btn-success float-right">
                                <i class="fas fa-print"></i>
                            </a>
                        </form>
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
                form: {
                    business: ''
                
                },

                business: {
                    name: ''
                   
                },

                residentView: [],

                errors: null,
            }
        },

        methods: {

            formSelect(id){
                if(id == 1){
                    $('#business-form').addClass('text-blue-400 bg-blue-100');
                    this.form.business = 1;
                }
            },

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
                    title: 'Print Business Clearance?',
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
            $('select').selectize({
                sortField: 'text'
            });
        }
    }
</script>
