<template>
<app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Freepik</h2>
    </template>
    <loading v-model:active="isLoading"
                 :can-cancel="false"
                 :is-full-page="fullPage"/>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3 min-h-screen">
                <template v-if="$page.props.user.role == 'admin'">
                    <a :href="route('task.add')" class="px-4 py-2 text-base tracking-wider text-white inline-flex items-center space-x-2 rounded hover:bg-blue-600 mb-5 mt-2 greative-bg-color">
                        <span>
                            Add New Freepik Task
                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z" /></svg>
                        </span>
                    </a>
                </template>
                <a :href="route('file.upload')" class="px-4 py-2 text-base tracking-wider text-white inline-flex items-center space-x-2 rounded hover:bg-blue-600 mb-5 mt-2 mx-5 greative-bg-color">Upload File</a>
                <div class="flex justify-end my-2">
                    <div class="mr-3">
                        <select
                            class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-1.5 px-4 pr-8 rounded"
                            id="grid-state" v-model.lazy="status">
                            <option value="new">New</option>
                            <option value="done">Done</option>
                            <option value="all">All</option>
                            
                        </select>
                    </div>
                    <div>
                        <div class="relative text-gray-600 focus-within:text-gray-400">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </button>
                            </span>
                            <input type="search" v-model.lazy="search" class="py-2 text-sm text-black rounded-md pl-10 focus:outline-none focus:bg-white focus:text-gray-900" placeholder="Search...">
                        </div>
                    </div>
                </div>

                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="table-auto divide-y divide-gray-200 w-full">
                                    <thead>
                                        <tr class="bg-gray-500">
                                            <th class="px-3 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">No</th>
                                            <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Project Name</th>
                                            <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Quantity</th>
                                            <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Reference</th>
                                            <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Deadline</th>
                                            <th class="px-3 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Member</th>
                                            <th class="px-3 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Status</th>
                                            <template v-if="$page.props.user.role == 'admin'">
                                            <th class="px-3 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Update Status</th>
                                            </template>
                                            <template v-if="$page.props.user.role == 'admin'">
                                                <th class="px-3 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Edit</th>
                                            </template>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template  v-for="(data, index) in task" :key="data.id">
                                        <tr>
                                            <td class="px-3 py-4 whitespace-nowrap text-center">{{ index+1 }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">{{ data.name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">{{ data.quantity }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center"><a :href="data.ref" target="_blank" rel="noopener noreferrer" class="text-blue-600 underline">Click Here</a></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center capitalize">{{ data.deadline }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center capitalize">{{ data.membername }}</td>
                                            <td class="px-3 py-4 whitespace-nowrap text-center capitalize">
                                                <template v-if="data.status == 'abort'">
                                                    <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-700 rounded">Abort</span>
                                                </template>
                                                <template v-else-if="data.status == 'revision'">
                                                    <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-yellow-500 rounded">{{ data.status }}</span>
                                                </template>
                                                <template v-else-if="data.status == 'done'">
                                                    <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-green-500 rounded">{{ data.status }}</span>
                                                </template>
                                                <template v-else-if="data.status == 'new'">
                                                    <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-blue-500 rounded">{{ data.status }}</span>
                                                </template>
                                                <template v-else>{{ data.status }}</template>
                                            </td>
                                            <template v-if="$page.props.user.role == 'admin'">
                                            <td class="px-3 py-4 whitespace-nowrap text-center capitalize">
                                                <template v-if="data.status == 'new'">
                                                    <span class="inline-flex items-center justify-center text-xs font-bold leading-none ">
                                                        <button class="border-none text-white bg-yellow-600 px-2 py-1 rounded" v-on:click="statusUpdateDone(data.id)">update</button>
                                                    </span>
                                                </template>
                                            </td>
                                            </template>
                                            <td class="whitespace-nowrap text-center">
                                                <template v-if="$page.props.user.role == 'admin'">
                                                    <a :href="route('task.edit', data.id)" class="bg-yellow-400 text-black shadow px-2 py-1 rounded">
                                                        edit
                                                    </a>
                                                </template>
                                            </td>
                                        </tr>
                                        </template>
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
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
export default {
    data: function () {
        return {
            search: '',
            task: this.data,
            status: 'all',
            isLoading: false,
        }
    },
    props: ['data'],
    components: {
        AppLayout,
        Loading
    },

    watch: {
        search: function (val) {
            if (val == '') {
                this.task = this.data
            } else {
                axios.get(route('task.search', this.search))
                    .then(response => {
                        this.task = response.data
                    }).catch(error => {
                        console.log(error.message)
                    })
            }
        },
        status: function (val) {
            // console.log(val)
            if (val == 'all') {
                this.task = this.data
            } else {
                axios.get(route('task.search.category', this.status))
                    .then(response => {
                        console.log(response.data)
                        this.task = response.data
                    }).catch(error => {
                        console.log(error.message)

                    })
            }

        }
    },
    methods:{
        statusUpdateDone(id){
            this.isLoading = true
            axios.post(route('task.quickupdate', {
                'id': id
            })).then(response => {
                this.isLoading = false
                this.task = response.data
                
            }).catch(error => {
                console.log(error.message)
                alert(error.message)
            })
        }
    }
}
</script>
