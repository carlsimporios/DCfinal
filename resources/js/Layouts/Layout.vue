<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div class="min-h-screen bg-gray-100 flex">
        <!-- Sidebar -->
        <nav class="bg-white w-64 border-r border-gray-100 flex-shrink-0">
            <div class="flex flex-col h-full">
                <!-- Logo -->
                <div class="shrink-0 flex items-center justify-center h-16 border-b border-gray-100">
                    <Link :href="route('dashboard')">
                        <ApplicationLogo class="block h-9 w-auto fill-current text-gray-800" />
                    </Link>
                </div>

                <!-- Settings Dropdown -->
                <div class="border-b border-gray-100 p-4">
                    <Dropdown align="right" width="48">
                        <template #trigger>
                            <span class="inline-flex rounded-md">
                                <button
                                    type="button"
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                >
                                    {{ $page.props.auth.user.name }}
                                    <svg
                                        class="ms-2 -me-0.5 h-4 w-4"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"
                                        />
                                    </svg>
                                </button>
                            </span>
                        </template>

                        <template #content>
                            <DropdownLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </DropdownLink>
                        </template>
                    </Dropdown>
                </div>

             
                <div class="grid grid-cols-2 grid-rows-2 gap-4">
                <div class="px-4 py-4 space-y-4">
                    <Link href="/dashboard" class="p-2 rounded"  :class="{ 'bg-blue-500 text-white': $page.component == 'Dashboard' }">
                    Dashboard
                    </Link>
                </div>
                <div class="px-4 py-4 space-y-4">
                    <Link href='/players' class="p-2 rounded" :class="{ 'bg-blue-500 text-white': $page.component == 'Players' }"> Players</Link>
                </div>
                </div>
            </div>
        </nav>

     
        <div class="flex-1">
           
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>


            <main>
                <slot />
            </main>
        </div>
    </div>
</template>

<style scoped>
.nav-link {
    display: block;
    padding: 0.5rem 1rem;
    color: #4a5568;
    text-decoration: none;
    border-radius: 0.375rem;
    transition: background-color 0.2s;
}

.nav-link:hover,
.nav-link.active {
    background-color: rgb(184, 244, 255);
}
</style>
