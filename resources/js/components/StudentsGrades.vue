<template>
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-column">
            <Sidebar/>
        </div>
        <div class="my-container active-cont">
            <div class="row">
                <div class="col-lg-12 p-2">
                    <h1><i class="fa fa-graduation-cap" aria-hidden="true"></i>Students Grades </h1>
                    <hr/>
                </div>
            </div>
            <b-input-group prepend="Search:" class="mt-3">
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
                <template #cell(actions)="editable">
                    <a @click.prevent="editTable(editable)"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a @click.prevent="deleteRow(editable)"><i class="fa-solid fa-trash"></i></a>
                </template>
            </b-table>
            <b-pagination
                v-model="currentPage"
                :total-rows="students.length"
                :per-page="perPage"
                page-class="customPage"
            ></b-pagination>

            <b-modal v-model="showModal" id="modal-1" title="Edit grade" :key="data.id" hide-footer>
                <b-form-group id="input-group-2" label="Subject" label-for="input-2">
                    <b-form-select v-model="subject" :options="optionsSubjects" class="mb-3">
                        <template #first>
                            <b-form-select-option :value="null" disabled>-- Please select an option --
                            </b-form-select-option>
                        </template>
                    </b-form-select>
                </b-form-group>
                <b-form-group id="input-group-2" label="Grade" label-for="input-2">
                    <b-form-select v-model="value" :options="optionsGrades" class="mb-3">
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

            <b-modal v-model="addModal" id="modal-1" title="Add grade" hide-footer>
                <b-alert show variant="danger" v-if="errors.length > 0">
                  <span v-for="error in errors" :key="error" class="alert-link">
                     {{ error }}
                  </span>
                </b-alert>
                <b-form-group id="input-group-2" label="Registration Number" label-for="input-2">
                    <b-form-input
                        id="input-2"
                        v-model="registration_number"
                    ></b-form-input>
                </b-form-group>
                <b-form-group id="input-group-2" label="Subject" label-for="input-2">
                    <b-form-select v-model="subject" :options="optionsSubjects" class="mb-3">
                        <template #first>
                            <b-form-select-option :value="null" disabled>-- Please select an option --
                            </b-form-select-option>
                        </template>
                    </b-form-select>
                </b-form-group>
                <b-form-group id="input-group-2" label="Grade" label-for="input-2">
                    <b-form-select v-model="value" :options="optionsGrades" class="mb-3">
                        <template #first>
                            <b-form-select-option :value="null" disabled>-- Please select an option --
                            </b-form-select-option>
                        </template>
                    </b-form-select>
                </b-form-group>
                <b-button size="sm" variant="danger" @click="close">
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
            showModal: false,
            addModal: false,
            firstname: '',
            lastname: '',
            subject: '',
            value: '',
            subjId: '',
            selectedGender: '',
            registration_number: '',
            year: '',
            group: '',
            data: "",
            id: '',
            errors: [],
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
                    key: "subject_title",
                    label: "Subject",
                },
                {
                    key: "value",
                    label: "Grade",
                },
                "Actions"
            ],
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
                {value: 'Psychology', label: 'Psychology', text: 'Psychology'},
            ],
            optionsGrades: [
                {value: 1, label: '1', text: '1'},
                {value: 2, label: '2', text: '2'},
                {value: 3, label: '3', text: '3'},
                {value: 4, label: '4', text: '4'},
                {value: 5, label: '5', text: '5'},
                {value: 6, label: '6', text: '6'},
                {value: 7, label: '7', text: '7'},
                {value: 8, label: '8', text: '8'},
                {value: 9, label: '9', text: '9'},
                {value: 10, label: '10', text: '10'},
            ]
        };
    },
    methods: {
        addTable() {
            this.addModal = true;
            this.firstname = '';
            this.lastname = '';
            this.subject = '';
            this.value = '';
        },
        deleteRow(editable) {
            if(confirm("Do you really want to delete the grade?")) {
                editable.id = undefined;
                this.editable = Object.assign({}, editable.item);
                axios.delete('http://127.0.0.1:8000/grades/' + editable.item.id).then(response => {
                    this.students.splice(this.students.indexOf(editable.id), 1);
                    this.read();
                });
            }
        },
        closeModal() {
            this.addModal = false;
            this.registration_number = '';
        },
        onSubmit() {
            this.registration_number = this.editable.registration_number
            axios.get('/subjects/' + this.subject).then((data1) => {
                this.subjId = data1.data;
                axios.put('http://127.0.0.1:8000/grades/' + this.editable.id, {
                    registration_number: this.editable.registration_number,
                    subject_id: this.subjId,
                    value: this.value,
                })
                this.read();
                this.close();
            })
        },
        editTable(editable) {
            this.editable = Object.assign({}, editable.item);
            this.showModal = true;
        },
        close() {
            this.showModal = false;
        },
        onSubmitAdd() {
            this.errors = [];
            if (this.registration_number) {
                axios.get('/grades/' + this.registration_number).then((data1) => {
                    this.verify = data1.data;
                    if (this.verify === 0) {
                        this.errors.push('Valid registration number required.');
                    } else {
                        axios.get('/subjects/' + this.subject).then((data2) => {
                            this.subjId = data2.data;

                            axios.post('http://127.0.0.1:8000/grades/', {
                                registration_number: this.registration_number,
                                subject_id: this.subjId,
                                value: this.value,
                            })
                            this.read();
                            this.closeModal();
                            this.registration_number = ''
                            this.subject = ''
                            this.value = ''
                        })
                    }
                })
            }
            else
            {
                this.errors.push('Valid registration number required.');
            }
        },
        read() {
            axios.get('/grades').then(({data}) => {
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

