<template>
<!-- <app-layout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Account Member
        </h2>
    </template> -->
<div>
    <div class="max-w-lg mx-auto py-10 sm:px-6 lg:px-8 bg-white shadow-lg mb-5 rounded-lg">
        <div class="text-center mb-8 text-gray-500">
            Fill this form to add new member
            <hr>
        </div>
        <form @submit.prevent="submit">
            <div>
                <jet-label for="name" value="Name" />
                <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <jet-label for="email" value="Email" />
                <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />
            </div>

            <div class="mt-4">
                <jet-label for="password" value="Password" />
                <jet-input id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <jet-label for="password_confirmation" value="Confirm Password" />
                <jet-input id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
            </div>
            <div class="mt-4">
                <jet-label value="Select a team for this account" />
                <jet-label>
                    <div class="flex items-center">
                        <jet-checkbox name="Greative" v-model="form.greative" :value="true" />
                        <div class="ml-2">Greative Team</div>
                    </div>
                </jet-label>
                <jet-label>
                    <div class="flex items-center">
                        <jet-checkbox name="Creavora" v-model="form.creavora" :value="true" />
                        <div class="ml-2">Creavora Team</div>
                    </div>
                </jet-label>
            </div>
            <div class="flex items-center justify-end mt-4">
                <jet-button class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </jet-button>
            </div>
        </form>
    </div>
</div>
<!-- </app-layout> -->
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import JetButton from '@/Jetstream/Button'
import JetInput from '@/Jetstream/Input'
import JetCheckbox from "@/Jetstream/Checkbox";
import JetLabel from '@/Jetstream/Label'

export default {
    data() {
        return {
            form: this.$inertia.form({
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                creavora: false,
                greative: false

            })
        }
    },
    components: {
        AppLayout,
        JetButton,
        JetInput,
        JetCheckbox,
        JetLabel,

    },
    methods: {
        submit() {
            axios.post(route('account.store'), this.form)
                .then(response => {
                    if (response.data == 'sukses') {
                        window.location.href = route('account')
                    }
                }).catch(error => {
                    console.log(error.message)
                    alert('gagal menyimpan, periksa kembali')
                })
        }
    }
}
</script>
