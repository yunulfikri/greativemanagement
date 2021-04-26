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
                        <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Remove Account</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(data, index) in member" :key="data.id">
                        <td class="text-center">{{ index+1 }}</td>
                        <td class="text-center">{{ data.name }}</td>
                        <td class="text-center">{{ data.email }}</td>
                        <td class="text-center">{{ data.teamname }}</td>
                        <td class="text-center">
                            <button v-on:click="destroy(data.id)" class="bg-red-500 text-white shadow-md rounded px-2 py-1 text-sm">Delete</button>
                        </td>
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
        destroy(id){
            var y = confirm('remove this account?')
            if (y == true) {
                axios.post(route('account.destroy'), {
                    'user_id' : id,
                }).then(result => {
                    if (result.data == 'sukses') {
                        window.location.href = route('account')
                    }
                }).catch(err => {
                    console.log(err.message)
                });
            }
        }
    }
}
</script>