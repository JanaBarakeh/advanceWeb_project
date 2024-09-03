import { Component, inject, OnInit } from '@angular/core';
import { ReservationService } from '../../Services/ReservationService';

@Component({
  selector: 'app-reservation-table',
  templateUrl: './reservation-table.component.html',
})
export class ReservationTableComponent implements OnInit {
  reservations: any[] = [];
  filterDate: string | null = null;

  reservationService = inject(ReservationService);
  ngOnInit(): void {
    this.loadReservations();
  }

  loadReservations() {
    this.reservationService
      .getReservations(this.filterDate)
      .subscribe((data) => {
        this.reservations = data;
      });
  }
}
