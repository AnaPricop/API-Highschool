<template>
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-column">
            <Sidebar/>
        </div>
        <div class="my-container active-cont">
            <div class="row">
                <div class="col-lg-12 p-2">
                    <h1><i class="fa fa-user-tie" aria-hidden="true"></i> Professors </h1>
                    <hr/>
                </div>
            </div>
            <b-input-group prepend="Search professor:" class="mt-3">
                <b-form-input v-model="filter" placeholder="Filter table.."></b-form-input>
                <b-input-group-append>
                    <b-button variant="outline-secondary"><i class="fa-solid fa-magnifying-glass"></i></b-button>
                    <b-button variant="outline-secondary" @click.prevent="addTable()"><i class="fa-solid fa-plus"></i>
                    </b-button>
                </b-input-group-append>
            </b-input-group>
            <hr/>
            <b-table hover class="table align-middle" :per-page="perPage"
                     thead-class="bg-col text-white"
                     :filter="filter"
                     :fields="fields"
                     :current-page="currentPage"
                     :items="professors">
                <template #cell(actions)="data">
                    <a @click.prevent="editTable(data)"><i class="fa-solid fa-pen-to-square"></i></a>
                </template>
            </b-table>
            <b-pagination
                v-model="currentPage"
                :total-rows="professors.length"
                :per-page="perPage"
                page-class="customPage"
            ></b-pagination>

            <b-modal v-model="showModal" id="modal-1" title="Edit professor" :key="data.id" hide-footer>
                <b-form-group id="input-group-2" label="Firstname" label-for="input-2">
                    <b-form-input
                        id="input-2"
                        v-model="firstname"
                        placeholder="Firstname"
                    ></b-form-input>
                </b-form-group>
                <b-form-group id="input-group-2" label="Lastname" label-for="input-2">
                    <b-form-input
                        id="input-2"
                        v-model="lastname"
                        placeholder="Lastname"
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

            <b-modal v-model="addModal" id="modal-1" title="Add a new professor" hide-footer>
                <b-form-group id="input-group-2" label="Firstname" label-for="input-2">
                    <b-form-input
                        id="input-2"
                        v-model="firstname"
                        placeholder="Firstname"
                    ></b-form-input>
                </b-form-group>
                <b-form-group id="input-group-2" label="Lastname" label-for="input-2">
                    <b-form-input
                        id="input-2"
                        v-model="lastname"
                        placeholder="Lastname"
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
                <b-form-group id="input-group-2" label="Subject" label-for="input-2">
                    <b-form-select v-model="subject" :options="optionsSubjects" class="mb-3">
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
        Sidebar,
    },
    name: "ProfessorsComponent",
    data() {
        return {
            professors: [],
            perPage: 10,
            currentPage: 1,
            firstname: '',
            lastname: '',
            gender: '',
            year: '',
            group: '',
            subject: '',
            subjId: "",
            profId: "",
            classId: "",
            data: "",
            filter: '',
            showModal: false,
            addModal: false,
            params: [],
            subject_id: '',
            class_id: '',
            professor_id: '',
            fields: [
                {
                    key: "id",
                    label: "id",
                },
                {
                    key: "firstname",
                    label: "Name",
                    sortable: true
                },
                {
                    key: "lastname",
                    label: "Lastname",
                    sortable: true
                },
                {
                    key: "gender",
                    label: "Gender",
                    editable: true
                },
                {
                    key: "year",
                    label: "Year",
                    sortable: true
                },
                {
                    key: "group",
                    label: "Group",
                    sortable: false
                },
                {
                    key: "subject_title",
                    label: "Subject",
                    sortable: true
                },
                "Actions"
            ],
            selectedOption: 0,
            actualOption: 0,
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
        }
    },
    methods: {
        read() {
            axios.get('/professors').then(({data}) => {
                this.professors = data;
            })
                .catch((err) => console.error(err));
        },
        onSubmit() {
            axios.put('http://127.0.0.1:8000/professors/' + this.data.id, {
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
        addTable() {
            this.addModal = true;
        },
        close() {
            this.showModal = false;
        },
        closeModal() {
            this.addModal = false;
        },
        onSubmitAdd() {
            axios.post('http://127.0.0.1:8000/add-professor', {
                firstname: this.firstname,
                lastname: this.lastname,
                gender: this.selectedGender
            }).then((response) => {
                this.profId = response.data;
                axios.get('/subjects/' + this.subject).then((data1) => {
                    this.subjId = data1.data;
                    axios.get('/classes/' + this.year + '/' + this.group).then((data2) => {
                        this.classId = data2.data;
                        console.log(this.subjId)
                        axios.post('http://127.0.0.1:8000/store-teaching', {
                            subject_id: this.subjId,
                            class_id: this.classId,
                            professor_id: this.profId
                        }).then((response) => {
                            this.read();
                            this.closeModal();
                            this.firstname = ''
                            this.lastname = ''
                            this.gender = ''
                            this.subject = ''
                            this.group = ''
                            this.year = ''
                        });
                    });
                });
            });

        },
    },
    mounted() {
        this.read();
    },
};
</script>

