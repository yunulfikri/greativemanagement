<template>
<app-layout>
    <template #header>
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Product - {{ productdata.name }}</h2>
            <div class="text-right">
                <a :href="route('product')" class="bg-red-500 text-white rounded py-2 px-3">Back</a>
            </div>
        </div>
    </template>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-3 min-h-screen p-6">
                <div class="text-center">
                    <p class="text-gray-400 dark:text-gray-400 text-md">Fill up the form below to add new product.
                    </p>
                </div>
                <hr class="mb-6 max-w-full">
                <div class="mb-6 max-w-full">
                    <label for="name" class="block mb-2 text-lg text-gray-600 dark:text-gray-400">Product
                        Name</label>
                    <input type="text" v-model="formProduct.name" name="name" id="name" placeholder="Yoria Package" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-lighter rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                </div>
                <div class="mb-6 max-w-full">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                        Status
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state" v-model="formProduct.status">
                            <option value="done">Done</option>
                            <option value="pending">Pending</option>
                            <option value="new">New</option>
                            <option value="abort">Abort</option>
                        </select>
                    </div>
                </div>
                <div class="mb-6 max-w-full">
                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-state">
                        Category
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state" v-model="formProduct.category">
                            <option value="presentation">Presentation</option>
                            <option value="social media template">Social Media Template</option>
                            <option value="Template">Template</option>
                            <option value="Font">Font</option>
                            <option value="Mockup">Mockup</option>
                            <option value="Illustration">Illustration</option>
                            <option value="Brochure & Flyer">Brochure & Flyer</option>
                        </select>
                    </div>
                </div>
                <div class="mb-6 max-w-full m-1 p-2 shadow rounded">
                    <p class="text-center">Marketplace</p>
                    <hr class="my-1">
                    <div class="grid grid-cols-4 gap-3">
                        <div class="shadow py-5 px-4 rounded-lg text-gray-700 mb-1">
                            <input type="checkbox" v-model="formProduct.Creativemarket" name="Creativemarket" id="" class="mr-1" true-value="true" false-value="false"> Creative
                            Market
                        </div>
                        <div class="shadow py-5 px-4 rounded-lg text-gray-700 mb-1">
                            <input type="checkbox" v-model="formProduct.Website" name="Website" id="" class="mr-1" true-value="true" false-value="false"> Website
                        </div>
                        <div class="shadow py-5 px-4 rounded-lg text-gray-700 mb-1">
                            <input type="checkbox" name="Element" v-model="formProduct.Element" id="" class="mr-1" true-value="true" false-value="false"> Element
                        </div>
                        <div class="shadow py-5 px-4 rounded-lg text-gray-700 mb-1">
                            <input type="checkbox" name="Canva" v-model="formProduct.Canva" id="" class="mr-1" true-value="true" false-value="false"> Canva
                        </div>
                        <div class="shadow py-5 px-4 rounded-lg text-gray-700 mb-1">
                            <input type="checkbox" name="Etsy" v-model="formProduct.Etsy" id="" class="mr-1" true-value="true" false-value="false"> Etsy
                        </div>
                        <div class="shadow py-5 px-4 rounded-lg text-gray-700 mb-1">
                            <input type="checkbox" name="Design Bundles" v-model="formProduct.DesignBundles" id="" class="mr-1" true-value="true" false-value="false"> Design
                            Bundles
                        </div>
                        <div class="shadow py-5 px-4 rounded-lg text-gray-700 mb-1">
                            <input type="checkbox" name="Crella" v-model="formProduct.Crella" id="" class="mr-1" true-value="true" false-value="false"> Crella
                        </div>
                        <div class="shadow py-5 px-4 rounded-lg text-gray-700 mb-1">
                            <input type="checkbox" name="Template Monster" v-model="formProduct.TemplateMonster" id="" class="mr-1" true-value="true" false-value="false"> Template
                            Monster
                        </div>
                        <div class="shadow py-5 px-4 rounded-lg text-gray-700 mb-1">
                            <input type="checkbox" name="Dafont" v-model="formProduct.Dafont" id="" class="mr-1" true-value="true" false-value="false"> Dafont
                        </div>
                        <div class="shadow py-5 px-4 rounded-lg text-gray-700 mb-1">
                            <input type="checkbox" name="TheHungryJPEG" v-model="formProduct.TheHungryJPEG" id="" class="mr-1" true-value="true" false-value="false">
                            TheHungryJPEG
                        </div>
                        <div class="shadow py-5 px-4 rounded-lg text-gray-700 mb-1">
                            <input type="checkbox" name="FDR" v-model="formProduct.FDR" id="" class="mr-1" true-value="true" false-value="false"> FDR
                        </div>
                    </div>

                </div>
                <div class="flex">
                    <button v-on:click="reset" class="text-gray-500 shadow-md rounded-lg w-2/5 py-3 px-5 mx-1 w-4/5text-center text-lg font-bold">Reset</button>
                    <button v-on:click="destroyProduct" class="bg-red-500 text-white shadow-md rounded-lg w-2/5 py-3 px-5 mx-1 w-4/5text-center text-lg font-bold">Delete</button>
                    <button v-on:click="saveProduct" class="bg-green-500 text-white shadow-md rounded-lg w-3/5 py-3 px-5 mx-1 text-center text-lg font-bold">
                        Save Product
                    </button>
                </div>

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
                id: this.productdata.id,
                name: this.productdata.name,
                status: this.productdata.status,
                category: this.productdata.category,
                Creativemarket: this.productdata.CreativeMarket,
                Website: this.productdata.Website,
                Element: this.productdata.Element,
                Canva: this.productdata.Canva,
                Etsy: this.productdata.Etsy,
                DesignBundles: this.productdata.DesignBundles,
                Crella: this.productdata.Crella,
                TemplateMonster: this.productdata.TemplateMonster,
                Dafont: this.productdata.Dafont,
                TheHungryJPEG: this.productdata.TheHungryJPEG,
                FDR: this.productdata.FDR,
            }
        }
    },
    components: {
        AppLayout,
    },
    props: ['productdata'],
    methods: {
        saveProduct() {
            axios.post(route('product.update'), this.formProduct)
                .then(response => {
                    console.log(response.data)
                    this.reset()
                    window.location.href = route('product')
                }).catch(error => {
                    console.log(error.message)
                    alert('gagal menyimpan, periksa kembali')
                })
        },
        destroyProduct() {
            axios.post(route('product.destroy'), this.formProduct)
                .then(response => {

                    window.location.href = route('product')
                }).catch(error => {
                    console.log(error.message)
                    alert('gagal menyimpan, periksa kembali')
                })
        },
        reset() {
            this.formProduct = {
                name: this.productdata.name,
                status: this.productdata.status,
                category: this.productdata.category,
                Creativemarket: this.productdata.CreativeMarket,
                Website: this.productdata.Website,
                Element: this.productdata.Element,
                Canva: this.productdata.Element,
                Etsy: this.productdata.Etsy,
                DesignBundles: this.productdata.DesignBundles,
                Crella: this.productdata.Crella,
                TemplateMonster: this.productdata.TemplateMonster,
                Dafont: this.productdata.Dafont,
                TheHungryJPEG: this.productdata.TheHungryJPEG,
                FDR: this.productdata.FDR,
            }

        }
    }
};
</script>
