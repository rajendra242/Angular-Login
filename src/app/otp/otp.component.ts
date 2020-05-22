import { Component, OnInit, ViewChild } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { AuthService } from '../auth.service';
// import { HttpHeaders } from '@angular/common/http';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Router } from '@angular/router';
import { CountdownComponent } from 'ngx-countdown';
import { config } from 'rxjs';


@Component({
  selector: 'app-otp',
  templateUrl: './otp.component.html',
  styleUrls: ['./otp.component.scss']
})
export class OtpComponent implements OnInit {
  otp: FormGroup;
  otpapi: any;
  email: any;
  timeGet : any;
  timerLeftTime: any;
  sec : any;
   config = {
    leftTime: 300,
    size: 'large',
    
    // demand: true
  };

  @ViewChild('countdown', { static: false }) private countdown: CountdownComponent;
  // this.countdown.begin();

  constructor(private _Auth: AuthService, private http: HttpClient, private router: Router) {
    console.log('router data', this.router.getCurrentNavigation().extras.state);
    this.email = this.router.getCurrentNavigation().extras.state;

    this.otp = new FormGroup({
      user_otp: new FormControl('', Validators.required),
      // password : new FormControl('',Validators.required)
    });
  }

  ngOnInit() {
    // this._Auth.otp1$
    // .subscribe(
    //   message => {
    //     console.log('this is service data',message)
    //     this.email = message;
    //     console.log("this is new email otp ====>",this.email)
    //   }
    // )
    //   setTimeout(() => {
    //     this.router.navigate(['login']);
    // }, 15000);

    // var timeLeft = sessionStorage.getItem('countDownLeftTime') || 3000
    // console.log("=====> Time sTore ", timeLeft);
    // console.log("==>*********==>",config)
    this.timerLeftTime = this.sec;
    this.timeGet = localStorage.getItem('time');
    console.log("********* New Timer ===>",this.timeGet);
    this.sec = Math.floor((this.timeGet/1000));
    console.log("=====> Second Format",this.sec);

  }
  OTP(value) {
    // this.countdown.begin()

    if (value == null) {
      setTimeout(() => {
        this.router.navigate(['login']);
      }, 60)
    }
    console.log("this is otp====>", value)
    console.log("this is function data ====>", this.email);
    // this._Auth.newOTP(value);

    var headers = new HttpHeaders().set('Content-Type', 'application/json; charset=UTF-8');
    headers = headers.append('otp', value.user_otp);
    this.otpapi = `http://localhost/wordpress/wordpress/wp-json/custom-plugin/OTP?user_email=${this.email}&random_number=${value.user_otp}`

    return this.http.get(this.otpapi, { headers, responseType: "text" }).subscribe((res) => {
      console.log("api call successfully");
      console.log("======> this is response", res)
      if (value.user_otp.length == 6 && res !== "Try Again") {
        this.router.navigate(['/newpass'])
      } else {
        alert('Try Again');
      }
    })

  }
  onTimerFinished(e: Event) {

    console.log("this is countdown ====>", e)


    if (e["action"] == "done") {
      localStorage.removeItem('time');
      this.router.navigate(['login'])
      alert('time is up')
    }


    let data = e
    this.timerLeftTime = e['left']
    console.log(data)
    setInterval((data) => {
      console.log(" ****** ", this.timerLeftTime)
      localStorage.setItem('time', JSON.stringify(this.timerLeftTime));
      this.checkTime(this.timerLeftTime)
    }, 1000)
  }


  checkTime(data) {
    console.log(data);
    this.timerLeftTime = data - 1000
  }



}
