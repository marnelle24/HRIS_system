import AllHolidays from './components/AllHolidays.vue';
import AddHoliday from './components/AddHoliday.vue';
import EditHoliday from './components/EditHoliday.vue';
import Dashboard from './components/Dashboard.vue';
import Register from './components/Register.vue';
import Login from './components/Login.vue';

import Time from './components/Time.vue';
import Project from './components/Project.vue';
import Client from './components/Client.vue';
import Team from './components/Team.vue';


export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllHolidays
    },
    {
        name: 'add',
        path: '/add',
        component: AddHoliday
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditHoliday
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard
    },
    {
        path: '/time',
        name: 'time',
        component: Time
    },
    {
        path: '/project',
        name: 'project',
        component: Project
    },
    {
        path: '/client',
        name: 'client',
        component: Client
    },
    {
        path: '/team',
        name: 'team',
        component: Team
    }
];