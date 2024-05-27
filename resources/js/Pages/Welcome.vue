<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-blue-50 text-black/50 dark:bg-black dark:text-white/50">
           <img
        id="background"
        class="absolute -left-30 top-0 w-screen h-screen object-cover"
        src="https://cdn.nba.com/manage/2023/06/NBA-Draft-2023-Logo-Thumbnail-16x9-safezone.jpg"
    />
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    
                    <div class="flex lg:justify-center lg:col-start-2">
                        

                    </div>
                    <div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 button justify-center">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:bg-blue-100 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                    :href="route('login')"
                    class="rounded-md px-4 py-3 text-black bg-blue-200 ring-2 ring-blue-500 transition hover:bg-blue-300 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                >
            Log in
        </Link>

        <Link
            v-if="canRegister"
            :href="route('register')"
            class="rounded-md px-4 py-3 text-black bg-blue-200 ring-2 ring-blue-500 transition hover:bg-blue-300 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Register
        </Link>
                        </template>
                    </nav>
                </div>
                </header>
            </div>
        </div>
    </div>
</template>

<style scoped>
.button {
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    margin-top: 40px;
}
Link{
    border: black 2px solid;
}
</style>