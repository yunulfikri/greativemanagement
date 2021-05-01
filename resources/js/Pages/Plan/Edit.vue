<template>
<app-layout>
    <template #header>
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add New Plan</h2>
            <div class="text-right">
                <a :href="route('plan')" class="bg-red-500 text-white rounded py-2 px-3">Back</a>
            </div>
        </div>
    </template>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg min-h-screen p-6">
                <div class="text-center">
                    <p class="text-gray-400 dark:text-gray-400 text-md">Fill up the form below to add new plan.
                    </p>
                </div>
                <hr class="mb-6 w-full">
                <div class="mb-6 w-full">
                    <label for="name" class="block mb-2 text-lg text-gray-600 dark:text-gray-400">Plan
                        Name</label>
                    <input type="text" v-model="formPlan.name" name="name" id="name" placeholder="Yoria Package" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-lighter rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                </div>
                <div class="mb-6 w-full">
                    <label class="block mb-2 text-lg text-gray-600 dark:text-gray-400">Plan</label>
                    <editor api-key="tj9jpkd39epvoz7kvb24adtie51jqwrgcclz7x5wt10e3nyi" v-model="formPlan.contents" :init="{
                        height: 500,
                        menubar: true,
                        paste_data_images: true,
                        
                        plugins: [
                        'advlist autolink lists link image charmap print preview anchor hr',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount'
                        ],
                        toolbar:
                        'undo redo | formatselect | bold italic backcolor | \
                        alignleft aligncenter alignright alignjustify | \
                        bullist numlist outdent indent | removeformat | help'
                    }" />
                </div>
                <div class="mb-6 w-full">
                    <label for="name" class="block mb-2 text-lg text-gray-600 dark:text-gray-400">Status</label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                id="grid-state" v-model="formPlan.status" required>
                                <option value="new">New</option>
                                <option value="done">Done</option>
                                <option value="pending">Pending</option>
                                <option value="abort">Abort</option>
                            </select>
                        </div>
                </div>
                <div class="flex">
                    <button v-on:click="reset" class="shadow-md rounded-lg w-1/5 py-3 px-5 mx-1 text-center text-lg font-bold">Reset</button>
                    <button v-on:click="destroyPlan" class="bg-red-500 text-white shadow-md rounded-lg w-1/5 py-3 px-5 mx-1 w-4/5text-center text-lg font-bold">Delete</button>
                    <button v-on:click="savePlan()" class="bg-green-500 text-white shadow-md rounded-lg w-3/5 py-3 px-5 mx-1 text-center text-lg font-bold">
                        Save Plan
                    </button>
                </div>

            </div>
        </div>
    </div>

</app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Editor from '@tinymce/tinymce-vue';
export default {
    data() {
        return {
            formPlan: {
                id: this.editadata.id,
                name: this.editadata.name,
                contents: this.editadata.contents,
                status: this.editadata.status,
            }
        }
    },
    components: {
        AppLayout,
        'editor': Editor
    },
    props:['editadata'],
    methods: {
        savePlan() {
            axios.post(route('plan.update'), this.formPlan)
                .then(response => {
                    console.log(response.data)
                    this.reset()
                    window.location.href = route('plan')
                }).catch(error => {
                    console.log(error)
                    alert('gagal menyimpan, periksa kembali')
                })
        },
        destroyPlan(){
            axios.post(route('plan.destroy'), this.formPlan)
                .then(response => {
                    console.log(response.data)
                    this.reset()
                    window.location.href = route('plan')
                }).catch(error => {
                    console.log(error)
                    alert('gagal menghapus, periksa kembali')
                })
        },
        reset() {
            this.formPlan = {
                name: this.editadata.name,
                contents: this.editadata.contents,
                status: this.editadata.status,
            }

        }
    }
};
</script>
