<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Home</router-link>
                    <router-link to="/add" class="nav-item nav-link">Add Book</router-link>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateBook">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="holiday.name">
                    </div>
                    <div class="form-group">
                        <label>Author</label>
                        <input type="date" class="form-control" v-model="holiday.date">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Holiday</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                holiday: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/holiday/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.holiday = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateBook() {
                this.axios
                    .post(`http://localhost:8000/api/holiday/update/${this.$route.params.id}`, this.holiday)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>