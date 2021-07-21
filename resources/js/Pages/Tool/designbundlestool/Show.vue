<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tool - Design Bundles Tag</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3 min-h-screen">
                    <div class="flex justify-between">
                        <a :href="route('tool.designbundles.add')"
                            class="px-4 py-2 text-base tracking-wider text-white inline-flex items-center space-x-2 rounded hover:bg-blue-600 mb-5 mt-2 greative-bg-color">
                            <span>
                                Add New
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
                                                <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Name</th>
                                                <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Content</th>
                                                <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Clipboard</th>
                                                <th class="px-3 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Updated At</th>
                                                <th class="px-3 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(data, index) in tools" :key="data.id">
                                                <td class="px-3 py-4 whitespace-nowrap text-center">{{ index+1 }}</td>
                                                <td class="px-6 py-4 text-center">{{ data.name }}</td>
                                                <td class="px-6 py-4 max-w-xs">{{ data.content }}</td>
                                                <td class="px-6 py-4 text-center">
                                                    <button class="p-1 bg-green-500 text-sm rounded btn" :data-clipboard-text="data.content">Copy</button>
                                                </td>
                                                <td class="px-3 py-4 whitespace-nowrap text-center capitalize">{{ moment(data.updated_at).format('LLL') }}</td>
                                                <td class="whitespace-nowrap text-center">
                                                    <a :href="route('tool.designbundles.edit', data.id)" class="bg-yellow-400 text-black shadow px-2 py-1 rounded">
                                                        edit
                                                    </a>
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
    import ClipboardJS from 'clipboard';

    new ClipboardJS('.btn');
    export default {
        data: function () {
            return {
                moment : moment,
                search: '',
                tools: this.data,
            }
        },
        props:['data'],
        components: {
            AppLayout,
        },
        computed:{
            
        },
        watch:{
            search: function(val){
                if (val == '') {
                    this.tools = this.data
                } else {
                    axios.get(route('tool.designbundles.search', this.search))
                    .then(response => {
                        this.tools = response.data
                    }).catch(error => {
                        console.log(error.message)
                    })
                }
            }
        },
        methods:{
            truncate(value, limit){
                 if (value.length > limit) {
                    value = value.substring(0, (limit - 3)) + '...';
                }
                return value
            }
        }
    }

</script>
