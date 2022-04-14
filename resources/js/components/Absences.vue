<template>
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-column">
            <Sidebar/>
        </div>
        <div class="my-container active-cont">
            <div class="row">
                <div class="col-lg-12 p-2">
                    <h1><i class="fa fa-user-tie" aria-hidden="true"></i> Absences </h1>
                    <hr/>
                </div>
            </div>
            <b-input-group prepend="Search:" class="mt-3">
                <b-form-input v-model="filter" placeholder="Filter table.."></b-form-input>
                <b-input-group-append>
                    <b-button><i class="fa-solid fa-magnifying-glass"></i></b-button>
<!--                    <b-button variant="outline-secondary" @click.prevent="addTable()"><i class="fa-solid fa-plus"></i>-->
<!--                    </b-button>-->
                </b-input-group-append>
            </b-input-group>
            <hr/>
            <b-table hover class="table align-middle" :per-page="perPage"
                     thead-class="bg-col text-white"
                     :filter="filter"
                     :fields="fields"
                     :current-page="currentPage"
                     :items="absences">
            </b-table>
            <b-pagination
                v-model="currentPage"
                :total-rows="absences.length"
                :per-page="perPage"
                page-class="customPage"
            ></b-pagination>
        </div>
    </div>
</template>

<script>
import Sidebar from './Sidebar'

export default {
    components: {
        Sidebar,
    },
    name: "Absences",
    data() {
        return {
            absences: [],
            perPage: 10,
            currentPage: 1,
            year: '',
            group: '',
            gender: '',
            data: "",
            filter: '',
            fields: [
                {
                    key: "registration_number",
                    label: "Registration Number",
                    // editable: true
                },
                {
                    key: "firstname",
                    label: "Firstname",
                    // editable: true
                },
                {
                    key: "lastname",
                    label: "Lastname",
                    editable: true
                },
                {
                    key: "number",
                    label: "Number of absences",
                    editable: true
                },
                // "Actions"
            ],
        }
    },
    methods: {
        read() {
            axios.get('/absences').then(({data}) => {
                this.absences = data;
            })
                .catch((err) => console.error(err));
        },

    },
    mounted() {
        this.read();
    },
};

</script>

