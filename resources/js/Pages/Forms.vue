<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Request Forms
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                    <div class="w-full max-w-screen-xl mx-auto px-6">
         
                        <div class="block text-gray-700 text-lg font-semibold py-2 px-2 mt-5">
                            Verify Resident:
                        </div>
                        <div class="flex items-center bg-gray-100 rounded-md">
                            <div class="pl-2">
                                <svg class="fill-current text-gray-500 w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24">
                                    <path class="heroicon-ui"
                                        d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
                                </svg>
                            </div>
                            
                                <input id="verify-input" v-on:keyup="verifyResident()" class="w-full rounded-md bg-gray-100 text-gray-700 leading-tight outline-none border-none py-2 px-2" list="residents" name="residents" type="text">
                                <datalist id="residents">
                                    <option v-for="resident in residents" :key="resident.id" :value="resident.id">{{resident.first_name + ' ' + resident.last_name}}</option>
                                </datalist>

                                <span id="verify-user" class="m-3 text-xs font-semibold inline-block py-1 px-2 uppercase rounded text-red-600 bg-red-200 uppercase last:mr-0 mr-1">
                                    unverified
                                </span>
                        </div>
                        <div class="py-3 text-sm">

                            <div class="block text-gray-700 text-lg font-semibold py-2 px-2">
                                Select Form (one at a time):
                            </div>

                            <div id="business-form" class="flex justify-start cursor-pointer text-gray-700 rounded-md px-2 py-2 my-2" v-on:click="formSelect(1)">
                                <span class="bg-gray-400 h-2 w-2 m-2 rounded-full"></span>
                                <div class="flex-grow font-medium px-2">Business Permit</div>
                                <div class="text-sm font-normal text-gray-500 tracking-wide"></div>
                            </div>

                            <div id="med-form" class="flex justify-start cursor-pointer text-gray-700 rounded-md px-2 py-2 my-2" v-on:click="formSelect(2)">
                                <span class="bg-gray-400 h-2 w-2 m-2 rounded-full"></span>
                                <div class="flex-grow font-medium px-2">Medical Certificate</div>
                                <div class="text-sm font-normal text-gray-500 tracking-wide"></div>
                            </div>

                            <div id="notmarried-form" class="flex justify-start cursor-pointer text-gray-700 rounded-md px-2 py-2 my-2" v-on:click="formSelect(3)">
                                <span class="bg-gray-400 h-2 w-2 m-2 rounded-full"></span>
                                <div class="flex-grow font-medium px-2">Marital Status</div>
                                <div class="text-sm font-normal text-gray-500 tracking-wide"></div>
                            </div>

                            <div id="indigency-form" class="flex justify-start cursor-pointer text-gray-700 rounded-md px-2 py-2 my-2" v-on:click="formSelect(4)">
                                <span class="bg-gray-400 h-2 w-2 m-2 rounded-full"></span>
                                <div class="flex-grow font-medium px-2">Barangay Certificate Of Indigency</div>
                                <div class="text-sm font-normal text-gray-500 tracking-wide"></div>
                            </div>
                        </div>
                        <div class="block text-sm text-right py-2 px-3 -mx-3 mb-3 rounded-b-lg">
                            
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" v-on:click="formRequest()">
                                Request Form
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Business Modal -->
        <div class="modal fade" id="businessForm" tabindex="-1" role="dialog" aria-labelledby="addResident" aria-hidden="true">
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

                                        <div class="divide-y divide-gray-200 mt-3">
                                            <div class="text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                                <div class="flex flex-col">
                                                    <label class="leading-loose">Business Name</label>
                                                    <input type="text" v-model="business.name" id="businessName" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="divide-y divide-gray-200 mt-3">
                                            <div class="text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                                <div class="flex flex-col">
                                                    <label class="leading-loose">Business Address</label>
                                                    <input type="text" v-model="business.address" id="businessAdd" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="divide-y divide-gray-200 mt-3">
                                            <div class="text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                                <div class="flex flex-col">
                                                    <label class="leading-loose"> Choose One:</label>
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" name="businessType" value="oldBusiness" v-model="business.type" class="form-radio h-5 w-5 text-gray-600"><span class="ml-2 text-gray-700"> Old Business </span>
                                                        <input type="radio" name="businessType" value="newBusiness" v-model="business.type" class="form-radio h-5 w-5 ml-2 text-gray-600"><span class="ml-2 text-gray-700"> New Business </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="divide-y divide-gray-200 mt-3">
                                            <div class="text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                                <div class="flex flex-col">
                                                    <label class="leading-loose"> Period Due Date</label>

                                                    <input type="date" v-model="business.period_date" id="periodDate" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button v-on:click="printExample()" class="btn btn-primary float-right mt-2">
                                    Print
                                </button>

                            </div>

                            <div v-if="errors" class="pt-2 pb-2 bg-red-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg">
                                <div v-for="(v, k) in errors" :key="k" class="p-0 m-0">
                                    <p v-for="error in v" :key="error" class="text-sm p-1 m-0 ">
                                    {{ error }}
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Med Modal -->
        <div class="modal fade" id="medModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id=""> Brgy. Matungao Bulakan, Bulacan </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="" id="">
                            <!-- component -->
                            <div class="relative ml-3 mr-3">
                                <div class="relative">
                                    <div class="">
                                        <div class="flex items-center space-x-5">
                                            <div class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">i</div>
                                            <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                                                <h2 class="leading-relaxed">Medical Certificate</h2>
                                                <p class="text-sm text-gray-500 font-normal leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                                            </div>
                                        </div>

                                        <div class="divide-y divide-gray-200 mt-3">
                                            <div class="text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                                <div class="flex flex-col">
                                                    <label class="leading-loose"> Treated Date</label>

                                                    <input type="date" id="treatedDate" v-model="med.treated_date" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button v-on:click="printExample()" class="btn btn-primary float-right mt-2">
                                    Print
                                </button>

                            </div>

                            <div v-if="errors" class="pt-2 pb-2 bg-red-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg">
                                <div v-for="(v, k) in errors" :key="k" class="p-0 m-0">
                                    <p v-for="error in v" :key="error" class="text-sm p-1 m-0 ">
                                    {{ error }}
                                    </p>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Not Married Modal -->
        <div class="modal fade" id="notmarModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id=""> Brgy. Matungao Bulakan, Bulacan </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="" id="">
                            <!-- component -->
                            <div class="relative ml-3 mr-3">
                                <div class="relative">
                                    <div class="">
                                        <div class="flex items-center space-x-5">
                                            <div class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">i</div>
                                            <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                                                <h2 class="leading-relaxed">Not Married</h2>
                                                <p class="text-sm text-gray-500 font-normal leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                                            </div>
                                        </div>

                                        <div class="divide-y divide-gray-200 mt-3">
                                            <div class="text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                                <label class="leading-loose"> Husband's Name and Age</label>
                                                <div class="flex ">
                                                    <input type="text" id="husband" v-model="notmarried.husband" class="px-4 py-2 border mr-2 focus:ring-gray-500 focus:border-gray-900 w-8/12 sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                    <input type="text" id="husbandAge" v-model="notmarried.husband_age" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-4/12 sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                </div>

                                                <label class="leading-loose"> Wife's Name and Age</label>
                                                <div class="flex">
                                                    <input type="text" id="wife" v-model="notmarried.wife" class="px-4 py-2 border mr-2 focus:ring-gray-500 focus:border-gray-900 w-8/12 sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                    <input type="text" id="wifeAge" v-model="notmarried.wife_age" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-4/12 sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                </div>

                                                <div class="flex flex-col">
                                                    <label class="leading-loose"> Years Together</label>

                                                    <input type="text" id="years" v-model="notmarried.years" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-1/4 sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button v-on:click="printExample()" class="btn btn-primary float-right mt-2">
                                    Print
                                </button>
                            </div>

                            <div v-if="errors" class="pt-2 pb-2 bg-red-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg">
                                <div v-for="(v, k) in errors" :key="k" class="p-0 m-0">
                                    <p v-for="error in v" :key="error" class="text-sm p-1 m-0 ">
                                    {{ error }}
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Indigency -->
        <div class="modal fade" id="indigencyModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id=""> Brgy. Matungao Bulakan, Bulacan </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="" id="">
                            <!-- component -->
                            <div class="relative ml-3 mr-3">
                                <div class="relative">
                                    <div class="">
                                        
                                    </div>
                                </div>

                                <button v-on:click="printExample()" class="btn btn-primary float-right mt-2">
                                    Print
                                </button>
                            </div>

                            <div v-if="errors" class="pt-2 pb-2 bg-red-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg">
                                <div v-for="(v, k) in errors" :key="k" class="p-0 m-0">
                                    <p v-for="error in v" :key="error" class="text-sm p-1 m-0 ">
                                    {{ error }}
                                    </p>
                                </div>
                            </div>
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
                    verified: 0,
                    busi: 0,
                    med: 0,
                    notmarried: 0,
                    indigency: 0
                },

                business: {
                    name: '',
                    address: '',
                    period_date: '',
                    type: ''
                },

                med: {
                    treated_date: ''
                },

                notmarried:{
                    husband: '',
                    wife: '',
                    husband_age: '',
                    wife_age: '',
                    years: ''
                },

                indigency: {

                },

                residentInfo: [],

                errors: null,
            }
        },

        methods: {

            formSelect(id){
                if(id == 1){
                    this.form.busi = 1;
                    this.form.med = 0;
                    this.form.notmarried = 0;
                    this.form.indigency = 0;
                    $('#business-form').addClass('text-blue-400 bg-blue-100');
                    $('#med-form').removeClass('text-blue-400 bg-blue-100');
                    $('#notmarried-form').removeClass('text-blue-400 bg-blue-100');
                    $('#indigency-form').removeClass('text-blue-400 bg-blue-100');
                }

                else if(id == 2){
                    this.form.med = 1;
                    this.form.busi = 0;
                    this.form.notmarried = 0;
                    this.form.indigency = 0;
                    $('#med-form').addClass('text-blue-400 bg-blue-100');
                    $('#business-form').removeClass('text-blue-400 bg-blue-100');
                    $('#notmarried-form').removeClass('text-blue-400 bg-blue-100');
                    $('#indigency-form').removeClass('text-blue-400 bg-blue-100');
                }

                else if(id == 3){
                    this.form.notmarried = 1;
                    this.form.busi = 0;
                    this.form.med = 0;
                    this.form.indigency = 0;
                    $('#notmarried-form').addClass('text-blue-400 bg-blue-100');
                    $('#business-form').removeClass('text-blue-400 bg-blue-100');
                    $('#med-form').removeClass('text-blue-400 bg-blue-100');
                    $('#indigency-form').removeClass('text-blue-400 bg-blue-100');
                }

                else if(id == 4){
                    this.form.indigency = 1;
                    this.form.busi = 0;
                    this.form.med = 0;
                    this.form.notmarried = 0;
                    $('#indigency-form').addClass('text-blue-400 bg-blue-100');
                    $('#notmarried-form').removeClass('text-blue-400 bg-blue-100');
                    $('#business-form').removeClass('text-blue-400 bg-blue-100');
                    $('#med-form').removeClass('text-blue-400 bg-blue-100');
                }

            },

            formRequest(){
                var verified = this.form.verified;
                console.log(this.form);
                if(verified == 1){
                    if (this.form.busi == 1){
                        $('#businessForm').modal('show');
                    }

                    else if (this.form.med == 1){
                        $('#medModal').modal('show');
                    }

                    else if (this.form.notmarried == 1){
                        $('#notmarModal').modal('show');
                    }

                    else if (this.form.indigency == 1){
                        $('#indigencyModal').modal('show');
                    }
                }

                else {
                    Swal.fire(
                        'Error (Resident Unknown)',
                        'Please verify the resident before requesting form.',
                        'error'
                    )
                }

            },

            verifyResident(){
                var resId = $('#verify-input').val();
               
                if (resId != ''){
                    axios.get('/api/residents/'+resId)
                    .then((res) => {
                        this.residentInfo = res.data;
                        this.form.verified = 1;
                        $('#verify-user').text('VERIFIED').removeClass('bg-red-200 text-red-600').addClass('bg-green-200 text-green-600');
                    }).catch((err) => {
                        this.form.verified = 0;
                        $('#verify-user').text('UNVERIFIED').removeClass('bg-green-200 text-green-600').addClass('bg-red-200 text-red-600');
                    });
                }


                else{
                    this.form.verified = 0;
                    $('#verify-user').text('UNVERIFIED').removeClass('bg-green-200 text-green-600').addClass('bg-red-200 text-red-600');
                }

                
                console.log(resId);

            },


            printExample(){
                if (this.form.busi == 1){

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

                            axios.get('business-clearance', {
                                params: {
                                    residents: this.residentInfo,
                                    business: this.business
                                }
                            })
                            .then((res) => {
                                var printWindow = window.open();
                                printWindow.document.write(res.data);
                                printWindow.document.close();
                            }).catch((err) => {
                                console.log(err);
                            });
                        }
                    }, (error) => {
                        this.errors = error.response.data.errors;
                    });
                }

                else if (this.form.med == 1){

                    Swal.fire({
                    title: 'Print Medical Certificate?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Print'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {

                            axios.get('medical-certificate', {
                                params: {
                                    residents: this.residentInfo,
                                    treated_date: this.med
                                }
                            })
                            .then((res) => {
                                var printWindow = window.open();
                                printWindow.document.write(res.data);
                                printWindow.document.close();
                            }).catch((err) => {
                                console.log(err);
                            });
                        }
                    }, (error) => {
                        this.errors = error.response.data.errors;
                    });
                }

                else if (this.form.notmarried == 1){

                    Swal.fire({
                    title: 'Print Marital Status?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Print'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {

                            axios.get('not-married', {
                                params: {
                                    residents: this.residentInfo,
                                    notmarried: this.notmarried
                                }
                            })
                            .then((res) => {
                                var printWindow = window.open();
                                printWindow.document.write(res.data);
                                printWindow.document.close();
                            }).catch((err) => {
                                console.log(err);
                            });
                        }
                    }, (error) => {
                        this.errors = error.response.data.errors;
                    });
                }

                else if (this.form.indigency == 1){

                    Swal.fire({
                    title: 'Print Barangay Certificate Of Indigency?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Print'
                    })
                    .then((result) => {
                        if (result.isConfirmed) {

                            axios.get('indigency', {
                                params: {
                                    residents: this.residentInfo
                                }
                            })
                            .then((res) => {
                                var printWindow = window.open();
                                printWindow.document.write(res.data);
                                printWindow.document.close();
                            }).catch((err) => {
                                console.log(err);
                            });
                        }
                    }, (error) => {
                        this.errors = error.response.data.errors;
                    });
                }
                

            },
        

            getResident(){
                axios.get('/api/showall')
                .then((res) => {
                    this.residents = res.data;
                }).catch((err) => {
                    console.log(err);
                });
            },


        },

        created(){
            this.getResident();
        }
    }
</script>
