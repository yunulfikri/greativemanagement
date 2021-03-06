<template>
<app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Product Marketplace</h2>
    </template>
    <loading v-model:active="isLoading"
                 :can-cancel="false"
                 :is-full-page="fullPage"/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3 min-h-screen">
                <template v-if="$page.props.user.role == 'admin'">
                    <a :href="route('product.add')" class="greative-bg-color px-4 py-2 text-base tracking-wider text-white inline-flex items-center space-x-2 rounded hover:bg-blue-600 mb-5 mt-2">
                        <span>
                            Add New Product
                        </span>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                <path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z" /></svg>
                        </span>
                    </a>
                </template>
                <div class="flex justify-end my-2">
                    <div class="mr-3">
                        <select
                            class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-2 px-4 pr-8 rounded"
                            id="grid-state" v-model.lazy="category">
                            <option value="all">All</option>
                            <option value="Presentation">Presentation</option>
                            <option value="Social Media Template">Social Media Template</option>
                            <option value="Template">Template</option>
                            <option value="Font">Font</option>
                            <option value="Mockup">Mockup</option>
                            <option value="Illustration">Illustration</option>
                            <option value="Brochure & Flyer">Brochure & Flyer</option>
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
                                            <th class="px-3 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                                No</th>
                                            <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                                Name</th>
                                            <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                                Category</th>
                                            <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                                Status</th>
                                            <th colspan="6" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                                                Marketplace</th>
                                            <th class="px-6 py-3 text-center text-xs font-medium text-white bg-blue-400 uppercase tracking-wider">
                                                Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-for="(data, index) in products.data" :key="data.id">
                                            <tr>
                                                <td rowspan="4" class="py-4 whitespace-nowrap text-center border-b-2 border-gray-300">{{ index+1 }}</td>
                                                <td rowspan="4" class="px-6 py-4 whitespace-normal text-center border-b-2 border-gray-300">{{ data.name }} </td>
                                                <td rowspan="4" class="px-6 py-4 whitespace-normal text-center border-b-2 border-gray-300 capitalize">{{ data.category }}</td>
                                                <td rowspan="4" class="px-6 py-4 whitespace-nowrap text-center border-b-2 border-gray-300 capitalize">
                                                    <template v-if="data.status == 'abort'">
                                                        <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white bg-red-700 rounded">Abort</span>
                                                    </template>
                                                    <template v-else-if="data.status == 'pending'">
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
                                                <td class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Creative Market</td>
                                                <td class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Website</td>
                                                <td class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Element</td>
                                                <td class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Canva</td>
                                                <td class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Etsy</td>
                                                <td class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider bg-gray-50">Design Bundles</td>
                                                <td rowspan="4" class="px-6 py-4 whitespace-nowrap text-center border-b-2 border-gray-300">
                                                    <template v-if="$page.props.user.role == 'admin'">
                                                        <a :href="route('product.edit', data.id)" class="text-center">
                                                            <img height="20" width="20" :src="'img/settings.png'" alt="" srcset="">
                                                        </a>
                                                    </template>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    <div>
                                                        <input type="checkbox" name="CreativeMarket" :checked="data.CreativeMarket == 'true'" v-on:change="quickupdate($event,data.id)">
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    <div>
                                                        <input type="checkbox" name="Website" :checked="data.Website == 'true'" v-on:change="quickupdate($event,data.id)">
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    <div>
                                                        <input type="checkbox" name="Element" :checked="data.Element == 'true'" v-on:change="quickupdate($event,data.id)">
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    <div>
                                                        <input type="checkbox" name="Canva" :checked="data.Canva == 'true'" v-on:change="quickupdate($event,data.id)">
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    <div>
                                                        <input type="checkbox" name="Etsy" :checked="data.Etsy == 'true'" v-on:change="quickupdate($event,data.id)">
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                                    <div>
                                                        <input type="checkbox" name="DesignBundles" :checked="data.DesignBundles == 'true'" v-on:change="quickupdate($event,data.id)">
                                                    </div>
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
                                                    <div>
                                                        <input type="checkbox" name="Crella" :checked="data.Crella == 'true'" v-on:change="quickupdate($event,data.id)">
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center  border-b-2 border-gray-300">
                                                    <div>
                                                        <input type="checkbox" name="TemplateMonster" :checked="data.TemplateMonster == 'true'" v-on:change="quickupdate($event,data.id)">
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center  border-b-2 border-gray-300">
                                                    <div>
                                                        <input type="checkbox" name="Dafont" :checked="data.Dafont == 'true'" v-on:change="quickupdate($event,data.id)">
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center  border-b-2 border-gray-300">
                                                    <div>
                                                        <input type="checkbox" name="TheHungryJPEG" :checked="data.TheHungryJPEG == 'true'" v-on:change="quickupdate($event,data.id)">
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center  border-b-2 border-gray-300">
                                                    <div>
                                                        <input type="checkbox" name="FDR" :checked="data.FDR == 'true'" v-on:change="quickupdate($event,data.id)">
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-center  border-b-2 border-gray-300"></td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>

                                <pagination class="mt-6 mb-3 mr-3 float-right" :links="products.links" />
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
import Pagination from '@/Components/Pagination';
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';
export default {
    data: function () {
        return {
            isLoading: false,
            fullPage: true,
            search: '',
            category: 'all',
            products: this.data
        }
    },
    components: {
        AppLayout,
        Pagination,
        Loading
    },
    props: ['data'],
    methods:{
        quickupdate(event,id){
            this.isLoading = true
            axios.post(route('product.quickupdate'),{
                'id':id,
                'market': event.target.name,
                'value': event.target.checked ? 'true':'false'
            }).then(response => {
                if (response.data == 'sukses') {
                    this.isLoading = false   
                }
            }).catch(error => {
                alert(error.message)
            })
        }
    },
    watch: {
        search: function (val) {
            // console.log(val)
            if (val == '') {
                this.products = this.data
            } else {
                this.isLoading = true
                axios.get(route('product.search', this.search))
                    .then(response => {
                        // console.log(response.data)
                        this.products = response.data
                        this.isLoading = false
                    }).catch(error => {
                        console.log(error.message)

                    })
            }

        },
        category: function (val) {
            // console.log(val)
            if (val == 'all') {
                this.products = this.data
            } else {
                axios.get(route('product.search.category', this.category))
                    .then(response => {
                        // console.log(response.data)
                        this.products = response.data
                    }).catch(error => {
                        console.log(error.message)

                    })
            }

        }
    }
};
</script>
