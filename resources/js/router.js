import Vue from "vue";

import VueRouter from "vue-router";
import Dashboard from "./components/Dashboard";
import Professors from "./components/ProfessorsComponent"
import Students from "./components/StudentsTable"
import Grades from "./components/StudentsGrades"
import Classes from "./components/ClassesTable"
import UserDashboard from "./components/UserDashboard"
import Absences from "./components/Absences";

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [
        {
            path: '/',
            components:{
                a: Dashboard,
                b: UserDashboard
            }
        },
        {
            path: '/professors',
            components: {
                a: Professors
            }
        },
        {
            path: '/students',
            components: {
                a: Students
            }
        },
        {
            path: '/grades',
            components: {
                a: Grades
            }
        },
        {
            path: '/classes',
            components: {
                a: Classes
            }
        },
        {
            path: '/absences',
            components: {
                a: Absences
            }
        }
    ]
});
export default router;
