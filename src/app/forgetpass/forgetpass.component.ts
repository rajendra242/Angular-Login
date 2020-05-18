import { Component, OnInit } from '@angular/core';
import { AuthService } from '../auth.service';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { HttpClient, HttpHeaders } from '@angular/common/http';
@Component({
  selector: 'app-forgetpass',
  templateUrl: './forgetpass.component.html',
  styleUrls: ['./forgetpass.component.scss']
})
export class ForgetpassComponent implements OnInit {
  passwords: FormGroup;

  constructor(private _Auth : AuthService, private http : HttpClient) { 
    this.passwords = new FormGroup({
      email: new FormControl('', Validators.required),
      password : new FormControl('',Validators.required)
    });
  }

  ngOnInit() {
  }
  pass(value){
    // var resetpass = localStorage.setItem('resetpass',JSON.stringify(value.email))
    // console.log('this is new id password',value.email);
    // this._Auth.password(value).subscribe((req)=>{
    //   console.log(req);
    // })
    const headers = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    var pass = `http://localhost/wordpress/wordpress/wp-json/custom-plugin/forgotpass?user_email=${value.email}`
    console.log(value.password);
    return this.http.put(pass,`user_pass=${value.password}`, { headers, responseType: 'text' }).subscribe((data)=>{
      console.log("this is update data=====>",data);
    })
  }
}
