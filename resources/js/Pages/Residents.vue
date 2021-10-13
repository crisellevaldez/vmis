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
                        <div v-for="(house,index) in house_info" :key="index" class="grid grid-cols-4 gap-2 p-2 rounded">
                            <p class="inline mb-0 mt-3"> House Number: </p>
                            <p class="inline mb-0 mt-3"> Street: </p>
                            <p class="inline mb-0 mt-3"> Sitio: </p>
                            <p class="inline mb-0 mt-3"> Number of Family: </p>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                        <div v-for="(house,index) in house_info" :key="index" class="grid grid-cols-4 gap-2 p-2 rounded">
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

                            <div class="flex border rounded bg-gray-300 items-center p-2 ">
                                <input type="text" placeholder="Sitio" v-model="fam.length"
                                    class="bg-gray-300 w-full focus:outline-none outline-none border-none text-gray-700" readonly/>
                            </div>
                        </div>
                    </div>
                    

                    <div class="bg-white shadow-md rounded my-6 overflow-x-auto">
                        <button class="btn btn-primary float-right mr-2 mb-2" v-on:click="addRow()"> Add Row </button>
                        <table class="w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left"></th>
                                    <th class="py-3 px-6 text-left"></th>
                                    <th class="py-3 px-6 text-left"></th>
                                    <th class="py-3 px-6 text-left">Fam No.</th>
                                    <th class="py-3 px-6 text-left">First Name</th>
                                    <th class="py-3 px-6 text-left">Last Name</th>
                                    <th class="py-3 px-6 text-center">Middle Name</th>
                                    <th class="py-3 px-6 text-center">Birth date</th>
                                    <th class="py-3 px-6 text-center">Age</th>
                                    <th class="py-3 px-6 text-center">Contact No.</th>
                                    <th class="py-3 px-6 text-center">Occupation</th>
                                    <th class="py-3 px-6 text-center">PWD</th>
                                    <th class="py-3 px-6 text-center">Ethnicity</th>
                                    <th class="py-3 px-6 text-center">Religion</th>
                                    <th class="py-3 px-6 text-center">School</th>
                                    </tr>
                            </thead>
                            <tbody v-for="(resident,index) in residents" :key="index" class="text-gray-600 text-sm font-light" id="resident-body">
                                <tr class="border-b border-gray-200" :class="{'bg-yellow-100': residents[index].family_no === 1,  'bg-green-100': residents[index].family_no === 2, 'bg-blue-100': residents[index].family_no === 3, 'bg-purple-100': residents[index].family_no === 4, 'bg-pink-100': residents[index].family_no === 5}">
                                    <td v-if="(residents[index].id)" class="py-3 px-6 pr-0">
                                        <inertia-link :href="route('profile', { id: residents[index].id })">
                                            <jet-application-mark class="block w-auto" />
                                            <div class="w-4 mx-auto transform hover:text-purple-500 hover:scale-110 ">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </div>
                                        </inertia-link>     
                                    </td>

                                    <td v-if="(!residents[index].id)" v-on:click="addResident(residents[index])" class="py-3 px-6 pr-0 cursor-pointer">
                                       
                                        <div class="w-4 mx-auto transform hover:text-purple-500 hover:scale-110 ">
                                            <span class="material-icons-outlined text-base">
                                            add_circle_outline
                                            </span>
                                        </div>   
                                    </td>

                                    <td class="py-3 px-6 pr-0 cursor-pointer" v-on:click="updateResident(residents[index])">
                                        <div class="w-4 m-0 transform hover:text-purple-500 hover:scale-110 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div> 
                                    </td>

                                    <td v-if="(residents[index].id)" class="py-3 px-6 pr-0 cursor-pointer" v-on:click="deleteResident(residents[index])">
                                        <div class="w-4 m-0 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </td>

                                    <td v-if="(!residents[index].id)" class="py-3 px-6 pr-0">
                                        <div class="w-4 m-0 transform hover:text-purple-500 hover:scale-110" v-on:click="removeRow(index)">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div>
                                    </td>

                                    <td class="py-3 px-6">
                                        <select v-model="residents[index].family_no" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none ">
                                            <option value="1">1</option>
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
                                        <input type="date" v-model="residents[index].birth_date" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none ">
                                    </td>
                                    <td class="py-3 px-6">
                                        <input type="text" v-if="(residents[index].id)" :value="getAge(residents[index].birth_date)" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none " readonly>
                                        <input type="text" v-if="(!residents[index].id)" class="bg-grey-lighter text-grey-darker py-2 font-normal rounded text-grey-darkest border border-grey-lighter rounded-l-none ">
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

                        <div v-if="errors" class="pt-2 pb-2 bg-red-500 text-white py-2 px-4 pr-0 rounded font-bold mb-4 shadow-lg">
                            <div v-for="(v, k) in errors" :key="k" class="p-0 m-0">
                                <p v-for="error in v" :key="error" class="text-sm p-1 m-0 ">
                                {{ error }}
                                </p>
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
                residents: [],
                resident: {
                    first_name: '',
                    last_name: '',
                    middle_name: '',
                    birth_date: '',
                    address: '',
                    birthdate: ''
                },
                residentNo: null,
                fam: null,
                house_info: [],
                errors: null,
            }
        },

        methods: {

            addRow(){
                this.residents.push({
                        first_name: '',
                        last_name: '',
                        middle_name: '',
                        birth_date: '',
                        contact_no: '',
                        occupation: '',
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

            addResident(residentInfo){
                axios.post('/api/add-resident',{
                    'resident': residentInfo,
                    'house_info': this.house_info
                })
                .then((response) => {

                    Toast.fire({
                        icon:'success',
                        title: 'Resident Successfully added.'
                    });
                    
                   setTimeout(() =>  window.location.reload(), 500);

                    
                }, (error) => {
                    this.errors = error.response.data.errors;
                });
                
            },

            updateResident(residentInfo){
                console.log(residentInfo);
            },

            deleteResident(residentInfo){
                console.log(residentInfo);
            },

            getResident(){
                const url = window.location.href;
                const lastParam = url.split("/").slice(-1)[0];

                axios.get('/api/resident-house/'+lastParam)
                .then((res) => {
                    this.residents = res.data.residents;
                    this.house_info = res.data.house_info;
                    this.fam = res.data.fam_info;
                    this.residentNo = this.residents.length;
                }).catch((err) => {
                    console.log(err);
                });
            },

            getAge(dateString){
                var today = new Date();
                var birthDate = new Date(dateString);
                var age = today.getFullYear() - birthDate.getFullYear();
                var m = today.getMonth() - birthDate.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
                {
                    age--;
                }
                return age;
            }
        },

        created(){
            this.getResident();
            
        }
    }
</script>
