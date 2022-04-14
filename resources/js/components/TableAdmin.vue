<template>
<!--    <div class="table-responsive">-->

<!--        <table class="table dashboard">-->
<!--            <tr v-for="professor in professors">-->
<!--                <td>{{ professor.nume }}</td>-->
<!--                <td>{{ professor.prenume }}</td>-->
<!--            </tr>-->
<!--        </table>-->
<!--    </div>-->
<!--    <table class="table">-->
<!--        <thead>-->
<!--        <tr>-->
<!--            <th><abbr title="Name">Name</abbr></th>-->
<!--            <th><abbr title="Lastname">Lastname</abbr></th>-->
<!--            <th><abbr title="Gender">Gender</abbr></th>-->
<!--        </tr>-->
<!--        </thead>-->
<!--        <tbody>-->
<!--                    <tr v-for="professor in professors">-->
<!--                        <td>{{ professor.nume }}</td>-->
<!--                        <td>{{ professor.prenume }}</td>-->
<!--                        <td>{{ professor.gen }}</td>-->
<!--                    </tr>-->
<!--        </tbody>-->
<!--    </table>-->
</template>
<script>
export default {
    data() {
        return {
            professors: [],
        }
    },
    methods: {

        read() {
            axios.get('/users/profesori').then(({ data }) => {
                //console.log(data)
                this.professors= data;

            })
                .catch((err) => console.error(err));
        },
    },
    mounted() {
        this.read();
    }
}
</script>
