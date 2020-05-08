import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
import { Post } from '../Post';
import { error } from 'protractor';
import { AuthService } from '../auth.service';
import { HttpHeaders } from '@angular/common/http';
import { Router } from '@angular/router';
import { Output, EventEmitter } from '@angular/core';
import { from } from 'rxjs';

@Component({
  selector: 'app-mat-dialog-example',
  templateUrl: './mat-dialog-example.component.html',
  styleUrls: ['./mat-dialog-example.component.scss']
})

export class MatDialogExampleComponent implements OnInit {
  appointmentbooking: FormGroup;
  // vlauedata: any;
  // DataPost = new Post()
  obj1: any;
  // error: any;
  // postData: any;
  api: any;
  // clear: any;
  // json;
  obj: any = [];
  @Output() send_data = new EventEmitter<object>();
  updateApi: any;
  alluser: any;
  // url = 'http://localhost/wordpress/wordpress/wp-json/custom-plugin/appointment-book';
  // api2 = `http://localhost/wordpress/wordpress/wp-admin/admin-ajax.php?id=25&check=67&name=sdfsdsd&phone=asdfsd&email=rathod%40123&description=hello&action=ea_final_appointment`
  // api3 = 'http://localhost/wordpress/wordpress/wp-admin/admin-ajax.php?action=ea_appointment&id=undefined'
  // userget : 'http://localhost/wordpress/wordpress/wp-admin/admin-ajax.php?location=1&service=1&worker=1&date=2020-04-18&end_date=2020-04-18&start=13%3A30&check=3ce21682fd&action=ea_res_appointment'


  // data: any = {};
  // httpClient: any;
  demo: any;

  isShow :boolean = false;
  constructor(private http: HttpClient, private _Auth: AuthService, private router: Router) {
    // console.log('router data', this.router.getCurrentNavigation().extras.state);
    // this.demo = this.router.getCurrentNavigation().extras.state;
    console.log("the demo is ====>", this.demo);
    // console.log('name',this.demo["name"])

    // this.obj[0] = (this.demo);
    // console.log('this is coming data', this.obj)

    this.appointmentbooking = new FormGroup({
      id: new FormControl('', Validators.required),
      name: new FormControl('', Validators.compose([
        Validators.required,
        Validators.maxLength(25),
        Validators.minLength(5),

      ])),
      phone: new FormControl('', Validators.compose([
        Validators.required,
        Validators.maxLength(10),
        Validators.minLength(10),
        // Validators.pattern('^(?=.*[0-9])')

      ])),
      email: new FormControl('', Validators.compose([
        Validators.required,
        Validators.pattern('^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$')

      ])),
      description: new FormControl('', [Validators.required]),

    });

  }

  ngOnInit() {
    this._Auth.teachermessage$
      .subscribe(
        message => {
          console.log('this is teacher masseage', message);
          this.demo = message;
          console.log('name', this.demo[0].name)
          this.obj = this.demo[0];
          console.log('this is object fome edite data', this.obj)
          // console.log('this is object fome edite data', this.obj[0]["name"])
        }
      )

     this._Auth.hide$
     .subscribe(
       hide =>{
         console.log('this is bool value', hide)
         this.isShow = hide;
       }
     ) 
  }
  BookAppointment(value) {
    const headers = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');

    console.log("book apoinment", value);

    this.appointmentbooking.reset();

    // console.log('this is new object', this.vlauedata);

    var userID = (localStorage.getItem("id"));

    this.api = `http://localhost/wordpress/wordpress/wp-json/custom-plugin/id?`
    console.log(this.api)

    return this.http.post(this.api, `name=${value.name}&email=${value.email}&phone=${value.phone}&userID=${userID}&description=${value.description}`
      , { headers, responseType: 'text' }).subscribe((data) => {
        this.obj1 = data;
        // console.log('this is api data ===>', this.obj);
        value.id = this.obj1;
        console.log("the user id is ====>", value);
        localStorage.setItem("prim_id", JSON.stringify(value.id));
        // this.router.navigate(['real'], { state: value})
        this.send_data.emit(value);
        // this.vlauedata.push(this.obj);
      },
        error => {
          console.log('error is', error)
        }
      );

  }
  updateapi(value) {
    this.isShow = !this.isShow
    alert("Update data")
    console.log("this is update id ====>", this.obj1)
    // console.log('this is second id =====>', id)
    value.id = this.obj1
    console.log(" chnaged data ", value)
    this.alluser = JSON.parse(localStorage.getItem('prim_id'))
    console.log("this is put id ===>", this.alluser)
    const headers = new HttpHeaders().set('Content-Type', 'application/x-www-form-urlencoded');
    this.updateApi = (`http://localhost/wordpress/wordpress/wp-json/custom-plugin/update?
    id=${this.alluser}`)

    return this.http.put(this.updateApi, `name=${value.name}&email=${value.email}&phone=${value.phone}&description=${value.description}`
      , { headers, responseType: 'text' }).subscribe((data) => {
        console.log('this is update data', data);
      })


    // localStorage.setItem("userid_prim", JSON.stringify(id));
    // this._Auth.editedata_put().subscribe((data)=>{
    //   console.log('this is update data ===>', data)
    // })

  }

}

