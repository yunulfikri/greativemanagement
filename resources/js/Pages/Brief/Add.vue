<template>
    <app-layout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add Project Brief</h2>
                <div class="text-right">
                    <a :href="route('brief')" class="bg-red-500 text-white rounded py-2 px-3">Back</a>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg min-h-screen p-6">
                    <div class="text-center">
                        <p class="text-gray-400 dark:text-gray-400 text-md">Fill up the form below to add new project brief.
                        </p>
                    </div>
                    <hr class="mb-6 w-full">
                    <div class="mb-6 w-full">
                        <label for="name" class="block mb-2 text-lg text-gray-600 dark:text-gray-400">Project Name</label>
                        <input type="text" v-model="formBrief.name" name="name" id="name" placeholder="Yoria Package"
                            required
                            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-lighter rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                    </div>
                    <div class="mb-6 w-full">
                        <label for="name" class="block mb-2 text-lg text-gray-600 dark:text-gray-400">Member</label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                id="grid-state" v-model="formBrief.user_id">
                                <template v-for="(data, index) in member" :key="data.id">
                                    <option :value="data.id" >{{ index+1 }} - {{ data.name }}</option>
                                </template>
                            </select>
                        </div>
                    </div>
                    <div class="mb-6 w-full">
                        <label for="name" class="block mb-2 text-lg text-gray-600 dark:text-gray-400">Reference</label>
                        <input type="text" v-model="formBrief.ref" placeholder="https://"
                            required
                            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-lighter rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                    </div>
                    <div class="mb-6 w-full">
                        <label for="name" class="block mb-2 text-lg text-gray-600 dark:text-gray-400">List</label>
                        <input type="text" v-model="formBrief.list" placeholder="https://"
                            required
                            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-lighter rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                    </div>
                    <div class="mb-6 w-full">
                        <label for="name" class="block mb-2 text-lg text-gray-600 dark:text-gray-400">Quantity</label>
                        <input type="text" v-model="formBrief.quantity" placeholder="https://"
                            required
                            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-lighter rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                    </div>
                    <div class="mb-6 w-full">
                        <label for="name" class="block mb-2 text-lg text-gray-600 dark:text-gray-400">Status</label>
                        <div class="relative">
                            <select
                                class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded"
                                id="grid-state" v-model="formBrief.status" required>
                                <option value="done">Done</option>
                                <option value="pending">Pending</option>
                                <option value="new">New</option>
                                <option value="abort">Abort</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex">
                        <button v-on:click="reset" class="bg-red-500 text-white shadow-md rounded-lg w-2/5 py-3 px-5 mx-1 w-4/5text-center text-lg font-bold">Reset</button>
                        <button v-on:click="saveBrief()"
                        class="bg-green-500 text-white shadow-md rounded-lg w-3/5 py-3 px-5 mx-1 text-center text-lg font-bold">
                        Save Brief
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
                formBrief: {
                    name: '',
                    user_id: null,
                    ref: '',
                    list: '',
                    quantity: '',
                    status: ''
                }
            }
        },
        components: {
            AppLayout,
        },
        props:['member'],
        methods: {
            saveBrief() {
                console.log(this.formBrief)
                axios.post(route('brief.store'), this.formBrief)
                    .then(response => {
                        console.log(response.data)
                        this.reset()
                        window.location.href = route('brief')
                    }).catch(error => {
                        console.log(error)
                        alert('gagal menyimpan, periksa kembali')
                    })
            },
            reset(){
                this.formBrief= {
                    name: '',
                    user_id: '',
                    ref: '',
                    list: '',
                    quantity: '',
                    status: ''
                }

            }
        }
    };
</script>