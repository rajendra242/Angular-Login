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
  obj : any;
  error: any;
  postData: any;
  api: any;
  json;
  // url = 'http://localhost/wordpress/wordpress/wp-json/custom-plugin/appointment-book';
  // api2 = `http://localhost/wordpress/wordpress/wp-admin/admin-ajax.php?id=25&check=67&name=sdfsdsd&phone=asdfsd&email=rathod%40123&description=hello&action=ea_final_appointment`
  // api3 = 'http://localhost/wordpress/wordpress/wp-admin/admin-ajax.php?action=ea_appointment&id=undefined'
  // userget : 'http://localhost/wordpress/wordpress/wp-admin/admin-ajax.php?location=1&service=1&worker=1&date=2020-04-18&end_date=2020-04-18&start=13%3A30&check=3ce21682fd&action=ea_res_appointment'

  
  data: any;
  httpClient: any;
  constructor(private http: HttpClient, private _Auth: AuthService) {
    this.appointmentbooking = new FormGroup({
      // id : new FormControl('', Validators.required),
      // check : new FormControl('', Validators.required),
      name: new FormControl('', [Validators.required]),
      phone: new FormControl('', [Validators.required]),
      email: new FormControl('', [Validators.required]),
      description: new FormControl('', [Validators.required]),
      // userID : new FormControl ('',[Validators.required]),
      // action : new FormControl('wp_ea_appointment',Validators.required)
    });

  }

  ngOnInit() {
  }
  BookAppointment(value) {
     const  headers = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');

    console.log("book apoinment", value);
    var userID = (localStorage.getItem("id"));

    this.api = `http://localhost/wordpress/wordpress/wp-json/custom-plugin/id`
   

    console.log(this.api)

    return this.http.post(this.api,`name=${value.name}&email=${value.email}&phone=${value.phone}&userID=${userID}&description=${value.description}`
    ,{headers, responseType: 'text' }).subscribe( data => {
        this.obj = data;
        console.log('this is api data ===>',this.obj);
      },
      error =>{
        console.log('error is', error)
      }
      );



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

