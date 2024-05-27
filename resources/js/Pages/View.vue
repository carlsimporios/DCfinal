<script setup>
import { Link } from '@inertiajs/vue3'
import 'tailwindcss/tailwind.css';
import { useForm } from '@inertiajs/vue3'
import { ref } from 'vue'
import Layout from '@/Layouts/Layout.vue';

const props = defineProps({
    player: Object
})

defineOptions({
    layout: Layout
});

const showEdit = ref(false)

const delForm = useForm({
    id: props.player.id
})

const form = useForm({
    player_name: '',
    college: '',
    birthdate: '',
    position: '',
    draft_year: ''
})

const submit = () => {
    form.put('/players/' + props.player.id)
}

const delEmp = () => {
    const del = confirm("Are you sure you want to delete this player?")
    if(del)
        delForm.submit('delete', '/players/' + props.player.id)
}

const editPlayer = () => {
    form.player_name = props.player.player_name
    form.college = props.player.college
    form.birthdate = props.player.birthdate
    form.position = props.player.position
    form.draft_year = props.player.draft_year
    showEdit.value = true
}
</script>

<template>
    <div class="p-8">
        <h1 class="text-4xl">View Player</h1>

        <div class="border bordp p-4 rounded m-6 fs-5 view-container">
            <table v-if="!showEdit" class="tanle-striped flex">
                <tr class="flex flex-col border-end border-solid mr-2 p-2">
                    <th>Player Name: </th>
                    <th>College: </th>
                    <th>Birthdate: </th>
                    <th>Position: </th>
                    <th>Draft Year: </th>
                </tr>
                <tr class="flex flex-col">
                    <td>{{ props.player.player_name }}</td>
                    <td>{{ props.player.college }}</td>
                    <td>{{ props.player.birthdate}}</td>
                    <td>{{ props.player.position }}</td>
                    <td>{{ props.player.draft_year }}</td>
                </tr>
            </table>
            
            <div v-if="showEdit">
                <form @submit.prevent="submit">
                    <div class="mb-3">
                        <label for="player_name">Player Name: </label>
                        <input type="text" id="player_name" class="w-full" v-model="form.player_name">
                    </div>
                    <div class="mb-3">
                        <label for="college">College: </label>
                        <input type="text" id="college" class="w-full" v-model="form.college">
                    </div>
                    <div class="mb-3">
                        <label for="birthdate">Birthdate: </label>
                        <input type="date" id="birthdate" class="w-full" v-model="form.birthdate">
                    </div>
                    <div class="mb-3">
                        <label for="position">Position: </label>
                        <input type="text" id="position" class="w-full" v-model="form.position">
                    </div>
                    <div class="mb-3">
                        <label for="draft_year">Draft Year: </label>
                        <input type="text" id="draft_year" class="w-full" v-model="form.draft_year">
                    </div>
                    
                    <button type="submit" class="bg-blue-700 text-white py-2 px-3 rounded">Submit</button>
                </form>
            </div>

            <div class="mt-2 flex">
                <Link href="/players" class="btn-success btn ">Back</Link>
                <button class="btn btn-danger text-white rounded ms-2" @click="delEmp">Delete</button>
                <button class="btn btn-primary rounded ms-2" @click="editPlayer">{{ showEdit ? 'Cancel' : 'Edit' }}</button>
            </div>
        </div>
    </div>
</template>
