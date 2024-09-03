import { Component, inject, OnInit } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { ReservationCardComponent } from '../../components/reservation-card/reservation-card.component';
import { ReservationService } from '../../Services/ReservationService';
import { Router } from '@angular/router';
import { ReservationStatus } from 'src/app/table_reservation/enums/ReservationStatus';

@Component({
  selector: 'app-user-reservations',
  templateUrl: './user-reservations.component.html',
})
export class UserReservationsComponent implements OnInit {
  reservations: any[] = [];
  reservationService = inject(ReservationService);

  constructor(private http: HttpClient, private router: Router) {}

  ngOnInit() {
    // Replace with actual API call to get user reservations
    this.http
      .get('http://localhost:8000/api/user/reservations', {
        headers: new HttpHeaders({
          Authorization: `Bearer 2|t95PAPV2NTUbwQX2EbbGNwhb7YG6Qsvj15jcMgon20071eb6`,
          Accept: 'application/json',
        }),
      })
      .subscribe((data: any) => {
        this.reservations = data;
        console.log(data);
      });
  }

  handleCancel(reservationId: number) {
    this.reservationService.cancelReservation(reservationId).subscribe((_) => {
      this.reservations.find((r) => r.id === reservationId).status =
        ReservationStatus.Canceled;
    });
  }

  handleOrder(reservationId: number) {
    const userId = 1;
    this.router.navigate(['/cart', userId, reservationId]);
  }

  handleViewOrders(reservationId: number) {
    this.router.navigate(['/order-list-customer', reservationId]);
  }
}
