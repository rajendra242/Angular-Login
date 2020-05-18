import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { LoginComponent } from './login/login.component';
import { UserbookingsComponent } from './userbookings/userbookings.component';
import { MatDialogExampleComponent } from './mat-dialog-example/mat-dialog-example.component';
import { AdminComponent } from './admin/admin.component';
import { from } from 'rxjs';
import { AuthGuard } from './guards/auth.guard';
import { RealComponent } from './real/real.component';
import { NewUserComponent } from './new-user/new-user.component';
import { ForgetpassComponent } from './forgetpass/forgetpass.component';
import { NewappointmentComponent } from './newappointment/newappointment.component';


const routes: Routes = [

    
    {
      path: 'Home',
      component: HomeComponent,
      canActivate:[AuthGuard]

    },
    {
      path :'login',
      component : LoginComponent,
      
    },
    {
      path :'adminapp',
      component : NewappointmentComponent,
      
    },
    {
      path : 'userbookings',
      component : UserbookingsComponent,
      canActivate : [AuthGuard]
    },
    {
      path : 'real',
      component : RealComponent
    },
    {
      path :'mat',
      component : MatDialogExampleComponent

    },
    {
      path :'new',
      component : NewUserComponent

    },
    {
      path :'admin',
      component : AdminComponent

    },
    {
      path :'pass',
      component : ForgetpassComponent

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
