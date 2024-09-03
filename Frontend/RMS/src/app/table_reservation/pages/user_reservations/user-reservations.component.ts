import { Component, inject, OnInit } from '@angular/core';
import { ReservationService } from '../../Services/ReservationService.service';
import { Router } from '@angular/router';
import { ReservationStatus } from 'src/app/table_reservation/enums/ReservationStatus';
import { AuthService } from 'src/app/user-service/auth.service';

@Component({
  selector: 'app-user-reservations',
  templateUrl: './user-reservations.component.html',
})
export class UserReservationsComponent implements OnInit {
  reservations: any[] = [];
  reservationService = inject(ReservationService);
  authService = inject(AuthService);

  constructor(private router: Router) {}

  ngOnInit() {
    this.reservationService.getUserReservations().subscribe((data: any) => {
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
    this.router.navigate([
      '/cart',
      localStorage.getItem('user_id'),
      reservationId,
    ]);
  }

  handleViewOrders(reservationId: number) {
    this.router.navigate(['/order-list-customer', reservationId]);
  }
}
