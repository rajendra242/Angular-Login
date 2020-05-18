import { Component, OnInit } from '@angular/core';
import { FormControl, Validators, FormGroup } from '@angular/forms';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { AuthService } from '../auth.service';


@Component({
  selector: 'app-new-user',
  templateUrl: './new-user.component.html',
  styleUrls: ['./new-user.component.scss']
})
export class NewUserComponent implements OnInit {
  newuser: FormGroup;
  addnew: any;
  constructor(private http: HttpClient, private _Auth: AuthService) {
    this.newuser = new FormGroup({
      user_login: new FormControl('', Validators.compose([
        Validators.required,
        Validators.maxLength(25),
        Validators.minLength(5),

      ])),
      user_email: new FormControl('', Validators.compose([
        // Validators.required,
        // Validators.maxLength(10),
        // Validators.minLength(10),
        // Validators.pattern('^(?=.*[0-9])')

      ])),
      user_nicename: new FormControl('', Validators.compose([
        // Validators.required,
        // Validators.pattern('^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$')

      ])),
      user_pass: new FormControl('', [Validators.required]),
      display_name: new FormControl('', [Validators.required]),
      user_registered: new FormControl('', [Validators.required]),

    });

  }

  ngOnInit() {
  }

  Addnew(value) {
    console.log("This is new user email======>",value.user_email);
    this._Auth.new_user_mail(value).subscribe((data) => {
      console.log("====> Mail send it",data)
    })
    // this._Auth.New(value).subscribe((data) => {
    //   console.log('this is data form server', data)
    //   JSON.stringify(data);
    //   this.addnew = data;
    // })
    const headers = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    this.addnew = `http://localhost/wordpress/wordpress/wp-json/custom-plugin/newuser?`;
    // console.log(this.addnew);
    return this.http.post(this.addnew, `user_login=${value.user_login}&user_pass=${value.user_pass}
    &user_nicename=${value.user_nicename}
    &user_email=${value.user_email}
    &user_registered=${value.user_registered}
    &display_name=${value.display_name}`, { headers, responseType: 'text' })
      .subscribe((data) => {
        console.log('this is new datapost ====>', data);
      })


  }
 
}
