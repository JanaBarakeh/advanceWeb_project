import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable({ providedIn: 'root' })
export class TableService {
  constructor(private http: HttpClient) {}

  getReservedTables(): Observable<any> {
    const url = 'http://localhost:8000/api/tables/reserved';

    return this.http.get<any[]>(url);
  }

  getAvailableTables(): Observable<any> {
    const url = 'http://localhost:8000/api/tables/available';

    return this.http.get<any[]>(url);
  }
}
