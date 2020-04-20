import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { LoginComponent } from './login/login.component';
import { UserbookingsComponent } from './userbookings/userbookings.component';
import { AdminComponent } from './admin/admin.component';
import { from } from 'rxjs';


const routes: Routes = [
    {
      path: 'Home',
      component: HomeComponent
    },
    {
      path :'login',
      component : LoginComponent
    },
    {
      path : 'userbookings',
      component : UserbookingsComponent
    }
    // {
    //   path: 'admin',
    //   component:AdminComponent
    // }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
