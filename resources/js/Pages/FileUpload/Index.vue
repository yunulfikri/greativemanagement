<template>
<app-layout>
    <template #header>
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add New</h2>
            <div class="text-right">
                <a :href="route('task')" class="bg-red-500 text-white rounded py-2 px-3">Back</a>
            </div>
        </div>
    </template>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg min-h-screen p-6">
                <div class="text-center">
                    <p class="text-gray-400 dark:text-gray-400 text-md">Fill up the form below to upload.
                    </p>
                </div>
                <hr class="mb-6 w-full">

                <form @submit.prevent="submit" enctype="multipart/form-data">
                <div class="mb-6 w-full">
                    <label for="name" class="block mb-2 text-lg text-gray-600 dark:text-gray-400">File
                        Name</label>
                    <input type="text" v-model="form.name" name="name" id="name" placeholder="Opsional" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-lighter rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                </div>
                <div class="mb-6 w-full">
                    <input type="file" name="file" @input="form.filedata = $event.target.files[0]">
                </div>

                <div class="flex">
                    <a :href="route('file.index')" class="bg-red-500 text-white shadow-md rounded-lg w-2/5 py-3 px-5 mx-1 w-4/5text-center text-lg font-bold">Cancel</a>
                    <button type="submit" class="bg-green-500 text-white shadow-md rounded-lg w-3/5 py-3 px-5 mx-1 text-center text-lg font-bold">
                        Save
                    </button>
                </div>
                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                    {{ form.progress.percentage }}%
                </progress>
                </form>


                <div class="flex flex-col mt-10">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            
                            <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="table-auto divide-y divide-gray-200 w-full">
                                        <thead>
                                            <tr class="bg-gray-500">
                                                <th class="px-3 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">No</th>
                                                <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Name</th>
                                                <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Download</th>
                                                <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Uploader</th>
                                                <th class="px-3 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Updated At</th>
                                                <th class="px-3 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(data, index) in files" :key="data.id">
                                                <td class="px-3 py-4 whitespace-nowrap text-center">{{ index+1 }}</td>
                                                <td class="px-6 py-4 text-center">{{ data.name }}</td>
                                                <td class="px-6 py-4 capitalize max-w-xs"><a :href="route('file.download', data.id)" target="_blank" rel="noopener noreferrer">Download</a></td>
                                                <td class="px-6 py-4 text-center">{{ data.uploader }}</td>
                                                <td class="px-3 py-4 whitespace-nowrap text-center capitalize">{{ moment(data.updated_at).format('LLL') }}</td>
                                                <td class="whitespace-nowrap text-center">
                                                    <a :href="route('file.destroy', data.id)" class="bg-red-500 text-white shadow px-2 py-1 rounded">
                                                        Delete
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

export default {
    data() {
        return {
            form: this.$inertia.form({
                name: '',
                filedata: null,
            }),
            moment : moment,
        }
    },
    components: {
        AppLayout
    },
    props: ['files'],
    methods: {
        submit() {
            this.form.post('/file/upload')
        },
        reset() {
            this.formUpload = {
                name: '',
                content: '',
            }

        }
    }
};
</script>
