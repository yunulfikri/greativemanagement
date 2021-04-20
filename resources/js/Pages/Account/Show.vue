<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Account Member
            </h2>
        </template>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <add-member></add-member>
                <member-list :member="datamember"></member-list>
            </div>
        </div>
    </app-layout>
</template>

<script>
import MemberList from './MemberList'
import AppLayout from "@/Layouts/AppLayout"
import AddMember from './AddMember';

export default {
    data(){

    },
    components:{
        MemberList,
        AppLayout,
        AddMember
    },
    props:['datamember']
}
</script>