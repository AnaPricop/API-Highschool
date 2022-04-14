<template>
    <div>
        <div class="d-flex justify-content-between flex-wrap flex-column">
            <Sidebar/>
        </div>
        <div class="my-container active-cont">
            <div class="row">
                <div class="col-lg-12 p-2">
                    <h1><i class="fa fa-tachometer" aria-hidden="true"></i> Admin Dashboard</h1>
                    <hr/>
                </div>
            </div>
            <div class="row" style="padding-top:2%">
                <div class="col-md-6 col-lg-4">
                    <div class="wrimagecard wrimagecard-topimage">
                        <div class="wrimagecard-topimage_header">
                            <i class="fas fa-circle-info cardIcon"></i>
                        </div>
                        <div class="wrimagecard-topimage_title h-140" style="margin:0;overflow-y: auto;">
                            <h2 class="h4 text-center">
                                Informations
                            </h2>
                            <p style="margin:0;overflow-y: auto;" v-for="professor in professors">
                                Professors: {{ professor.value }}
                            </p>
                            <p style="margin:0;overflow-y: auto;" v-for="student in students_number">
                                Students: {{ student.value }}
                            </p>
                            <p style="margin:0;overflow-y: auto;" v-for="classes in classes">
                                Classes: {{ classes.value }}
                            </p>
                        </div>
                        <div class="card-action-bar">
                            <a class="float-right link">
                                <router-link to="/" class="a"> View Dashboard</router-link>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="wrimagecard wrimagecard-topimage">
                        <div class="wrimagecard-topimage_header">
                            <i class="fas fa-graduation-cap cardIcon"></i>
                        </div>
                        <div class="wrimagecard-topimage_title h-140" style="margin:0;overflow-y: auto;">
                            <h2 class="h4 text-center">
                                Top 3 Students
                            </h2>
                            <p style="margin:0;overflow-y: auto;" class="card-text" v-for="student in students"
                               :key="student.registration_number">
                                {{ student.firstname }} {{ student.lastname }} - Average: {{ student.value }}</p>
                        </div>
                        <div class="card-action-bar">
                            <a class="float-lg-none link">
                                <router-link to="/grades" class="aa"> View all students and their grades</router-link>
                            </a>
                            <router-view></router-view>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="wrimagecard wrimagecard-topimage">
                        <div class="wrimagecard-topimage_header">
                            <i class="fas fa-circle-exclamation cardIcon"></i>
                        </div>
                        <div class="wrimagecard-topimage_title h-140" style="margin:0;overflow-y: auto;">
                            <h2 class="h4 text-center">
                                Failing students
                            </h2>
                            <p style="margin:0;overflow-y: auto;" v-for="student in absences"
                               :key="student.registration_number">
                                {{ student.firstname }} {{ student.lastname }} - Absences: {{ student.number }}
                            </p>
                        </div>
                        <div class="card-action-bar">
                            <a class="float-right link">
                                <router-link to="/absences" class="a">View number of absences for every student
                                </router-link>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6" style="padding-bottom: 7%;">
                    <div class="box">
                        <apexchart type="bar" height="350" :options="chartOptions" :series="series"></apexchart>
                    </div>
                </div>
                <div class="col-md-6" style="padding-bottom: 7%;">
                    <div class="box">
                        <apexchart type="pie" height="350" :options="chartOptions1"
                                   :series="series1"></apexchart>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import Sidebar from './Sidebar'
import VueApexCharts from 'vue-apexcharts'

export default {
    components: {
        Sidebar,
        VueApexCharts
    },
    data() {
        return {
            students: [],
            absences: [],
            professors: [],
            students_number: [],
            subjects: [],
            value: '',
            classes: [],
            series: [{
                data: []
            }],
            aux: [],
            series1: [],
            chartOptions1: {
                chart: {
                    type: 'pie',
                    width: '100%',
                },
                plotOptions: {
                    stroke: {
                        colors: undefined
                    }
                },
                legend: {
                    position: "right",
                    offsetY: 10,
                    height: 150
                },
                labels: [],
                dataLabels: {
                    enabled: true,
                    formatter: function (val) {
                        return val.toFixed(1) + "%"
                    },
                    offsetY: -20,
                    style: {
                        fontSize: '12px',
                        colors: ["#263238"]
                    }
                },
                colors: [
                    "#90E47C", "#D8a48f", "#8DCEEA", "#7c90e4"
                ],
                title: {
                    text: "Pie-chart for grades",
                    align: 'left',
                    margin: 10,
                    floating: false,
                    style: {
                        fontSize: '20px',
                        fontWeight: 'bold',
                        fontFamily: undefined,
                        color: '#263238'
                    },
                },
            },
            chartOptions: {
                animation: false,
                chart: {
                    type: 'bar',
                    height: 380,
                    width: '100%',
                    stacked: true,
                },
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        dataLabels: {
                            position: 'top',
                        },
                        distributed: true
                    },
                },
                tooltip: {
                    enabled: false,
                    enabledOnSeries: undefined,
                    marker: {
                        show: false,
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function (val) {
                        return val + "%";
                    },
                    offsetY: -20,
                    style: {
                        fontSize: '12px',
                        colors: ["#263238"]
                    }
                },
                colors: [
                    "#90E47C", "#D8a48f", "#8DCEEA", "#7c90e4"
                ],
                xaxis: {
                    // categories: [],
                    position: 'top',
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                },
                yaxis: {
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false,
                    },
                    labels: {
                        show: false,
                        formatter: function (val) {
                            return val + "%";
                        }
                    }
                },
                legend: {
                    show: false
                }
            }
        }
    },
    methods: {
        read() {
            axios.get('/top-students').then(({data}) => {
                this.students = data;
            })
                .catch((err) => console.error(err));
            axios.get('/failing-students').then(({data}) => {
                this.absences = data;
            })
                .catch((err) => console.error(err));
            axios.get('/professors-number').then(({data}) => {
                this.professors = data;
            })
                .catch((err) => console.error(err));
            axios.get('/students-number').then(({data}) => {
                this.students_number = data;
            })
                .catch((err) => console.error(err));
            axios.get('/classes-number').then(({data}) => {
                this.classes = data;
            })
                .catch((err) => console.error(err));

            axios.get('/grades-chart').then(({data}) => {
                this.series = [{data: data.map(item => item.percentage)}]
                this.series1 = data.map(item => item.number)
                this.chartOptions1 = {
                    labels: data.map(item => item.value),
                };
            })
                .catch((err) => console.error(err));
        }
    },
    mounted() {
        this.read();
    },
    name: "Dashboard",
}
</script>

<style scoped>

</style>
