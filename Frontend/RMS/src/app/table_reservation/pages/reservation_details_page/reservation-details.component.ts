import { Component, inject, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ReservationService } from '../../Services/ReservationService';

@Component({
  selector: 'app-reservation-details',
  templateUrl: './reservation-details.component.html',
})
export class ReservationDetailsComponent implements OnInit {
  reservation: any;
  reservationService = inject(ReservationService);

  constructor(private router: Router) {}

  ngOnInit() {
    this.reservation = this.reservationService.getReservationData();
  }
}
