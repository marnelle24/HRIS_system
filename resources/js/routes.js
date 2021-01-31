import AllTimesheets from './timesheets/AllTimesheets.vue';
import AddTimesheets from './timesheets/AddTimesheets.vue';
import EditTimesheets from './timesheets/EditTimesheets.vue';
import IndexTimesheets from './timesheets/indexTimesheets.vue';
import IndexProjects from './projects/indexProjects.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: IndexTimesheets
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
    }
];