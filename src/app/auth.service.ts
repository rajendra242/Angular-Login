import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  constructor(private _http: HttpClient) { }
 
  getUser(){
    console.log("service calleed");
    // this._http.get("http://localhost/wordpress/wordpress/wp-json/wp/v2/users");
  }
}

