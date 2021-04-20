<template>
    <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="table-auto divide-y divide-gray-200 w-full">
                <thead>
                    <tr class="bg-gray-500 text-white">
                        <th class="px-3 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Full Name</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Member of</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(data, index) in member" :key="data.id">
                        <td class="text-center">{{ index+1 }}</td>
                        <td class="text-center">{{ data.name }}</td>
                        <td class="text-center">{{ data.email }}</td>
                        <td class="text-center">{{ data.teamname }}</td>
                        <td class="text-center"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{

        }
    },
    props:['member'],
    methods:{

    }
}
</script>