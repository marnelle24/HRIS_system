<template>
    <div>
      <h3 class="text-center">All Users</h3><br/>
      <b-button v-b-modal.modal-1>Add</b-button>
      <div>
        <b-table striped hover :items="items"></b-table>
      </div>
      <b-modal id="modal-1" title="BootstrapVue">
        <p class="my-4">Create User</p>
        <form @submit.prevent="addBook">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label>Author</label>
            <input type="text" class="form-control" >
          </div>
          <button type="submit" class="btn btn-primary">Add User</button>
        </form>
      </b-modal>
    </div>
</template>

<script>
export default {
  data() {
    return {
        items: [
          { age: 40, first_name: 'Dickerson', last_name: 'Macdonald' },
          { age: 21, first_name: 'Larsen', last_name: 'Shaw' },
          { age: 89, first_name: 'Geneva', last_name: 'Wilson' },
          { age: 38, first_name: 'Jami', last_name: 'Carney' }
        ]
    }
  },
  created() {
    this.axios
        .get('http://localhost:7080/api/users')
        .then(response => {
          //this.timesheets = response.data;
          console.log(response.data);
          console.log('here');
        });
  },
  methods: {

    addBook() {
        console.log('here   ');
      // this.axios
      //     .post('http://localhost:7080/api/timesheet/add', this.book)
      //     .then(response => (
      //         this.$router.push({name: 'home'})
      //         // console.log(response.data)
      //     ))
      //     .catch(error => console.log(error))
      //     .finally(() => this.loading = false)
    },
    deleteTimesheet(id) {
      this.axios
          .delete(`http://localhost:7080/api/timesheet/delete/${id}`)
          .then(response => {
            let i = this.timesheets.map(item => item.id).indexOf(id); // find index of your object
            this.timesheets.splice(i, 1)
          });
    }
  }
}
</script>