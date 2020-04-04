import { Component, OnInit } from '@angular/core';
import  {Router } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {
  allUser = [];
	obj:any; 
	
	allData:any	= {
		username: "",
		password: "",
	}
  constructor(private router:Router) {
    console.log(this.router.getCurrentNavigation().extras.state)
    this.obj = this.router.getCurrentNavigation().extras.state;
    this.allData = this.obj;
   
   }

  ngOnInit() {
    this.allUser.push(this.allData);
    console.log(this.allUser)
  }

}
