import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, UrlTree } from '@angular/router';
import { Observable } from 'rxjs';
import { Router } from '@angular/router';
import { AuthService } from '../auth.service';


@Injectable({
  providedIn: 'root'
})
export class AuthGuard implements CanActivate {
  user : any
  
  constructor(private router: Router, private _Auth : AuthService) {
     this.user = JSON.parse(localStorage.getItem('value'))
    console.log('this is user name',this.user)
  }
  // userRole:'admin'
  canActivate(
    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree | any {
        // if(this._Auth.login(this.user)){
        //     return true;
        // }else if(){

        // }
        // else{
        //   alert('you not have to right a home page');
        //   this.router.navigate(['login']);
        // }
        // if(this.user == "root"){
        //     // this.router.navigate(['Home']);
        //     return true;
            
        // }else{
        //   alert('you are not have to parmission to home page');
        //   this.router.navigate(['login'])
        // }
        if(this._Auth.isHomeright()){
          return true;
        }
        else{
          alert ('u have not go to home page directly plze login')
          this.router.navigate(['login'])
        }
  }

}
