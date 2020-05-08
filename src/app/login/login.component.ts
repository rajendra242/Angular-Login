import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { AuthService } from '../auth.service';
import { HttpClient } from '@angular/common/http';
import { AuthGuard } from '../guards/auth.guard';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  loginForm: FormGroup;
  jsonapi: any
  constructor(private router: Router, private http: HttpClient, private _Auth: AuthService) {
    this.loginForm = new FormGroup({
      username: new FormControl('', Validators.required),
      password: new FormControl('', Validators.required)
      
    });
  }

  ngOnInit() {

  }
  Remeber(value){
    alert(value.username);
  }
  loginUser(value) {
    this._Auth.login(value).subscribe((data) => {
      console.log('this is data form server', data)
      JSON.stringify(data);
      this.jsonapi = data;

      console.log("Success", this.jsonapi)
      this.router.navigate(['Home'])

      if (this.jsonapi != null) {
        console.log('this is loged user ID =====>', this.jsonapi.ID)
        localStorage.setItem("id", JSON.stringify(this.jsonapi.ID));
        localStorage.setItem('user_login', JSON.stringify(this.jsonapi.data.user_login))
        // this.router.navigate(['Home'], { state: value })
      } else {
        console.log('id not found')
      }
    },
      error => {
        console.error(" Error ", error)
      })
      
    // })
    // this.http.get(`http://localhost/wordpress/wordpress/wp-json/custom-plugin/login?username=${value.username}&password=${value.password}`)
    // .subscribe(data => {
    //   // this.jsonapi = data
    //   // console.log(this.jsonapi)
    //   this.jsonapi = data

    //   console.log("Success", this.jsonapi)
    //   this.router.navigate(['Home'], { state: value })

    //   if (this.jsonapi != null) {
    //     console.log('this is loged user ID =====>',this.jsonapi.ID)
    //     localStorage.setItem("id", JSON.stringify(this.jsonapi.ID));
    //     localStorage.setItem('localobj', JSON.stringify(this.jsonapi))
    //     this.router.navigate(['Home'], {state :value})
    //   }else{
    //     console.log('id not found')
    //   }
    // },
    // error => {
    //   console.error(" Error ", error)
    // })
    // this._auth.getUser().subscribe((res) => {
    //   console.log("the response is ====", res)
    // }, (err) => {
    //   console.log("the err is ===>", err)
    // })
    // if (value.username == this.jsonapi)  {
    //   console.log(value);
    //   this.router.navigate([''], { state: value })
    // } else {
    //   console.log('username and password is worng')
    // }

  }
  NewUser(){
    console.log('new form')
    this.router.navigate(['new']);
  }
}
