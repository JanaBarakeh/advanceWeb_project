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
