<template>
<app-layout>
    <template #header>
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add New</h2>
            <div class="text-right">
                <a :href="route('tool.cm')" class="bg-red-500 text-white rounded py-2 px-3">Back</a>
            </div>
        </div>
    </template>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg min-h-screen p-6">
                <div class="text-center">
                    <p class="text-gray-400 dark:text-gray-400 text-md">Fill up the form below to add new.
                    </p>
                </div>
                <hr class="mb-6 w-full">
                <div class="mb-6 w-full">
                    <label for="name" class="block mb-2 text-lg text-gray-600 dark:text-gray-400">
                        Name</label>
                    <input type="text" v-model="formTool.name" name="name" id="name" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-lighter rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                </div>
                <div class="mb-6 w-full">
                    <label for="name" class="block mb-2 text-lg text-gray-600 dark:text-gray-400">Content</label>
                    <textarea name="" id="" cols="30" rows="10" v-model="formTool.content" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-lighter rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500"></textarea>
                </div>
                <div class="flex">
                    <button v-on:click="reset" class="shadow-md rounded-lg w-2/5 py-3 px-5 mx-1 text-center text-lg font-bold">Reset</button>
                    <button v-on:click="destroy" class="bg-red-500 text-white shadow-md rounded-lg w-2/5 py-3 px-5 mx-1 text-center text-lg font-bold">Delete</button>

                    <button v-on:click="saveTool()" class="bg-green-500 text-white shadow-md rounded-lg w-3/5 py-3 px-5 mx-1 text-center text-lg font-bold">
                        Save
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
            formTool: {
                id: this.dataedit.id,
                name: this.dataedit.name,
                content: this.dataedit.content,
            }
        }
    },
    components: {
        AppLayout,
    },
    props:['dataedit'],
    methods: {
        saveTool() {
            axios.post(route('tool.cm.update'), this.formTool)
                .then(response => {
                    console.log(response.data)
                    this.reset()
                    window.location.href = route('tool.cm')
                }).catch(error => {
                    console.log(error)
                    alert('gagal menyimpan, periksa kembali')
                })
        },
        destroy(){
            axios.post(route('tool.cm.destroy'), this.formTool)
                .then(response => {
                    console.log(response.data)
                    this.reset()
                    window.location.href = route('tool.cm')
                }).catch(error => {
                    console.log(error)
                    alert('gagal menyimpan, periksa kembali')
                })
        },
        reset() {
            this.formTool = {
               name: this.dataedit.name,
                content: this.dataedit.content,
            }

        }
    }
};
</script>
