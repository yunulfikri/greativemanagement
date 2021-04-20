<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Product Marketplace</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3 min-h-screen">
                    <div class="flex justify-between">
                        <a :href="route('product.add')"
                            class="bg-blue-500 px-4 py-2 text-base tracking-wider text-white inline-flex items-center space-x-2 rounded hover:bg-blue-600 mb-5 mt-2">
                            <span>
                                Add New Product
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
                                    placeholder="Search..." >
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
                                                <th
                                                    class="px-3 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                                    No</th>
                                                <th
                                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                                    Nama</th>
                                                <th
                                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                                    Status</th>
                                                <th colspan="6"
                                                    class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                                    Marketplace</th>
                                                <th
                                                    class="px-6 py-3 text-center text-xs font-medium text-white bg-blue-400 uppercase tracking-wider">
                                                    Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <template v-for="(data, index) in products" :key="data.id">
                                            <tr>
                                                <td rowspan="4"  class="py-4 whitespace-nowrap text-center border-b-2 border-gray-300">{{ index+1 }}</td>
                                                <td rowspan="4" class="px-6 py-4 whitespace-nowrap text-center border-b-2 border-gray-300">{{ data.name }} </td>
                                                <td rowspan="4" class="px-6 py-4 whitespace-nowrap text-center border-b-2 border-gray-300 capitalize">{{ data.status }}</td>
                                                <td class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Creative Market</td>
                                                <td class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Website</td>
                                                <td class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Element</td>
                                                <td class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Canva</td>
                                                <td class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Etsy</td>
                                                <td class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Design Bundles</td>
                                                <td rowspan="4" class="px-6 py-4 whitespace-nowrap text-center border-b-2 border-gray-300">
                                                    <a href="#" class="text-center">
                                                        <img height="20" width="20" :src="'img/settings.png'" alt="" srcset="">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    <template v-if="data.CreativeMarket == true">
                                                        <input type="checkbox" checked disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                    <template v-else>
                                                        <input type="checkbox" disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    <template v-if="data.Website == true">
                                                        <input type="checkbox" checked disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                    <template v-else>
                                                        <input type="checkbox" disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    <template v-if="data.Element == true">
                                                        <input type="checkbox" checked disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                    <template v-else>
                                                        <input type="checkbox" disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    <template v-if="data.Canva == true">
                                                        <input type="checkbox" checked disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                    <template v-else>
                                                        <input type="checkbox" disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    <template v-if="data.Etsy == true">
                                                        <input type="checkbox" checked disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                    <template v-else>
                                                        <input type="checkbox" disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    <template v-if="data.DesignBundles == true">
                                                        <input type="checkbox" checked disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                    <template v-else>
                                                        <input type="checkbox" disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Crella</td>
                                                <td class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Template Monster</td>
                                                <td class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Dafont</td>
                                                <td class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">TheHungryJPEG</td>
                                                <td class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">FDR</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-center border-b-2 border-gray-300">
                                                    <template v-if="data.Crella == true">
                                                        <input type="checkbox" checked disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                    <template v-else>
                                                        <input type="checkbox" disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center  border-b-2 border-gray-300">
                                                    <template v-if="data.TemplateMonster == true">
                                                        <input type="checkbox" checked disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                    <template v-else>
                                                        <input type="checkbox" disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center  border-b-2 border-gray-300">
                                                    <template v-if="data.Dafont == true">
                                                        <input type="checkbox" checked disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                    <template v-else>
                                                        <input type="checkbox" disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center  border-b-2 border-gray-300">
                                                    <template v-if="data.TheHungryJPEG == true">
                                                        <input type="checkbox" checked disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                    <template v-else>
                                                        <input type="checkbox" disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center  border-b-2 border-gray-300">
                                                    <template v-if="data.FDR == true">
                                                        <input type="checkbox" checked disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                    <template v-else>
                                                        <input type="checkbox" disabled
                                                        class="appearance-none bg-gray-500 checked:border-transparent">
                                                    </template>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center  border-b-2 border-gray-300"></td>
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
    export default {
        data: function (){
            return {
                search: '',
                products: this.data
            }
        },
        components: {
            AppLayout,
        },
        props: ['data'],
        watch:{
            search: function(val){
                console.log(val)
                if (val == '') {
                    this.products = this.data
                } else {
                    axios.get(route('product.search', this.search))
                    .then(response => {
                        console.log(response.data)
                        this.products = response.data
                    }).catch(error => {
                        console.log(error.message)
                        
                    })
                }
                
            }
        }
    };
</script>
