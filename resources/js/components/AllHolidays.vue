<template>
    <div>
        <h3 class="text-center">All Books</h3><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="holiday in holidays" :key="holiday.id">
                <td>{{ holiday.id }}</td>
                <td>{{ holiday.name }}</td>
                <td>{{ holiday.date }}</td>
                <td>{{ holiday.created_at }}</td>
                <td>{{ holiday.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: holiday.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteHoliday(holiday.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                holidays: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/holidays')
                .then(response => {
                    this.holidays = response.data;
                });
        },
        methods: {
            deleteHoliday(id) {
                this.axios
                    .delete(`http://localhost:8000/api/holiday/delete/${id}`)
                    .then(response => {
                        let i = this.holidays.map(item => item.id).indexOf(id); // find index of your object
                        this.holidays.splice(i, 1)
                    });
            }
        }
    }
</script>