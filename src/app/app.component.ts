import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit{
  project:any;

  constructor(private http: HttpClient){}

  ngOnInit(): void{
    //  this.http.get("http://localhost/wordpress/wordpress/index.php/wp-json/wp/v2/pages/18").subscribe(data => {
      //  for(let key in data){
      //    if(data.hasOwnProperty(key)){
      //      this.project.push(data[key]);
      //    }
      //  }
      //  console.log(data)
      //  this.project = data
    //  })
  }
  title = 'angular';
}
