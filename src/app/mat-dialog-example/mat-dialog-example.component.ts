import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
import { Post } from '../Post';
import { error } from 'protractor';
import { AuthService } from '../auth.service';
@Component({
  selector: 'app-mat-dialog-example',
  templateUrl: './mat-dialog-example.component.html',
  styleUrls: ['./mat-dialog-example.component.scss']
})
export class MatDialogExampleComponent implements OnInit {
  appointmentbooking: FormGroup;
  DataPost = new Post()
  error: any;
  postData: any;
  url = 'http://localhost/wordpress/wordpress/wp-json/custom-plugin/appointment-book';
  json;
  constructor(private http: HttpClient, private _Auth: AuthService) {
    this.appointmentbooking = new FormGroup({
      Name: new FormControl('', Validators.required),
      Phone: new FormControl('', Validators.required),
      Email: new FormControl('', Validators.required),
      Discription: new FormControl('', Validators.required)
    });
   
  }

  ngOnInit() {
  }
  BookAppointment(value) {
    this.postData = value
    this.http.post(this.url, this.postData).toPromise().then((data:any) =>{
      console.log('this is my data in ts file',this.postData)
      this.json = JSON.stringify(data.json)
      console.log(data.json)
    });
    

    //   this.http.get(`http://localhost/wordpress/wordpress//wp-json/wp/v2/pages?slug=Appointment
    //   &Name =${'value.name'}
    //   &Phone=${'value.phone'}
    //   &EMail =${'value.email'}
    //   &Description =${'value.Discription'}`)
    //   .subscribe(data => {
    //     console.log("Success", data)
    //     // this.router.navigate(['Home'], { state: value })
    //   },
    //   error => {
    //     console.error(" Error ", error)
    //   })

    // console.log("the value is ====>", value);
    
    // return this._Auth.createpost(value).subscribe(
    //   data => this.DataPost.push(data),
    //   error => this.error = error,
     
    // );
  }
}

