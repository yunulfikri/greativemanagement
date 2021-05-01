<template>
    <div class="pt-5 h-screen">
        <div class="m-3">
            <div class="relative bg-white py-6 px-6 rounded-3xl w-64 my-4 shadow-xl">
            <div class=" text-white flex items-center absolute rounded-full py-4 px-4 shadow-xl bg-blue-500 left-4 -top-6">
                <!-- svg  -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
            </div>
            <div class="mt-8">
                <p class="text-xl font-semibold my-2">All Team</p>
                <div class="text-6xl font-bold">30</div>
                <div class="border-t-2 "></div>

                <div class="flex justify-between">
                    <div class="my-2">
                        <p class="font-semibold text-base mb-2">Team Member</p>
                        <div class="flex space-x-2">
                            Bella, Alica, Bilal, Nuh and more
                        </div>
                    </div>
                     <div class="my-2">
                        <!-- <p class="font-semibold text-base mb-2">Progress</p>
                        <div class="text-base text-gray-400 font-semibold">
                            <p>4%</p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo'

    export default {
        components: {
            JetApplicationLogo,
        },
    }
</script>
