import { Injectable } from '@angular/core';
import { HttpClient,HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  constructor(private http: HttpClient) { }

  Login(email:string, password:string){
    return this.http.post<any>('http://localhost:8000/api/login',
      {
        email: email,
        password: password 
      } 
    );
  }
  logout() {
    const token = localStorage.getItem('sanctum_token'); // Retrieve the token from localStorage or wherever you store it
    const headers = new HttpHeaders({
      'Authorization': `Bearer ${token}`
    });
    return this.http.post<any>('http://localhost:8000/api/logout',{},{headers});
  }
  getUserById(userId: number): Observable<any> {
    return this.http.get(`http://localhost:8000/api/users/${userId}`);
  }
}
