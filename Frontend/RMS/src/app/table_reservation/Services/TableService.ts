import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable({ providedIn: 'root' })
export class TableService {
  constructor(private http: HttpClient) {}

  getReservedTables(): Observable<any> {
    const url = 'http://localhost:8000/api/tables/reserved';
    const headers = new HttpHeaders({
      Authorization:
        'Bearer 2|t95PAPV2NTUbwQX2EbbGNwhb7YG6Qsvj15jcMgon20071eb6',
      Accept: 'application/json',
    });

    return this.http.get<any[]>(url, { headers });
  }

  getAvailableTables(): Observable<any> {
    const url = 'http://localhost:8000/api/tables/available';
    const headers = new HttpHeaders({
      Authorization:
        'Bearer 2|t95PAPV2NTUbwQX2EbbGNwhb7YG6Qsvj15jcMgon20071eb6',
      Accept: 'application/json',
    });

    return this.http.get<any[]>(url, { headers });
  }
}
