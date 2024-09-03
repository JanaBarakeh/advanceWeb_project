import { Component, Input, Output, EventEmitter } from '@angular/core';
import { ReservationStatus } from 'src/app/table_reservation/enums/ReservationStatus';

@Component({
  selector: 'app-reservation-card',
  templateUrl: './reservation-card.component.html',
})
export class ReservationCardComponent {
  ReservationStatus = ReservationStatus;
  @Input() reservation: any;
  @Output() onCancel = new EventEmitter<number>();
  @Output() onOrder = new EventEmitter<number>();
  @Output() onViewOrders = new EventEmitter<number>();

  cancelReservation() {
    this.onCancel.emit(this.reservation.id);
  }

  order() {
    this.onOrder.emit(this.reservation.id);
  }

  viewOrders() {
    this.onViewOrders.emit(this.reservation.id);
  }
}
