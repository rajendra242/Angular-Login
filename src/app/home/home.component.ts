import { Component, OnInit } from '@angular/core';
import  {Router } from '@angular/router';
import {MatDialog, MatDialogConfig} from "@angular/material";
import { AuthService } from '../auth.service';
import { MatDialogExampleComponent } from '../mat-dialog-example/mat-dialog-example.component';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {
  allUser = [];
	obj:any; 
	_Auth : AuthService
	allData:any	= {
		username: "",
		password: "",
	}
  constructor(private router:Router,private dialog: MatDialog) {
    console.log(this.router.getCurrentNavigation().extras.state);
    this.obj = this.router.getCurrentNavigation().extras.state;
    this.allData = this.obj;
   
   }

  ngOnInit() {
    this.allUser.push(this.allData);
    console.log(this.allUser)
  }
  bookappointment(){
    console.log('appointment boking model is opent')
    this.dialog.open(MatDialogExampleComponent);
    // this._Auth.initializeFomrGroup()


  }
}
