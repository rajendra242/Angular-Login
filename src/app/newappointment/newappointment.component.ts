import { Component, OnInit } from '@angular/core';
import { AuthService } from '../auth.service';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';


@Component({
  selector: 'app-newappointment',
  templateUrl: './newappointment.component.html',
  styleUrls: ['./newappointment.component.scss']
})
export class NewappointmentComponent implements OnInit {
  parent: any = [];
  pending : any = [];
  confirmed : any = [];
  cancelled : any = [];


  constructor(private http: HttpClient, private _Auth: AuthService, private router: Router) {
    console.log('router data', this.router.getCurrentNavigation().extras.state);
    this.parent = this.router.getCurrentNavigation().extras.state;
    // console.log("this is filter data ===>")
    
    this.parent.forEach((element) => {

      if (element.status == 'confirmed') {
        this.confirmed.push(element)
      } else if (element.status == 'pending') {
        this.pending.push(element)
      } else if (element.status == 'cancelled') {
        this.cancelled.push(element)
      }

    });
    console.log("this is confiemed =====>",this.confirmed);
    console.log("this pending ====>",this. pending);
    console.log("this is cancel ====>",this.cancelled )


  }

  ngOnInit() {
    // this.confirm();
  }

  confirm() {
    this._Auth.status_confirm().subscribe((data) => {
      console.log("this is confirmdata =====>", data)
      // this.parent.push(data);
      console.log("Booked Data Array====>", this.parent)

    })
  }

}
