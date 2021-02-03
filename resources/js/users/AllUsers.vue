<template>
  <div>
    <h3 class="text-center">All Users</h3><br/>

    <table class="table table-bordered">
      <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Author</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Actions</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="timesheet in timesheets" :key="timesheet.id">
        <td>{{ timesheet.id }}</td>
        <td>{{ timesheet.name }}</td>
        <td>{{ timesheet.author }}</td>
        <td>{{ timesheet.created_at }}</td>
        <td>{{ timesheet.updated_at }}</td>
        <td>
          <div class="btn-group" role="group">
            <router-link :to="{name: 'edit', params: { id: timesheet.id }}" class="btn btn-primary">Edit
            </router-link>
            <button class="btn btn-danger" @click="deleteTimesheet(timesheet.id)">Delete</button>
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
      timesheets: []
    }
  },
  created() {
    this.axios
        .get('http://localhost:7080/api/timesheets')
        .then(response => {
          //this.timesheets = response.data;
          console.log(response.data);
          console.log('here');
        });
  },
  methods: {
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