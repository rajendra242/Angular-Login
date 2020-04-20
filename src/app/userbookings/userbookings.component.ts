import { Component, OnInit } from '@angular/core';
import { AuthService } from '../auth.service';
import { HttpClient } from '@angular/common/http';
import  {Router } from '@angular/router';

@Component({
  selector: 'app-userbookings',
  templateUrl: './userbookings.component.html',
  styleUrls: ['./userbookings.component.scss']
})
export class UserbookingsComponent implements OnInit {
  
  routerdata:any ={
    // id : '',  
    name :'',
    email : '', 
    phone : ''
  }
  routerdata1:any={
    
  }
  // _Auth : AuthService;
  constructor(private router : Router, private http : HttpClient, private _Auth : AuthService) { 
    console.log('this is routing data',this.router.getCurrentNavigation().extras.state);
    this.routerdata = this.router.getCurrentNavigation().extras.state
    // console.log('this is api data router data',this.router.getCurrentNavigation().extras.state);
  }

  ngOnInit() {
    this.display();
  }
  
  display(){
      var demo = JSON.parse(localStorage.getItem("id"));
      console.log("the id is ===>", demo)
      this.routerdata1 = demo;


  }

}
