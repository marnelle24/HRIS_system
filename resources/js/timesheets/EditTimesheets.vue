<template>
    <div>
        <h3 class="text-center">Edit Book</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateTimesheet">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="timesheets.name">
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input type="text" class="form-control" v-model="timesheets.author">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Timesheet</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                timesheets: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/timesheets/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.timesheets = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateTimesheet() {
                this.axios
                    .post(`http://localhost:8000/api/timesheets/update/${this.$route.params.id}`, this.timesheets)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>