<template>
    <app-layout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Product Marketplace</h2>
                <div class="text-right">
                    <a :href="route('product')" class="bg-red-500 text-white rounded py-2 px-3">Back</a>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3 min-h-screen p-6">
                    <div class="text-center">
                        <p class="text-gray-400 dark:text-gray-400 text-md">Fill up the form below to add new product.
                        </p>
                    </div>
                    <hr class="mb-6 max-w-md">
                    <div class="mb-6 max-w-md">
                        <label for="name" class="block mb-2 text-lg text-gray-600 dark:text-gray-400">Product
                            Name</label>
                        <input type="text" v-model="formProduct.name" name="name" id="name" placeholder="Yoria Package"
                            required
                            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-lighter rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                    </div>
                    <div class="mb-6 max-w-md">
                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                            for="grid-state">
                            Status
                        </label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                id="grid-state" v-model="formProduct.status">
                                <option value="done">Done</option>
                                <option value="pending">Pending</option>
                                <option value="new">New</option>
                                <option value="abort">Abort</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-6 max-w-md m-1 p-2 shadow rounded">
                        <p class="text-center">Marketplace</p>
                        <hr class="my-1">
                        <div class="shadow py-1 px-3 rounded-lg text-gray-700 mb-2">
                            <input type="checkbox" v-model="formProduct.Creativemarket" name="Creativemarket" id=""
                                class="appearance-none checked:bg-green-500 checked:border-transparent mr-1"> Creative
                            Market
                        </div>
                        <div class="shadow py-1 px-3 rounded-lg text-gray-700 mb-2">
                            <input type="checkbox" v-model="formProduct.Website" name="Website" id=""
                                class="appearance-none checked:bg-green-500 checked:border-transparent mr-1"> Website
                        </div>
                        <div class="shadow py-1 px-3 rounded-lg text-gray-700 mb-2">
                            <input type="checkbox" name="Element" v-model="formProduct.Element" id=""
                                class="appearance-none checked:bg-green-500 checked:border-transparent mr-1"> Element
                        </div>
                        <div class="shadow py-1 px-3 rounded-lg text-gray-700 mb-2">
                            <input type="checkbox" name="Canva" v-model="formProduct.Canva" id=""
                                class="appearance-none checked:bg-green-500 checked:border-transparent mr-1"> Canva
                        </div>
                        <div class="shadow py-1 px-3 rounded-lg text-gray-700 mb-2">
                            <input type="checkbox" name="Etsy" v-model="formProduct.Etsy" id=""
                                class="appearance-none checked:bg-green-500 checked:border-transparent mr-1"> Etsy
                        </div>
                        <div class="shadow py-1 px-3 rounded-lg text-gray-700 mb-2">
                            <input type="checkbox" name="Design Bundles" v-model="formProduct.DesignBundles" id=""
                                class="appearance-none checked:bg-green-500 checked:border-transparent mr-1"> Design
                            Bundles
                        </div>
                        <div class="shadow py-1 px-3 rounded-lg text-gray-700 mb-2">
                            <input type="checkbox" name="Crella" v-model="formProduct.Crella" id=""
                                class="appearance-none checked:bg-green-500 checked:border-transparent mr-1"> Crella
                        </div>
                        <div class="shadow py-1 px-3 rounded-lg text-gray-700 mb-2">
                            <input type="checkbox" name="Template Monster" v-model="formProduct.TemplateMonster" id=""
                                class="appearance-none checked:bg-green-500 checked:border-transparent mr-1"> Template
                            Monster
                        </div>
                        <div class="shadow py-1 px-3 rounded-lg text-gray-700 mb-2">
                            <input type="checkbox" name="Dafont" v-model="formProduct.Dafont" id=""
                                class="appearance-none checked:bg-green-500 checked:border-transparent mr-1"> Dafont
                        </div>
                        <div class="shadow py-1 px-3 rounded-lg text-gray-700 mb-2">
                            <input type="checkbox" name="TheHungryJPEG" v-model="formProduct.TheHungryJPEG" id=""
                                class="appearance-none checked:bg-green-500 checked:border-transparent mr-1">
                            TheHungryJPEG
                        </div>
                        <div class="shadow py-1 px-3 rounded-lg text-gray-700 mb-2">
                            <input type="checkbox" name="FDR" v-model="formProduct.FDR" id=""
                                class="appearance-none checked:bg-green-500 checked:border-transparent mr-1"> FDR
                        </div>
                    </div>
                    <button v-on:click="saveProduct()"
                        class="bg-green-500 text-white shadow-md rounded-lg w-full py-3 px-5 text-center text-lg font-bold">
                        Save Product
                    </button>
                </div>
            </div>
        </div>

    </app-layout>
</template>
<script>
    import AppLayout from "@/Layouts/AppLayout";
    export default {
        data() {
            return {
                formProduct: {
                    name: '',
                    status: 'new',
                    Creativemarket: false,
                    Website: false,
                    Element: false,
                    Canva: false,
                    Etsy: false,
                    DesignBundles: false,
                    Crella: false,
                    TemplateMonster: false,
                    Dafont: false,
                    TheHungryJPEG: false,
                    FDR: false,
                }
            }
        },
        components: {
            AppLayout,
        },
        methods: {
            saveProduct() {
                axios.post(route('product.store'), this.formProduct)
                    .then(response => {
                        console.log(response.data)
                        this.reset()
                        window.location.href = route('product')
                    }).catch(error => {
                        console.log(error)
                        alert('gagal menyimpan, periksa kembali')
                    })
            },
            reset(){
                this.formProduct= {
                    name: '',
                    status: 'new',
                    Creativemarket: false,
                    Website: false,
                    Element: false,
                    Canva: false,
                    Etsy: false,
                    DesignBundles: false,
                    Crella: false,
                    TemplateMonster: false,
                    Dafont: false,
                    TheHungryJPEG: false,
                    FDR: false,
                }

            }
        }
    };
</script>