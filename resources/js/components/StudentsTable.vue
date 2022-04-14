<template>
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-column">
            <Sidebar/>
        </div>
        <div class="my-container active-cont">
            <div class="row">
                <div class="col-lg-12 p-2">
                    <h1><i class="fa-solid fa-users-line" aria-hidden="true" style="padding-right:10px"></i>Students
                    </h1>
                    <hr/>
                </div>
            </div>
            <b-input-group prepend="Search student:" class="mt-3">
                <b-form-input v-model="filter" placeholder="Filter table.."></b-form-input>
                <b-input-group-append>
                    <b-button><i class="fa-solid fa-magnifying-glass"></i></b-button>
                    <b-button variant="outline-secondary" @click.prevent="addTable()"><i class="fa-solid fa-plus"></i>
                    </b-button>
                </b-input-group-append>
            </b-input-group>
            <hr/>
            <b-table hover class="table align-middle" :per-page="perPage" thead-class="bg-col text-white"
                     :filter="filter"
                     :fields="column"
                     :current-page="currentPage"
                     :items="students">
                <template #cell(actions)="data">
                    <a @click.prevent="editTable(data)"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a @click.prevent="deleteRow(data)"><i class="fa-solid fa-trash"></i></a>
                </template>
            </b-table>
            <b-pagination
                v-model="currentPage"
                :total-rows="students.length"
                :per-page="perPage"
                page-class="customPage"
            ></b-pagination>

            <b-modal v-model="showModal" id="modal-1" title="Edit Student" :key="data.registration_number" hide-footer>
                <b-form-group id="input-group-2" label="Firstname" label-for="input-2">
                    <b-form-input
                        id="input-2"
                        v-model="firstname"
                        placeholder="firstname"
                    ></b-form-input>
                </b-form-group>
                <b-form-group id="input-group-2" label="Lastname" label-for="input-2">
                    <b-form-input
                        id="input-2"
                        v-model="lastname"
                        placeholder="lastname"
                    ></b-form-input>
                </b-form-group>
                <b-form-group id="input-group-2" label="Gender" label-for="input-2">
                    <b-form-select v-model="selected" :options="options" class="mb-3">
                        <template #first>
                            <b-form-select-option :value="null" disabled>-- Please select an option --
                            </b-form-select-option>
                        </template>
                    </b-form-select>
                </b-form-group>
                <b-button size="sm" variant="danger" @click="close">
                    Cancel
                </b-button>
                <b-button variant="primary" @click="onSubmit">Submit</b-button>
            </b-modal>

            <b-modal v-model="addModal" id="modal-1" title="Add Student" hide-footer>
                <b-form-group id="input-group-2" label="Firstname" label-for="input-2">
                    <b-form-input
                        id="input-2"
                        v-model="firstname"
                        placeholder="firstname"
                    ></b-form-input>
                </b-form-group>
                <b-form-group id="input-group-2" label="Lastname" label-for="input-2">
                    <b-form-input
                        id="input-2"
                        v-model="lastname"
                        placeholder="lastname"
                    ></b-form-input>
                </b-form-group>
                <b-form-group id="input-group-2" label="Gender" label-for="input-2">
                    <b-form-select v-model="selectedGender" :options="options" class="mb-3">
                        <template #first>
                            <b-form-select-option :value="null" disabled>-- Please select an option --
                            </b-form-select-option>
                        </template>
                    </b-form-select>
                </b-form-group>
                <b-form-group id="input-group-2" label="Year" label-for="input-2">
                    <b-form-select v-model="year" :options="optionsYear" class="mb-3">
                        <template #first>
                            <b-form-select-option :value="null" disabled>-- Please select an option --
                            </b-form-select-option>
                        </template>
                    </b-form-select>
                </b-form-group>
                <b-form-group id="input-group-2" label="Group" label-for="input-2">
                    <b-form-select v-model="group" :options="optionsGroup" class="mb-3">
                        <template #first>
                            <b-form-select-option :value="null" disabled>-- Please select an option --
                            </b-form-select-option>
                        </template>
                    </b-form-select>
                </b-form-group>
                <b-button size="sm" variant="danger" @click="closeModal">
                    Cancel
                </b-button>
                <b-button variant="primary" @click="onSubmitAdd">Submit</b-button>
            </b-modal>
        </div>
    </div>
</template>

<script>
import Sidebar from './Sidebar'

export default {

    components: {
        Sidebar
    },
    name: "StudentsTable",
    data() {
        return {
            students: [],
            perPage: 10,
            currentPage: 1,
            filter: '',
            firstname: '',
            lastname: '',
            gender: '',
            year: '',
            group: '',
            data: "",
            showModal: false,
            addModal: false,
            column: [
                {
                    key: "registration_number",
                    label: "Registration Number"
                },
                {
                    key: "firstname",
                    label: "Firstname"
                },
                {
                    key: "lastname",
                    label: "Lastname",
                },
                {
                    key: "gender",
                    label: "gender",
                },
                {
                    key: "year",
                    label: "year",
                },
                {
                    key: "group",
                    label: "group",
                },
                "Actions"
            ],
            selected: null,
            selectedGender: null,
            options: [
                {value: 'male', label: 'male', text: 'male'},
                {value: 'female', label: 'female', text: 'female'},
            ],
            optionsYear: [
                {value: '9', label: '9', text: '9'},
                {value: '10', label: '10', text: '10'},
                {value: '11', label: '11', text: '11'},
                {value: '12', label: '12', text: '12'},
            ],
            optionsGroup: [
                {value: 'A', label: 'A', text: 'A'},
                {value: 'B', label: 'B', text: 'B'},
            ],
            optionsSubjects: [
                {value: 'Mathematics', label: 'Mathematics', text: 'Mathematics'},
                {value: 'Chemistry', label: 'Chemistry', text: 'Chemistry'},
                {value: 'Informatics', label: 'Informatics', text: 'Informatics'},
                {value: 'Physics', label: 'Physics', text: 'Physics'},
                {value: 'Biology', label: 'Biology', text: 'Biology'},
                {value: 'Geography', label: 'Geography', text: 'Geography'},
                {value: 'History', label: 'History', text: 'History'},
                {value: 'Romanian', label: 'Romanian', text: 'Romanian'},
                {value: 'English', label: 'English', text: 'English'},
                {value: 'French', label: 'French', text: 'French'},
                {value: 'Sport', label: 'Sport', text: 'Sport'},
                {value: 'Logic', label: 'Logic', text: 'Logic'},
                {value: 'English', label: 'Psychology', text: 'Psychology'},
            ]
        };
    },
    methods: {
        addTable() {
            this.addModal = true;
            this.firstname = '';
            this.lastname = '';
            this.selected = '';
            this.gender = '';
            this.year = '';
            this.group = '';
        },
        deleteRow(data) {
            data.registration_number = undefined;
            this.data = Object.assign({}, data.item);
            axios.delete('http://127.0.0.1:8000/students/' + data.item.registration_number).then(response => {
                this.students.splice(this.students.indexOf(data.registration_number), 1);
                this.read();
            });
        },
        closeModal() {
            this.addModal = false;
            this.firstname = '';
            this.lastname = '';
            this.selected = '';
            this.gender = '';
            this.year = '';
            this.group = '';
        },
        onSubmit() {
            axios.put('http://127.0.0.1:8000/students/' + this.data.registration_number, {
                firstname: this.firstname,
                lastname: this.lastname,
                gender: this.selected
            })

            this.read();
            this.close();
        },
        editTable(data) {
            this.data = Object.assign({}, data.item);
            this.showModal = true;
        },
        close() {
            this.showModal = false;
        },
        onSubmitAdd() {
            axios.get('/classes/' + this.year + '/' + this.group).then((data2) => {
                this.classId = data2.data;
                axios.post('http://127.0.0.1:8000/add-student', {
                    firstname: this.firstname,
                    lastname: this.lastname,
                    gender: this.selectedGender,
                    class_id: this.classId
                }).then((response) => {
                    this.read();
                    this.closeModal();
                    this.firstname = ''
                    this.lastname = ''
                    this.selectedGender = ''
                    this.year = ''
                    this.group = ''
                });
            })
        },
        read() {
            axios.get('/students').then(({data}) => {
                //console.log(data)
                this.students = data;
            })
                .catch((err) => console.error(err));
        },
    },
    mounted() {
        this.read();
    },
};
</script>

