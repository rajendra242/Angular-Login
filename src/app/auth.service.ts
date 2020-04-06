import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders} from '@angular/common/http';
import {Post} from './Post';
import { catchError } from 'rxjs/operators'
 
@Injectable({
  providedIn: 'root'
})
export class AuthService {
 
  form: any;
  // serverUrl = ();

  httpOption = {
    headers: new HttpHeaders({'Content-Type' : 'application/json'})
  }
  handleError: any;


  constructor(private http: HttpClient) { }

  createpost(Newpost : Post){
    console.log("the Post is ==>", Newpost);
    
    return this.http.post<Post>(`http://localhost/wordpress/wordpress//wp-json/wp/v2/pages?slug=Appointment
    &Name =${Post.name}
    &Phone=${Post.phone}
    &Email =${Post.email}
    &Description =${Post.discription}`
     + 'this is data',Newpost, this.httpOption)
    .pipe(
      catchError(this.handleError)
    );
  }



  // getUser(){
    // console.log("service calleed");
    // this._http.get("http://localhost/wordpress/wordpress/wp-json/wp/v2/users");
  // }

}

