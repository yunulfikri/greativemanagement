<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tools
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                    <div class="grid grid-cols-4 gap-4 w-full">
                        <div class="rounded-full h-40 w-40 bg-blue-500 flex items-center justify-center"><a :href="route('tool.cm')">CM Tag</a></div>
                        <div class="rounded-full h-40 w-40 bg-green-500 flex items-center justify-center"><a :href="route('tool.element')">Element Tag</a></div>
                        <div class="rounded-full h-40 w-40 bg-yellow-400 flex items-center justify-center"><a :href="route('tool.etsy')">Etsy Tag</a></div>
                        <div class="rounded-full h-40 w-40 bg-purple-400 flex items-center justify-center"><a href="http://www.discountcalculator.net/" target="_blank">Discount Calc</a></div>
                        <div class="rounded-full h-40 w-40 bg-yellow-400 flex items-center justify-center"><a :href="route('guide')">Preview Product</a></div>
                        <div class="rounded-full h-40 w-40 bg-pink-500 flex items-center justify-center"><a :href="route('plan')">Product Desc</a></div>

                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },
    }
</script>
