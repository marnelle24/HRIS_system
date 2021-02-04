<template>
    <div>
      <h3 class="text-center">All Users</h3><br/>
      <b-button v-b-modal.modal-1>Add</b-button>
      <div>
        <b-table striped hover :items="items"></b-table>
      </div>
        <b-modal id="modal-1" hide-footer>
    <template #modal-title>
        <h3>Create User</h3>
        </template>
        <form @submit.prevent="addUser">

        <div class="form-group">
        <label>Firstname</label>
            <input type="text" class="form-control" v-model="userinfo.fname">
        </div>
        <div class="form-group">
            <label>Middlename</label>
            <input type="text" class="form-control"  v-model="userinfo.mname">
        </div>
        <div class="form-group">
            <label>Lastname</label>
            <input type="text" class="form-control" v-model="userinfo.lname">
        </div>
        <div class="form-group">

          <div>
            <label>Birthdate</label>
            <b-form-datepicker id="example-datepicker"  v-model="userinfo.birthdate" class="mb-2"></b-form-datepicker>
          </div>
        </div>
        <div class="form-group">
            <label>Gender</label>
            <input type="text" class="form-control"  v-model="userinfo.gender">
        </div>
        <div class="ml-auto">
            <button class="btn btn-primary mt-3 float-right" block @click="$bvModal.hide('modal-1')">Close Me</button>
            &nbsp;
            <button type="submit" class="btn btn-primary mt-3 float-right">Ok</button>
        </div>
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
        ],
        value: '',
        userinfo: {}
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

    addUser() {
      this.axios
          .post('http://localhost:7080/api/users-information/add', this.userinfo)
          .then(response => (
              //this.$router.push({name: 'home'})
              console.log(response)
          ))
          .catch(error => console.log(error))
          .finally(() => this.loading = false)
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