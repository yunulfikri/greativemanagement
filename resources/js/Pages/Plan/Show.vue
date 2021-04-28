<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Project Plan</h2>
        </template>
        <div class="py-12">
            <div class="max-w-6xl mb-10 mx-auto sm:px-6 lg:px-8" v-bind:class="{ hidden: isHidden }">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3 min-h-screen">
                    <div class="flex justify-end">
                        <button v-on:click="previewHidden" class="mx-2 my-1 p-1 bg-red-500 text-white rounded">Close</button>
                    </div>
                    <h1 class="text-4xl font-bold text-center">{{ preview.name }}</h1>
                    <div class="text-sm text-gray-400 text-center">{{ moment(preview.createdAt).format('LLLL') }}</div>
                    <hr class="mb-10">
                    <div v-html="preview.contents" class="mx-6 my-3"></div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3 min-h-screen">
                    <div class="flex justify-between">
                        <a :href="route('plan.add')"
                            class="px-4 py-2 text-base tracking-wider text-white inline-flex items-center space-x-2 rounded hover:bg-blue-600 mb-5 mt-2 greative-bg-color">
                            <span>
                                Add New Plan
                            </span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current"
                                    viewBox="0 0 24 24">
                                    <path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z" /></svg>
                            </span>
                        </a>


                        <div>
                            <div class="relative text-gray-600 my-2 focus-within:text-gray-400">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                    <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                            class="w-6 h-6">
                                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </button>
                                </span>
                                <input type="search" v-model.lazy="search"
                                    class="py-2 text-sm text-black rounded-md pl-10 focus:outline-none focus:bg-white focus:text-gray-900"
                                    placeholder="Search...">
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            
                            <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="table-auto divide-y divide-gray-200 w-full">
                                        <thead>
                                            <tr class="bg-gray-500">
                                                <th class="px-3 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">No</th>
                                                <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Plan Name</th>
                                                <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">View more</th>
                                                <th class="px-3 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Status</th>
                                                <th class="px-3 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Created At</th>
                                                <th class="px-3 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(data, index) in plan" :key="data.id">
                                                <td class="px-3 py-4 whitespace-nowrap text-center">{{ index+1 }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center">{{ data.name }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center capitalize"><button v-on:click="showPlan(index)" class="p-1 text-sm greative-bg-color text-white rounded">click here</button></td>
                                                <td class="px-3 py-4 whitespace-nowrap text-center capitalize">{{ data.status }}</td>
                                                <td class="px-3 py-4 whitespace-nowrap text-center capitalize">{{ moment(data.created_at).format('LLL') }}</td>
                                                <td class="whitespace-nowrap text-center">
                                                    <!-- <a :href="route('plan.edit', data.id)" class="bg-yellow-400 text-black shadow px-2 py-1 rounded">
                                                        edit
                                                    </a> -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
    import AppLayout from "@/Layouts/AppLayout";
    import moment from 'moment';
    export default {
        data: function () {
            return {
                moment : moment,
                search: '',
                plan: this.data,
                isHidden: true,
                preview:{
                    name: '',
                    contents: '',
                    status: '',
                    createdAt: ''
                }
            }
        },
        props:['data'],
        components: {
            AppLayout,
        },
        watch:{
            search: function(val){
                if (val == '') {
                    this.plan = this.data
                } else {
                    axios.get(route('plan.search', this.search))
                    .then(response => {
                        this.brief = response.data
                    }).catch(error => {
                        console.log(error.message)
                    })
                }
            }
        },
        methods:{
            showPlan(key){
                this.preview.name = this.data[key].name
                this.preview.contents = this.data[key].contents
                this.preview.createdAt = this.data[key].created_at

                this.isHidden = false
                window.scrollTo(0,0);
            },
            previewHidden(){
                this.isHidden = true
            }
        }
    }

</script>
