
import IndexDashboard from './dashboard/IndexDashboard.vue';
import AllTimesheets from './timesheets/AllTimesheets.vue';
import AddTimesheets from './timesheets/AddTimesheets.vue';
import EditTimesheets from './timesheets/EditTimesheets.vue';
import IndexTimesheets from './timesheets/IndexTimesheets.vue';
import IndexProjects from './projects/IndexProjects.vue';
import IndexUsers from './users/IndexUsers.vue';

export const routes = [
    {
        name: 'dashboard',
        path: '/',
        component: IndexDashboard
    },
    {
        name: 'projects',
        path: '/projects',
        component: IndexProjects
    },
    {
        name: 'add',
        path: '/add',
        component: AddTimesheets
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditTimesheets
    },
    {
        name: 'timesheet',
        path: '/timesheet',
        component: IndexTimesheets
    },
    {
        name: 'users',
        path: '/users',
        component: IndexUsers
    }
];