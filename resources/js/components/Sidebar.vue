<template>
    <div class="sidebar-container">
        <ul class="sidebar-navigation">
            <li class="header">Menu</li>
            <li>
                <router-link to="/" class="aa"><i class="fa fa-tachometer" aria-hidden="true"></i> DASHBOARD
                </router-link>
                <router-view></router-view>
            </li>
            <li>
                <i class="fa-solid fa-people-roof"></i>
                <router-link to="/classes" class="aa">CLASSES</router-link>
                <router-view></router-view>
            </li>
            <li>
                <i class="fa-solid fa-user-tie"></i>
                <router-link to="/professors" class="aa">PROFESSORS</router-link>
                <router-view></router-view>
            </li>
            <li>
                <i class="fa fa-users" aria-hidden="true"></i>
                <router-link to="/students" class="aa">STUDENTS</router-link>
                <router-view></router-view>
            </li>
            <li>
                <i class="fa fa-chalkboard-user" aria-hidden="true"></i>
                <router-link to="/absences" class="aa">ABSENCES</router-link>
                <router-view></router-view>
            </li>
            <li>
                <i class="fa fa-user-graduate" aria-hidden="true"></i>
                <router-link to="/grades" class="aa">GRADES</router-link>
                <router-view></router-view>
            </li>
        </ul>
    </div>

</template>

<script>

export default {
    name: "Sidebar"
}
</script>
