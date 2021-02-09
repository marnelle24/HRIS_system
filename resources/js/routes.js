
import Dashboard from './dashboard/IndexDashboard.vue';
import TimeSheet from './users/IndexUsers.vue';

export const routes = [
    {
        name: 'dashboard',
        path: '/',
        component: Dashboard
    },
    {
        name: 'timesheet',
        path: '/timesheet',
        component: TimeSheet
    }
];