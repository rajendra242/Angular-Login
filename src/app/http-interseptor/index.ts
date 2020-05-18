import { HTTP_INTERCEPTORS } from '@angular/common/http';
import { AuthHeaderInterceptor } from './auth-header-interseptor';

export const httpInterceptProvidees = [
    {
        provide : HTTP_INTERCEPTORS,
        useClass : AuthHeaderInterceptor,
        multi : true
    }
];