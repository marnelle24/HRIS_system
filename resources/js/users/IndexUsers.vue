<template>
    <div>
      <h3 class="text-center">All Users</h3><br/>
      <b-button v-b-modal.modal-prevent-closing>Add</b-button>
    <br>

        <b-input-group size="md" class="mb-2 mt-3">
            <b-input-group-prepend is-text>
                <b-icon icon="search"></b-icon>
            </b-input-group-prepend>
            <b-form-input type="search"  v-model="filters.first_name.value" placeholder="Search name"></b-form-input>
        </b-input-group>

      <v-table 
        :data="users"
        :filters="filters" class="table table-bordered mt-3"        
        :currentPage.sync="currentPage"
        :pageSize="10"
        @totalPagesChanged="totalPages = $event"
        ref="table_data"
        name="table_data"
      >
      <thead slot="head">
          <th>Name</th>
          <th>Hired date</th>
          <th>Birthday</th>
          <th>Address</th>
          <th>Action</th>
      </thead>
      <tbody slot="body" slot-scope="{displayData}">
          <tr v-for="row in displayData" :key="row.id">
            <td>
                {{ row.first_name }}
                {{ row.middle_name }}
                {{ row.last_name }}
            </td>
            <td>{{ row.hired_date }}</td>
            <td>{{ row.birth_date }}</td>
            <td>
                {{ row.address  }}
            </td>
            <td>
                <div class="h2 mb-0">
                    <b-icon icon="pencil-fill" variant="info"  v-on:click="editUser(row.id,row)" ></b-icon>
                    <b-icon icon="x-circle" variant="danger" v-on:click="deleteUser(row.id)" ></b-icon>
                </div>
            </td>
          </tr>
      </tbody>
    </v-table>
    <smart-pagination
        :currentPage.sync="currentPage"
        :totalPages="totalPages"
    />

    <b-modal
        id="modal-prevent-closing"
        ref="modal"
        title="Create user information"
        hide-footer
        >
        <validation-observer ref="observer" v-slot="{ handleSubmit }">
          <b-form @submit.stop.prevent="handleSubmit(onSubmit)">

            <validation-provider
              name="Firstname"
              :rules="{ required: true, min: 3 }"
              v-slot="validationContext"
                >
              <b-form-group id="example-input-group-1" label="Firstname" label-for="example-input-1">
                <b-form-input
                  id="example-input-1"
                  name="example-input-1"
                  v-model="form.fname"
                  :state="getValidationState(validationContext)"
                  aria-describedby="input-1-live-feedback"
                ></b-form-input>

                <b-form-invalid-feedback id="input-1-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
              </b-form-group>
            </validation-provider>

            <validation-provider
              name="Middlename"
              :rules="{ required: true, min: 3 }"
              v-slot="validationContext"
                >
              <b-form-group id="example-input-group-1" label="Middlename" label-for="example-input-2">
                <b-form-input
                  id="example-input-2"
                  name="example-input-2"
                  v-model="form.mname"
                  :state="getValidationState(validationContext)"
                  aria-describedby="input-1-live-feedback"
                ></b-form-input>

                <b-form-invalid-feedback id="input-1-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
              </b-form-group>
            </validation-provider>

            <validation-provider
              name="Lastname"
              :rules="{ required: true, min: 3 }"
              v-slot="validationContext"
                >
              <b-form-group id="example-input-group-1" label="Lastname" label-for="example-input-6">
                <b-form-input
                  id="example-input-6"
                  name="example-input-6"
                  v-model="form.lname"
                  :state="getValidationState(validationContext)"
                  aria-describedby="input-1-live-feedback"
                ></b-form-input>

                <b-form-invalid-feedback id="input-1-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
              </b-form-group>
            </validation-provider>

            <validation-provider
              name="Address"
              :rules="{ required: true, min: 3 }"
              v-slot="validationContext"
                >
              <b-form-group id="example-input-group-1" label="Address" label-for="example-input-3">
                <b-form-input
                  id="example-input-3"
                  name="example-input-3"
                  v-model="form.address"
                  :state="getValidationState(validationContext)"
                  aria-describedby="input-1-live-feedback"
                ></b-form-input>

                <b-form-invalid-feedback id="input-1-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
              </b-form-group>
            </validation-provider>

            <validation-provider
              name="Birthdate"
              :rules="{ required: true, min: 3 }"
              v-slot="validationContext"
                >
                <b-form-group id="example-input-group-4" label="Birthdate" label-for="example-input-4">
                <b-form-datepicker             
                id="example-input-4"
                  name="example-input-4"
                  v-model="form.birthdate"
                  :state="getValidationState(validationContext)"
                  aria-describedby="input-1-live-feedback"></b-form-datepicker>

                <b-form-invalid-feedback id="input-1-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
                </b-form-group>
            </validation-provider>

            <validation-provider name="Gender" :rules="{ required: true }" v-slot="validationContext">
              <b-form-group id="example-input-group-2" label="Gender" label-for="example-input-5">
                <b-form-select
                  id="example-input-5"
                  name="example-input-5"
                  v-model="form.gender"
                  :options="gender"
                  :state="getValidationState(validationContext)"
                  aria-describedby="input-2-live-feedback"
                ></b-form-select>

                <b-form-invalid-feedback id="input-2-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
              </b-form-group>
            </validation-provider>

            <b-button type="submit" variant="primary">Submit</b-button>
            <b-button class="ml-2" @click="resetForm()">Reset</b-button>
          </b-form>
        </validation-observer>
    </b-modal>

    <b-modal
        id="modal-prevent-closing2"
        ref="modal"
        title="Update user information"
        hide-footer
        >
        <validation-observer ref="observer" v-slot="{ handleSubmit }">
          <b-form @submit.stop.prevent="handleSubmit(onSubmit)">
            <input type="hidden" class="form-control" v-model="formEdit.id">
            <validation-provider
              name="Firstname"
              :rules="{ required: true, min: 3 }"
              v-slot="validationContext"
                >
              <b-form-group id="example-input-group-1" label="Firstname" label-for="example-input-1">
                <b-form-input
                  id="example-input-1"
                  name="example-input-1"
                  v-model="formEdit.fname"
                  :state="getValidationState(validationContext)"
                  aria-describedby="input-1-live-feedback"
                ></b-form-input>

                <b-form-invalid-feedback id="input-1-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
              </b-form-group>
            </validation-provider>

            <validation-provider
              name="Middlename"
              :rules="{ required: true, min: 3 }"
              v-slot="validationContext"
                >
              <b-form-group id="example-input-group-1" label="Middlename" label-for="example-input-2">
                <b-form-input
                  id="example-input-2"
                  name="example-input-2"
                  v-model="formEdit.mname"
                  :state="getValidationState(validationContext)"
                  aria-describedby="input-1-live-feedback"
                ></b-form-input>

                <b-form-invalid-feedback id="input-1-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
              </b-form-group>
            </validation-provider>

            <validation-provider
              name="Lastname"
              :rules="{ required: true, min: 3 }"
              v-slot="validationContext"
                >
              <b-form-group id="example-input-group-1" label="Lastname" label-for="example-input-6">
                <b-form-input
                  id="example-input-6"
                  name="example-input-6"
                  v-model="formEdit.lname"
                  :state="getValidationState(validationContext)"
                  aria-describedby="input-1-live-feedback"
                ></b-form-input>

                <b-form-invalid-feedback id="input-1-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
              </b-form-group>
            </validation-provider>

            <validation-provider
              name="Address"
              :rules="{ required: true, min: 3 }"
              v-slot="validationContext"
                >
              <b-form-group id="example-input-group-1" label="Address" label-for="example-input-3">
                <b-form-input
                  id="example-input-3"
                  name="example-input-3"
                  v-model="formEdit.address"
                  :state="getValidationState(validationContext)"
                  aria-describedby="input-1-live-feedback"
                ></b-form-input>

                <b-form-invalid-feedback id="input-1-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
              </b-form-group>
            </validation-provider>

            <validation-provider
              name="Birthdate"
              :rules="{ required: true, min: 3 }"
              v-slot="validationContext"
                >
                <b-form-group id="example-input-group-4" label="Birthdate" label-for="example-input-4">
                <b-form-datepicker             
                id="example-input-4"
                  name="example-input-4"
                  v-model="formEdit.birthdate"
                  :state="getValidationState(validationContext)"
                  aria-describedby="input-1-live-feedback"></b-form-datepicker>

                <b-form-invalid-feedback id="input-1-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
                </b-form-group>
            </validation-provider>

            <validation-provider name="Gender" :rules="{ required: true }" v-slot="validationContext">
              <b-form-group id="example-input-group-2" label="Gender" label-for="example-input-5">
                <b-form-select
                  id="example-input-5"
                  name="example-input-5"
                  v-model="formEdit.gender"
                  :options="gender"
                  :state="getValidationState(validationContext)"
                  aria-describedby="input-2-live-feedback"
                ></b-form-select>

                <b-form-invalid-feedback id="input-2-live-feedback">{{ validationContext.errors[0] }}</b-form-invalid-feedback>
              </b-form-group>
            </validation-provider>

            <b-button type="submit" variant="primary">Submit</b-button>
            <b-button class="ml-2" @click="resetFormEdit()">Reset</b-button>
          </b-form>
        </validation-observer>
    </b-modal>
    </div>
</template>

<script>
export default {

  data() {
    return {
        testButClicked: false,       
        currentPage: 1,
        totalPages: 0,
        value: '',
        name:'',
        variantMsg:'',
        nameState: null,
        nameFirstname: null,
        userinfo: {},
        userEditInfo: {},
        users:[],
        submittedNames: [],
        options: [],
        gender: [
            { value: null, text: "Choose..." },
            { value: "male", text: "Male" },
            { value: "female", text: "Female" }
        ],
        form: {
            fname: null,
            mname: null,
            lname: null,
            address: null,
            birthdate: null,
            gender: null
        },
        formEdit: {
            id: null,
            fname: null,
            mname: null,
            lname: null,
            address: null,
            birthdate: null,
            gender: null
        },
        filters: {
          first_name: { value: '', keys: ['first_name'] }
        }
    }
  },
  created() {
    this.list();
  },
  methods: {
    getValidationState({ dirty, validated, valid = null }) {
        
        return dirty || validated ? valid : null;
    },
    resetForm() {
        this.form = {
            fname: null,
            mname: null,
            lname: null,
            address: null,
            birthdate: null,
            gender: null
        };

      this.$nextTick(() => {
        this.$refs.observer.reset();
      });
    },   
    resetFormEdit() {
      this.formEdit = {
        id: null,
        fname: null,
        mname: null,
        lname: null,
        address: null,
        birthdate: null,
        gender: null
      };

      this.$nextTick(() => {
        this.$refs.observer.reset();
      });
    },
    onSubmit() {

        if(this.formEdit.id) {

            this.axios
            .post(axios.defaults.baseURL+`/users-information/update/${this.formEdit.id}`, this.formEdit)
            .then((response) => {
                console.log(response.data);
            });
            
            // Hide the modal manually
            this.$bvModal.hide('modal-prevent-closing2')

            this.variantMsg = 'updated';

        }else {

            this.axios
              .post(axios.defaults.baseURL+'/users-information/add', this.form)
              .then(response => {
                    //this.$router.push({name: 'home'})
                    this.loading = true
                    this.$refs.observer.reset();
                    console.log(response)
              })
              .catch(error => console.log(error))
              .finally(() => this.loading = false)

            // Hide the modal manually
            this.$nextTick(() => {
              this.$bvModal.hide('modal-prevent-closing')
            })

            this.variantMsg = 'save';

        }

        setTimeout(function () { 
            this.$bvToast.toast('Data has been successfully '+this.variantMsg, {
              title: `${'Success' || 'default'}`,
              variant: 'success',
              solid: true
            })
        }.bind(this), 1000)

    }, 
    deleteUser(id) {
        this.axios
        .delete(axios.defaults.baseURL+`/users-information/delete/${id}`)
        .then(response => {
            let i = this.users.map(item => item.id).indexOf(id); // find index of your object
            this.users.splice(i, 1)
        });

        setTimeout(function () { 
            this.$bvToast.toast('Data has been successfully deleted', {
              title: `${'Success' || 'default'}`,
              variant: 'success',
              solid: true
            })
        }.bind(this), 1000)
    },
    editUser(id,obj) {
        this.formEdit.id = obj.id;
        this.formEdit.fname = obj.first_name;
        this.formEdit.mname = obj.middle_name;
        this.formEdit.lname = obj.last_name;
        this.formEdit.address = obj.address;
        this.formEdit.birthdate = obj.birth_date;
        this.formEdit.gender = obj.gender;
        this.$bvModal.show('modal-prevent-closing2')
    },
    updateUser(id) {
        this.axios
        .post(axios.defaults.baseURL+`/users-information/update/${id}`, this.userEditInfo)
        .then((response) => {
            console.log(response.data);
        });
    },
    list() {
      this.axios
        .get(axios.defaults.baseURL+'/users-information/list')
        .then(response => {
          this.users = response.data;
        });
    }
  }
}
</script>