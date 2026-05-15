import { createBrowserRouter } from 'react-router';
import { Home } from './pages/Home';
import { Login } from './pages/Login';
import { StudentDashboard } from './pages/StudentDashboard';
import { TeacherDashboard } from './pages/TeacherDashboard';
import { AdminDashboard } from './pages/AdminDashboard';
import { NotFound } from './pages/NotFound';

export const router = createBrowserRouter([
  {
    path: '/',
    Component: Home,
  },
  {
    path: '/login',
    Component: Login,
  },
  {
    path: '/dashboard/student',
    Component: StudentDashboard,
  },
  {
    path: '/dashboard/teacher',
    Component: TeacherDashboard,
  },
  {
    path: '/dashboard/admin',
    Component: AdminDashboard,
  },
  {
    path: '*',
    Component: NotFound,
  },
]);
