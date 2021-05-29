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
                    <div class="grid md:grid-cols-4 md:gap-4 grid-cols-1 gap-1 w-full justify-items-center">
                        <a :href="route('tool.cm')"><div class="rounded-full h-40 w-40 bg-blue-500 flex items-center justify-center cmsvg"></div></a>
                        <a :href="route('tool.element')"><div class="rounded-full h-40 w-40 bg-green-500 flex items-center justify-center elementsvg"></div></a>
                        <a :href="route('tool.etsy')"><div class="rounded-full h-40 w-40 bg-yellow-400 flex items-center justify-center etsysvg"></div></a>
                        <a :href="route('tool.canva')"><div class="rounded-full h-40 w-40 bg-white flex items-center justify-center canvasvg"></div></a>
                        <a href="http://www.discountcalculator.net/" target="_blank"><div class="rounded-full h-40 w-40 bg-purple-400 flex items-center justify-center calcsvg"></div></a>
                        <a :href="route('guide')"><div class="rounded-full h-40 w-40 bg-green-500 flex items-center justify-center previewsvg"></div></a>
                        <a :href="route('plan')"><div class="rounded-full h-40 w-40 bg-yellow-400 flex items-center justify-center descsvg"></div></a>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<style scoped>
.cmsvg {
    background-image: url('/img/CM.svg');
    background-repeat: round;
}
.elementsvg {
    background-image: url('/img/Element.svg');
    background-repeat: round;
}
.etsysvg{
    background-image: url('/img/Etsy.svg');
    background-repeat: round;
}
.previewsvg {
    background-image: url('/img/Preview.svg');
    background-repeat: round;
}
.canvasvg {
    background-image: url('/img/Canva.svg');
    background-repeat: round;
}
.calcsvg {
    background-image: url('/img/Calculator.svg');
    background-repeat: round;
}
.descsvg {
    background-image: url('/img/Description.svg');
    background-repeat: round;
}
</style>
<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },
    }
</script>
