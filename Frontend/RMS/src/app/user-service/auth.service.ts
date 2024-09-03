import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root',
})
export class AuthService {
  constructor(private http: HttpClient) {}

  Login(email: string, password: string) {
    return this.http.post<any>('http://localhost:8000/api/login', {
      email: email,
      password: password,
    });
  }
  logout() {
    const token = localStorage.getItem('auth_token'); // Retrieve the token from localStorage or wherever you store it
    const headers = new HttpHeaders({
      Authorization: `Bearer ${token}`,
    });
    return this.http.post<any>(
      'http://localhost:8000/api/logout',
      {},
      { headers }
    );
  }
}
