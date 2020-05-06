import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { MatDialog, MatDialogConfig } from "@angular/material";
import { AuthService } from '../auth.service';
import { MatDialogExampleComponent } from '../mat-dialog-example/mat-dialog-example.component';
import { HttpClient } from '@angular/common/http';
import { HttpHeaders } from '@angular/common/http';

import { error } from 'protractor';
@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {
  allUser = [];
  obj: any;
  bookings: any;
  allData: any = {
    username: "",
    password: "",
  }
  response: any = {
    name: ' ',
    email: '',
    phone: ''
  }
  namesearch: string = "";

  employees: any = [
    {
      code: '001',
      name: 'rajendrasinh',
      gender: 'male',
      salary: 55000
    },
    {
      code: '002',
      name: 'mohit',
      gender: 'male',
      salary: 60000
    },
    {
      code: '003',
      name: 'kavita patel',
      gender: 'female',
      salary: 55000
    },
    {
      code: '004',
      name: 'mangula ramani',
      gender: 'female',
      salary: 55000
    },
  ]
  constructor(private router: Router, private dialog: MatDialog, private _Auth: AuthService, private http: HttpClient) {
    console.log('router data', this.router.getCurrentNavigation().extras.state);
    this.obj = this.router.getCurrentNavigation().extras.state;
    this.allData = this.obj;
    console.log('this is alldata', this.allData)

    if (this.allData != null) {
      console.log('this is user id ====>', this.allData)
    } else {
      console.log('this is not proper way')
    }
  }

  ngOnInit() {
    this.allUser.push(this.allData);
    console.log('user data', this.allUser)
    // this.Lodash();
  }
  // Lodash() {
  //   const _ = require("lodash")
  //   let arr = ['rajendrasinh', 'mohit', 'parth', 'pratik', 'jay'];

  //   let fl = _.first(arr);
  //   let ll = _.last(arr);
  //   let chunk = _.chunk(arr);
  //   let other = _.concat(arr,2,[3]);
  //   let difrence = _.difference([2, 1], [2, 3]);

  //   console.log('this is 1st element of array', fl)
  //   console.log('this is 2st element of array', ll)
  //   console.log('this is cunked array',chunk);
  //   console.log('this is concat array', other);
  //   console.log('this is defreent array', difrence);
  // }


  bookappointment() {
    console.log('appointment boking model is opent')
    this.dialog.open(MatDialogExampleComponent);
  }


  logout() {
    this._Auth.logout().subscribe((res) => {
      console.log('user logout');
    })
  }


  SeeYourAppointments() {
    var demo = JSON.parse(localStorage.getItem("id"));
    console.log("the id is ====>", demo);

    this._Auth.Dispalyappointment(demo).subscribe((res) => {
      this.obj = res
      console.log('server response', this.obj)
      this.router.navigate(['userbookings'], { state: this.obj })
    }, (err) => {
      console.log("the errror is ==>", err);
    });

    this.bookings = demo;

  }

  RealTime() {
    console.log('routning to real plese wait');
    this.router.navigate(['real']);
  }
}
