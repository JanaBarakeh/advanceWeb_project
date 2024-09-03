import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { RangeValueAccessor } from '@angular/forms';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class ReservationService {
  private reservation: any;

  constructor(private http: HttpClient) {}
  setReservationData(data: any) {
    this.reservation = data;
  }

  getReservationData() {
    return this.reservation;
  }

  cancelReservation(reservationId: Number): Observable<any> {
    return this.http.delete(
      `http://localhost:8000/api/reservations/${reservationId}`,
      {
        headers: new HttpHeaders({
          Authorization:
            'Bearer 2|t95PAPV2NTUbwQX2EbbGNwhb7YG6Qsvj15jcMgon20071eb6',
          Accept: 'application/json',
        }),
      }
    );
  }

  getReservations(dateFilter: string | null): Observable<any> {
    let url = 'http://localhost:8000/api/reservations';
    if (dateFilter) {
      url += `?date=${dateFilter}`;
    }

    const headers = new HttpHeaders({
      Authorization:
        'Bearer 2|t95PAPV2NTUbwQX2EbbGNwhb7YG6Qsvj15jcMgon20071eb6',
      Accept: 'application/json',
    });

    return this.http.get<any[]>(url, { headers });
  }
}
