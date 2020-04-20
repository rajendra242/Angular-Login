import { Component, OnInit } from '@angular/core';
import  {Router } from '@angular/router';
import {MatDialog, MatDialogConfig} from "@angular/material";
import { AuthService } from '../auth.service';
import { MatDialogExampleComponent } from '../mat-dialog-example/mat-dialog-example.component';
import { HttpClient } from '@angular/common/http';
@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {
  allUser = [];
	obj:any; 
	bookings : any;
	allData:any	= {
		username: "",
    password: "",
  }
  response :any ={
    name: '',
    email : '',
    phone :''
  }
  constructor(private router:Router,private dialog: MatDialog, private _Auth : AuthService, private http : HttpClient) {
    console.log('router data',this.router.getCurrentNavigation().extras.state);
    this.obj = this.router.getCurrentNavigation().extras.state;
    this.allData = this.obj;
    console.log('this is alldata', this.allData)

    if (this.allData != null ) {
      console.log('this is user id ====>',this.allData)
    }else{
      console.log('this is not proper way')
    }
   }     

  ngOnInit() {
    this.allUser.push(this.allData);
    console.log('user data',this.allUser)
  }
  bookappointment(){
    console.log('appointment boking model is opent')
    this.dialog.open(MatDialogExampleComponent);
    // this._Auth.initializeFomrGroup()
  }
  SeeYourAppointments(){
    // console.log('booking is display like this ===>')
    // this.http.get('http://localhost/wordpress/wordpress/wp-json/custom-plugin/userbookingappointments').subscribe((data)=>{
      // console.log('this is a booking data', data)
      // this.router.navigate(['userbookings'], {state : data})
      // this.bookings = data;
    // })
    var demo = JSON.parse(localStorage.getItem("id"));
    console.log("the id is ====>", demo);

    this._Auth.Dispalyappointment(demo).subscribe((res) => {
      console.log("the data is ===>", res);
      // this.response = res
      // console.log('this is response ====>' ,this.response)
      this.router.navigate(['userbookings'], {state : res})
    }, (err) => { 
      console.log("the errror is ==>", err);
        });
        // this.router.navigate(['userbookings'], {state : demo})
      
        this.bookings = demo; 
  }
}
