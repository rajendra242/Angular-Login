import { Injectable } from '@angular/core';
import { HttpRequest, HttpHandler, HttpEvent, HttpInterceptor } from '@angular/common/http';
import { Observable } from 'rxjs';


@Injectable()
export class JwtInterceptor implements HttpInterceptor {
    constructor() { }

    intercept(request: HttpRequest<any>, next: HttpHandler): Observable<HttpEvent<any>> {
        // add authorization header with jwt token if available
        let token= localStorage.getItem('token')

        if (token) {
            request = request.clone({
                setHeaders: {
                     'content-type': 'application/json',
                     'accept': 'application/json, application/xml',
                     'Access-Control-Allow-Origin': 'http://localhost:4200/',
                     'Authorization': `Bearer ${token}`
                }
            });
        }

        return next.handle(request);
    }
}