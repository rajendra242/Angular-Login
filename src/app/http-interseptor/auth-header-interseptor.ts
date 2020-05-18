import { HttpInterceptor, HttpRequest, HttpHandler } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable()
export class AuthHeaderInterceptor implements HttpInterceptor {

    intercept(request: HttpRequest<any>, next: HttpHandler) {
        console.log('Good This Interceptor Is Work fine ====>');

        
        var requesturl = request.url
        console.log(request.url);
        var requestMethod = request.method


        // if (request.headers.has('Content-Type'))
        //     var contentType = request.headers.get('Content-Type');
        var UserId = JSON.parse(localStorage.getItem('id')) 
        if (requesturl == `http://localhost/wordpress/wordpress/wp-json/custom-plugin/userbookingappointments?userID=${UserId}`) {
            var data = JSON.parse(localStorage.getItem('email'))
            request = request.clone({
                setHeaders: {
                    auth: data,
                    // 'Content-Type' : 'application/json' 
                }

            })
        } else {
            console.log('Have nice day');
        }


        return next.handle(request);
    }
}