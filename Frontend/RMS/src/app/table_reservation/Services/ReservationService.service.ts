import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class ReservationService {
  getUserReservations(): Observable<any> {
    return this.http.get('http://localhost:8000/api/user/reservations');
  }

  private reservation: any;

  constructor(private http: HttpClient) {}

  setReservationData(data: any) {
    this.reservation = data;
  }

  reserveTable(data: any) {
    return this.http.post('http://127.0.0.1:8000/api/reservations', data);
  }

  checkAvailability(params: any) {
    return this.http.get(
      'http://127.0.0.1:8000/api/reservations/availability',
      {
        params,
      }
    );
  }
  getReservationData() {
    return this.reservation;
  }

  cancelReservation(reservationId: Number): Observable<any> {
    return this.http.delete(
      `http://localhost:8000/api/reservations/${reservationId}`
    );
  }

  getReservations(dateFilter: string | null): Observable<any> {
    let url = 'http://localhost:8000/api/reservations';
    if (dateFilter) {
      url += `?date=${dateFilter}`;
    }

    return this.http.get<any[]>(url);
  }
}
