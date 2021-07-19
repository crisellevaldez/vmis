<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Residents
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-xl sm:rounded-lg overflow-x-auto">
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
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6">
                                    <input type="text" v-model="residents[index].first_name" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none " readonly>
                                </td>
                                <td class="py-3 px-6">
                                    <input type="text" v-model="residents[index].last_name" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none " readonly>
                                </td>
                                <td class="py-3 px-6">
                                    <input type="text" v-model="residents[index].middle_name" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none " readonly>
                                </td>
                                <td class="py-3 px-6">
                                    <input type="date" v-model="residents[index].birth_date" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none " readonly>
                                </td>
                                <td class="py-3 px-6">
                                    <input type="text" v-model="residents[index].contact_no" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none " readonly>
                                </td>
                                <td class="py-3 px-6">
                                    <input type="text" v-model="residents[index].occupation" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none " readonly>
                                </td>
                                <td class="py-3 px-6">
                                    <input type="text" v-model="residents[index].pwd" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none " readonly>
                                </td>
                                <td class="py-3 px-6">
                                    <input type="text" v-model="residents[index].ethnicity" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none" readonly>
                                </td>
                                <td class="py-3 px-6">
                                    <input type="text" v-model="residents[index].religion" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none " readonly>
                                </td>
                                <td class="py-3 px-6">
                                    <input type="text" v-model="residents[index].school" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none " readonly>
                                </td>
                                
                            </tr>   
                                    
                        </tbody>
                    </table>
                </div>
                <inertia-link :href="route('census')">
                    <jet-application-mark class="block h-9 w-auto" />
                    Add New
                </inertia-link>
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

                house: {
                    house_number: '',
                    street: '',
                    sitio: ''
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
