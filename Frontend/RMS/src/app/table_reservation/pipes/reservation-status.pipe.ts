import { Pipe, PipeTransform } from '@angular/core';
import { ReservationStatus } from '../enums/ReservationStatus';

@Pipe({
  name: 'statusToString',
})
export class StatusToStringPipe implements PipeTransform {
  transform(value: number): string {
    switch (value) {
      case ReservationStatus.Pending:
        return 'Pending';
      case ReservationStatus.Canceled:
        return 'Canceled';
      case ReservationStatus.Completed:
        return 'Completed';
      case ReservationStatus.Started:
        return 'Started';
      default:
        return 'Unknown';
    }
  }
}
