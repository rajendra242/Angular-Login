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
      path : 'userbookings',
      component : UserbookingsComponent
    },
    {
      path : 'real',
      component : RealComponent
    },
    {
      path :'mat',
      component : MatDialogExampleComponent

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
