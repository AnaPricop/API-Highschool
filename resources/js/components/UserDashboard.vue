<template>
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-column">
            <UserSidebar/>
        </div>
        <div class="my-container active-cont">
            <div class="row">
                <div class="col-lg-12">
                    <h1><i class="fa fa-tachometer" aria-hidden="true"></i> User Dashboard - Average: {{this.value}}</h1>
                    <hr/>
                </div>
            </div>
            <div class="row">
                <b-table stacked :items="items" :fields="column">
                    <b-td colspan="7" variant="secondary" class="text-right">
                        Total Rows: <b>5</b>
                    </b-td>
                </b-table>
            </div>
        </div>
    </div>

</template>

<script>
import UserSidebar from './UserSidebar'

export default {
    components: {
        UserSidebar
    },
    data() {
        return {
            students: [],
            column: [
                {
                    key: "subject_title",
                    label: "Subject"
                },
                {
                    key: "value",
                    label: "Grade"
                },
            ],
            thenum: '',
            thenum1: '',
            averageGrades: '',
            stringify: '',
            value: '',
            user_id: document.querySelector("meta[name='user-id']").getAttribute('content'),
            items: []
        }
    },
    methods: {
        make_requests_handler() {
            this.thenum = this.user_id.replace('student', '');
            this.thenum1 = this.thenum.replace('@gmail.com', '');
            console.log(this.thenum1)
            this.message = 'Requests in progress'

            axios.all([
                this.request_1(),
                this.request_2()
            ])
                .then(axios.spread((first_response, second_response) => {
                    this.items = first_response.data
                    this.averageGrades = JSON.stringify(second_response.data)
                    this.stringify = JSON.parse(this.averageGrades);
                    this.value = this.stringify[0]['value'].toString().slice(0, -3);
                }))
        },
        request_1() {
            return axios.get('/students-grades/' + this.thenum1)
        },
        request_2() {
            return axios.get('/average/' + this.thenum1)
        }
    },
    mounted() {
        this.make_requests_handler();
    },
    name: "Dashboard"
}
</script>

<style scoped>

</style>
