import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders} from '@angular/common/http';
import {Post} from './Post';
import { catchError } from 'rxjs/operators'
import { Observable } from 'rxjs';
 
@Injectable({
  providedIn: 'root'
})
export class AuthService {
  json: any;
  form: any;
  // serverUrl = ();
  data: any;
  httpOption = {
    headers: new HttpHeaders({'Content-Type' : 'application/json'})
  }
  handleError: any;


  constructor(private http: HttpClient) { }

  // createpost(Newpost : Post){
  //   console.log("the Post is ==>", Newpost);
    
  //   return this.http.post<Post>(`http://localhost/wordpress/wordpress/wp-json/custom-plugin/appointment-book
  //   &user_name =${Post.name}
  //   &user_phone=${Post.phone}
  //   &user_email =${Post.email}
  //   &user_description =${Post.discription}`
  //    + 'this is data',Newpost, this.httpOption)
  //   .pipe(
  //     catchError(this.handleError)
  //   );


  Bookingappointment(Newbooking : Post) :  Observable<Post>{
    console.log("booking called", Newbooking);
    return this.http.post<Post>('http://localhost/wordpress/wordpress/wp-admin/admin-ajax.php',Newbooking,{
      headers : new HttpHeaders({
        'Content-Type' : 'application/json'
      })
      
    })
    .pipe(
          catchError(this.handleError)
       );
  }


  Dispalyappointment(demo){
    console.log('service called', demo);
    return this.http.get(`http://localhost/wordpress/wordpress/wp-json/custom-plugin/userbookingappointments?ID=${demo}`);

    // .subscribe(data => {
      // this.data.push(data);

        // console.log('this is booking data ===>',data)
    // });
  }

  // bookingappointment(Newbooking : Post){
  //   console.log('service called successfully', Newbooking)
  //     return this.http.post<Post>( `http://localhost/wordpress/wordpress/wp-admin/admin-ajax.php?
  //     id=${Post.id}&check=${Post.check}&
  //     name=${Post.name}&phone=${Post.phone}&
  //     email=${Post.email}&discription=${Post.discription}
  //     &action=${'ea_final_appointment'}`,+ 'hello', Newbooking)
  // }

  // getUser(){
    // console.log("service calleed");
    // this._http.get("http://localhost/wordpress/wordpress/wp-json/wp/v2/users");
  // }

}
