import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Post } from './Post';
import { catchError } from 'rxjs/operators'
import { Observable, BehaviorSubject, Subject } from 'rxjs';
import { Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  json: any;
  form: any;
  // serverUrl = ();
  isLogged: BehaviorSubject<boolean>;
  user: any;
  alluser: any;
  data: any;
  httpOption = {
    headers: new HttpHeaders({ 'Content-Type': 'application/json' })
  }
  handleError: any;

  private _teacherMessageSource = new Subject<any>();
  teachermessage$ = this._teacherMessageSource.asObservable();


  private _hide = new Subject<any>();
  hide$ = this._hide.asObservable();
  
  
  constructor(private http: HttpClient, private router: Router) { }

  sendMessage(message: any) {
    this._teacherMessageSource.next(message);
  }

  hideButton(hide : any){
    this._hide.next(hide);
  }


  










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
  // }

  // Bookingappointment(Newbooking : Post) :  Observable<Post>{
  //   console.log("booking called", Newbooking);
  //   return this.http.post<Post>('http://localhost/wordpress/wordpress/wp-admin/admin-ajax.php',Newbooking,{
  //     headers : new HttpHeaders({
  //       'Content-Type' : 'application/json'
  //     })

  //   })
  //   .pipe(
  //         catchError(this.handleError)
  //      );
  // }


  Dispalyappointment(demo) {
    const headers = new HttpHeaders().set('Content-Type', 'application/json; charset=UTF-8');
    console.log('service called', demo);
    return this.http.get
      (`http://localhost/wordpress/wordpress/wp-json/custom-plugin/userbookingappointments?userID=${demo}`,
        // ('http://localhost/wordpress/wordpress/wp-json/custom-plugin/userbookingappointments',
        { headers, responseType: 'json' });

  }

  login(value) {
    localStorage.setItem("value", JSON.stringify(value));
    console.log('this is value of', value)
    return this.http.get(`http://localhost/wordpress/wordpress/wp-json/custom-plugin/login?username=${value.username}&password=${value.password}`)
  }


  isHomeright(): boolean {
    this.user = JSON.parse(localStorage.getItem('value'))
    console.log('this service user', this.user)
    console.log('this is user', this.user.username)
    if (this.user.username && this.user.password !== '') {
      return true;
    } else {
      return false;
    }
  }

  logout() {
    console.log('user is logout');
    localStorage.removeItem('value');
    localStorage.removeItem('id');
    this.router.navigate(['login']);
    return this.http.get('http://localhost/wordpress/wordpress/wp-json/custom-plugin/logout');

  }

  edite(id) {
    console.log("the id is ===>", id);
    const headers = new HttpHeaders().set('Content-Type', 'application/json; charset=UTF-8');
    // var demo = JSON.parse(localStorage.getItem("prim_id")); html batav na a button uper click kre atle id to malvu joi ne bhai button click par api call thai 6 and demo lakhel 6 a localstorej vadu id 6 and value.id kari ne no ave??try
    return this.http.get(`http://localhost/wordpress/wordpress/wp-json/custom-plugin/fatchdata?id=${id}`,
      { headers, responseType: 'json' })
  }

  editedata_put() {
    this.alluser = JSON.parse(localStorage.getItem('prim_id'))
    console.log("this is put id ===>", this.alluser)
    const headers = new HttpHeaders().set('Content-Type', 'application/json; charset=UTF-8');
    return this.http.put(`http://localhost/wordpress/wordpress/wp-json/custom-plugin/update?
    id=${this.alluser}
    `, { headers, responseType: 'json' });
  }

  remove(id) {
    // this.alluser = JSON.parse(localStorage.getItem('prim_id'))
    console.log('this is deleted user id ======>', id)
    const headers = new HttpHeaders().set('Content-Type', 'application/json; charset=UTF-8');
    return this.http.delete(`http://localhost/wordpress/wordpress/wp-json/custom-plugin/delete?id=${id}`,
      { headers, responseType: 'text' });
  }

  New(value) {
    const headers = new HttpHeaders().set('Content-Type', 'application/json; charset=UTF-8');
    console.log('this is name ====>',value.user_login);
    console.log('this is pass ====>',value.user_pass);
    console.log('this is nicename ====>',value.user_nicename);
    console.log('this is email ====>',value.user_email);
    console.log('this is resited ====>',value.user_registered);
    console.log('this is disp ====>',value.display_name);


    return this.http.post(`http://localhost/wordpress/wordpress/wp-json/custom-plugin/newuser?
    user_login=${value.user_login}
    user_pass=${value.user_pass}
    user_nicename=${value.user_nicename}
    user_email=${value.user_email}
    user_registered=${value.user_registered}
    display_name=${value.display_name}
    `,
      { headers, responseType: 'text' });

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
