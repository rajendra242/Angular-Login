import { Component, OnInit } from '@angular/core';
import { AuthService } from '../auth.service';
import { Router } from '@angular/router';
import { HttpClient } from '@angular/common/http';
import { Message } from '@angular/compiler/src/i18n/i18n_ast';


@Component({
  selector: 'app-real',
  templateUrl: './real.component.html',
  styleUrls: ['./real.component.scss']
})
export class RealComponent implements OnInit {
  parent: any = [];
  send_data: any;
  userdata: any = [];
  show : boolean = true
  constructor(private _Auth: AuthService, private router: Router, private http: HttpClient) {
    console.log('router data', this.router.getCurrentNavigation().extras.state);
    this.parent = this.router.getCurrentNavigation().extras.state;
  }
  isShow = false;

  ngOnInit() {
    
    // this._Auth.table$
    // .subscribe(
    //   message => {
    //     console.log('this is service data',message)
    //   }
    // )
  }
  displayemitdata($event) {
    this.parent.push($event);
    console.log('this is object data ====>', this.parent);
  }
  update(id) {
    this.isShow = !this.isShow
    
    var demo = JSON.parse(localStorage.getItem("id"));
    if (demo == 1) {
      console.log('this is updated data');
      this._Auth.edite(id).subscribe((data) => {
        console.log('this is edite data', data);
        this.send_data = data
        console.log('this is main data form server side And transerf in form', this.send_data)
        // this.router.navigate(['mat'],{state : data})
        this._Auth.sendMessage(this.send_data);
        this._Auth.hideButton(this.isShow);

      })
    } else {
        alert('u can not edite any record !!');
    }
  }

  delete(id, i) {
    var demo = JSON.parse(localStorage.getItem("id"));
    if (demo == 1) {
      console.log('deleted parent ====>', this.parent)
      this.parent.splice(i, 1);
      console.log('This is deleted id =====>', id)
      this._Auth.remove(id).subscribe((data) => {
        console.log('record is deleted');
      })
    } else {
      alert('u are not able to delete any record !!!');
    }
  }

  backHome(){
    this.router.navigate(['Home']);
  }


}
