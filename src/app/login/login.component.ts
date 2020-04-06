import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { AuthService } from '../auth.service';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  loginForm: FormGroup;
  jsonapi : any
  constructor(private router: Router, private http:HttpClient) {
    this.loginForm = new FormGroup({
      username: new FormControl('', Validators.required),
      password: new FormControl('', Validators.required)
    });
  }

  ngOnInit() {
    
  }

  loginUser(value) {
    this.http.get(`http://localhost/wordpress/wordpress/wp-json/custom-plugin/login?username=${value.username}&password=${value.password}`)
    .subscribe(data => {
      // this.jsonapi = data
      // console.log(this.jsonapi)
      this.jsonapi = data
       
      console.log("Success", this.jsonapi)
      this.router.navigate(['Home'], { state: value })
    },
    error => {
      console.error(" Error ", error)
    })
    
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
}
