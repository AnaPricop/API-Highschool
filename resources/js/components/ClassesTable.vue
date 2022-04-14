<template>
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-column">
            <Sidebar/>
        </div>
        <div class="my-container active-cont">
            <div class="row">
                <div class="col-lg-12 p-2">
                    <h1><i class="fa fa-user-tie" aria-hidden="true"></i> Classes </h1>
                    <hr/>
                </div>
            </div>
            <b-table hover class="table align-middle" :per-page="perPage"
                     thead-class="bg-col text-white"
                     :fields="fields"
                     :current-page="currentPage"
                     :items="classes">
            </b-table>
            <b-pagination
                v-model="currentPage"
                :total-rows="classes.length"
                :per-page="perPage"
                page-class="customPage"
            ></b-pagination>

            <b-modal v-model="showModal" id="modal-1" title="Edit Table" :key="data.id" hide-footer>
                <b-form-group id="input-group-2" label="Yeae" label-for="input-2">
                    <b-form-input
                        id="input-2"
                        v-model="year"
                        placeholder="firstnamePlaceholder"
                    ></b-form-input>
                </b-form-group>
                <b-form-group id="input-group-2" label="Group" label-for="input-2">
                    <b-form-select v-model="group" :options="options" class="mb-3">
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
        </div>
    </div>
</template>

<script>
import Sidebar from './Sidebar'

export default {
    components: {
        Sidebar,
    },
    name: "ExampleComponent",
    data() {
        return {
            classes: [],
            perPage: 10,
            currentPage: 1,
            year: '',
            group: '',
            gender: '',
            data: "",
            addModal: false,
            showModal: false,
            formFields: {
                firstname: '',
                lastname: '',
                gender: '',
                year: '',
                group: '',
                subject_title: '',
            },
            fields: [
                {
                    key: "id",
                    label: "id",
                    // editable: true
                },
                {
                    key: "year",
                    label: "Year",
                    editable: true
                },
                {
                    key: "group",
                    label: "Group",
                    editable: true
                },
                // "Actions"
            ],
            selectedOption: 0,
            actualOption: 0,
            selected: null,
            options: [
                {value: 'A', label: 'group', text: 'A'},
                {value: 'B', label: 'group', text: 'B'},
                {value: 'C', label: 'group', text: 'C'},
                {value: 'D', label: 'group', text: 'D'},
            ]

        }
    },
    methods: {
        read() {
            axios.get('/classes').then(({data}) => {
                //console.log(data)
                this.classes = data;
            })
                .catch((err) => console.error(err));
        },
        onSubmit() {
            axios.put('http://127.0.0.1:8000/classes/' + this.data.id, {
                year: this.year,
                group: this.group
            })
            console.log(this.data.id)
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
    },
    mounted() {
        this.read();
    },
};

</script>

