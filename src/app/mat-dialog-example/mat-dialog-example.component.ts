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
  // userget : 'http://localhost/wordpress/wordpress/wp-admin/admin-ajax.php?location=1&service=1&worker=1&date=2020-04-18&end_date=2020-04-18&start=13%3A30&check=3ce21682fd&action=ea_res_appointment'

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
      name: new FormControl('', [Validators.required]),
      phone: new FormControl('', [Validators.required]),
      email: new FormControl('', [Validators.required]),
      discription: new FormControl('', [Validators.required]),
      action : new FormControl('ea_final_appointment',Validators.required)
    });

  }

  ngOnInit() {
  }
  BookAppointment(value) {
    console.log("book apoinment", value);
    
    this.api = `http://localhost/wordpress/wordpress/wp-admin/admin-ajax.php?
    id=${value.id}&check=${value.check}&
    name=${value.name}&phone=${value.phone}&
    email=${value.email}&discription=${value.discription}&
    action=${'ea_final_appointment'}`
    this.postData = value
    console.log(this.api)
    this.http.post(this.api, value).toPromise().then((data: any) => {
      console.log('this is my data in ts file', value)
      this.json = JSON.stringify(data.json);
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
    //   console.log(this.DataPost)
    
    //   return this._Auth.bookingappointment().subscribe(
    //     data => this.DataPost.push(data)
    //   );
     
    // );
// =====================imoortant=====================
    // this._Auth.Bookingappointment(value).subscribe((res) => {
    //   console.log("the book apoinement res ===>", res);
    //   this.json = JSON.stringify(res)
    // }, (err) => {
    //   console.log("the err is ===>", err);
    // })
  
  }
}

 