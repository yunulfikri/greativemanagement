<template>
    <app-layout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Update Product Guide</h2>
                <div class="text-right">
                    <a :href="route('guide')" class="bg-red-500 text-white rounded py-2 px-3">Back</a>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg min-h-screen p-6">
                    <div class="text-center">
                        <p class="text-gray-400 dark:text-gray-400 text-md">Fill up the form below to update product guide.
                        </p>
                    </div>
                    <hr class="mb-6 w-full">
                    <div class="mb-6 w-full">
                        <label for="name" class="block mb-2 text-lg text-gray-600 dark:text-gray-400">Guide
                            Name</label>
                        <input type="text" v-model="formGuide.name" name="name" id="name" placeholder="Yoria Package"
                            required
                            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-lighter rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                    </div>
                    <div class="mb-6 w-full">
                        <label class="block mb-2 text-lg text-gray-600 dark:text-gray-400">Guide
                            Description</label>
                        <textarea placeholder="explain your guide here" v-model="formGuide.description" class="w-full h-40 px-3 py-2 placeholder-gray-300 border border-gray-lighter rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"></textarea>
                    </div>
                    <div class="mb-6 w-full">
                        <label class="block mb-2 text-lg text-gray-600 dark:text-gray-400">Tag</label>
                        <textarea placeholder="Illustration, Power Point and more" v-model="formGuide.tag" class="w-full h-28 px-3 py-2 placeholder-gray-300 border border-gray-lighter rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"></textarea>
                    </div>
                    <div class="mb-6 w-full">
                        <label for="name" class="block mb-2 text-lg text-gray-600 dark:text-gray-400">Link</label>
                        <input type="text" v-model="formGuide.link" placeholder="https://"
                            required
                            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-lighter rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                    </div>
                    <div class="flex">
                        <button v-on:click="reset" class="text-gray-500 shadow-md rounded-lg w-2/5 py-3 px-5 mx-1 w-4/5text-center text-lg font-bold">Reset</button>
                        <button v-on:click="destroyGuide" class="bg-red-500 text-white shadow-md rounded-lg w-2/5 py-3 px-5 mx-1 w-4/5text-center text-lg font-bold">Delete</button>
                        <button v-on:click="saveGuide"
                        class="bg-green-500 text-white shadow-md rounded-lg w-3/5 py-3 px-5 mx-1 text-center text-lg font-bold">
                        Save Guide
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
                formGuide: {
                    id: this.editdata.id,
                    name: this.editdata.name,
                    description: this.editdata.description,
                    link: this.editdata.link,
                    tag: this.editdata.tag,
                }
            }
        },
        components: {
            AppLayout,
        },
        props:['editdata'],
        methods: {
            saveGuide() {
                axios.post(route('guide.update'), this.formGuide)
                    .then(response => {
                        console.log(response.data)
                        this.reset()
                        window.location.href = route('guide')
                    }).catch(error => {
                        console.log(error)
                        alert('gagal menyimpan, periksa kembali')
                    })
            },
            destroyGuide(){
                axios.post(route('guide.destroy'), this.formGuide)
                    .then(response => {
                        window.location.href = route('guide')
                    }).catch(error => {
                        console.log(error)
                        alert('gagal menghapus, periksa kembali')
                    })
            },
            reset(){
                this.formGuide= {
                    name: this.editdata.name,
                    description: this.editdata.description,
                    link: this.editdata.link,
                    tag: this.editdata.tag,
                }

            }
        }
    };
</script>