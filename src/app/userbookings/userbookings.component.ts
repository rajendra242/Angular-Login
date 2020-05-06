import { Component, OnInit } from '@angular/core';
import { AuthService } from '../auth.service';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';

@Component({
  selector: 'app-userbookings',
  templateUrl: './userbookings.component.html',
  styleUrls: ['./userbookings.component.scss']
})
export class UserbookingsComponent implements OnInit {

  userdata: any = [];
  demo = {
    'name': '',
    'email': '',
    'phone ': '',
    'description': ''
  }
  routerdata1: any = {

  }
  nameFind: string = "";
  productArr = [
    {
      sno: 1,
      name: 'Rajendrasinh',
      salary: '12000',
      role: 'developer'
    },
    {
      sno: 2,
      name: 'mohit',
      salary: '520000',
      role: 'developer'
    },
    {
      sno: 3,
      name: 'prince',
      salary: '32000',
      role: 'full-stack'
    },
    {
      sno: 4,
      name: 'tanvi',
      salary: '52000',
      role: 'full-stack'
    },
    {
      sno: 5,
      name: 'kaviya',
      salary: '52000',
      role: 'full-stack'
    },
    {
      sno: 6,
      name: 'jay',
      salary: '52000',
      role: 'designer'
    },
    {
      sno: 7,
      name: 'parth',
      salary: '52000',
      role: 'developer'
    }
  ]
  alldata: any;
  constructor(private router: Router, private http: HttpClient, private _Auth: AuthService) {
    console.log('this is routing data', this.router.getCurrentNavigation().extras.state);
    // this.userData.push(this.router.getCurrentNavigation().extras.state)
    this.userdata = this.router.getCurrentNavigation().extras.state
    this.router.navigate(['real'],{state : this.userdata});
    // console.log('this is api data router data',this.router.getCurrentNavigation().extras.state);
  }

  ngOnInit() {
    this.display();
    console.log(this.nameFind)
  }

  display() {
    var demo = JSON.parse(localStorage.getItem("id"));
    console.log("the id is ===>", demo)
    this.routerdata1 = demo;
  }


}
