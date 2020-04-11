import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
import { Post } from '../Post';
import { error } from 'protractor';
import { AuthService } from '../auth.service';
import { HttpHeaders } from '@angular/common/http';

@Component({
  selector: 'app-mat-dialog-example',
  templateUrl: './mat-dialog-example.component.html',
  styleUrls: ['./mat-dialog-example.component.scss']
})

export class MatDialogExampleComponent implements OnInit {
  appointmentbooking: FormGroup;
  DataPost = new Post()
  error: any;
  postData: any;
  api: any;
  json;
  // url = 'http://localhost/wordpress/wordpress/wp-json/custom-plugin/appointment-book';
  // api2 = `http://localhost/wordpress/wordpress/wp-admin/admin-ajax.php?id=25&check=67&name=sdfsdsd&phone=asdfsd&email=rathod%40123&description=hello&action=ea_final_appointment`
  // api3 = 'http://localhost/wordpress/wordpress/wp-admin/admin-ajax.php?action=ea_appointment&id=undefined'


  httpOptions = { 
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
      'Authorization': 'Basic ' + btoa('username:password')
    })
    
  };
  constructor(private http: HttpClient, private _Auth: AuthService) {
    this.appointmentbooking = new FormGroup({
      id : new FormControl('', Validators.required),
      check : new FormControl('', Validators.required),
      Name: new FormControl('', Validators.required),
      Phone: new FormControl('', Validators.required),
      Email: new FormControl('', Validators.required),
      discription: new FormControl('', Validators.required),
      action : new FormControl('ea_final_appointment',Validators.required)
    });

  }

  ngOnInit() {
  }
  BookAppointment(value) {
    this.api = `http://localhost/wordpress/wordpress/wp-admin/admin-ajax.php?
    id=${value.id}&check=${value.check}&
    name=${value.Name}&phone=${value.Phone}&
    email=${value.Email}&discription=${value.discription}
    &action=${'ea_final_appointment'}`
    this.postData = value
    console.log(this.api)
    this.http.post(this.api, value).toPromise().then((data: any) => {
      console.log('this is my data in ts file', value)
      this.json = JSON.stringify(data.json)
      console.log(data.json)
    });


    //   this.http.get(`http://localhost/wordpress/wordpress//wp-json/wp/v2/pages?slug=Appointment
    //   &Name =${'value.name'}
    //   &Phone=${'value.phone'}
    //   &EMail =${'value.email'}
    //   &Description =${'value.Discription'}`)
    //   .subscribe(data => {
    //     console.log("Success", data)
    //     // this.router.navigate(['Home'], { state: value })
    //   },
    //   error => {
    //     console.error(" Error ", error)
    //   })

    // console.log("the value is ====>", value);

    // return this._Auth.createpost(value).subscribe(
    //   data => this.DataPost.push(data),
    //   error => this.error = error,

    // );
  }
}

