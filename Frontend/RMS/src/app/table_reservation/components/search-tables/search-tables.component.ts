import { Component, inject, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ReservationService } from '../../Services/ReservationService.service';

@Component({
  selector: 'app-search-tables',
  templateUrl: './search-tables.component.html',
  styleUrls: ['./search-tables.component.css'],
})
export class SearchTablesComponent implements OnInit {
  reservationDate: string = '';
  reservationTime: string = '';
  numberOfPersons: number = 2;
  isAvailable: boolean = false;
  isChecked: boolean = false;
  notAvailable: boolean = false;
  pastCheck: boolean = false;

  hours: string[] = [];
  personsArray: number[] = Array.from({ length: 10 }, (_, i) => i + 1); // 1 to 10 persons

  constructor(private router: Router) {}

  ngOnInit() {
    this.populateHours();
  }

  populateHours() {
    for (let i = 0; i < 24; i++) {
      this.hours.push(i.toString().padStart(2, '0') + ':00');
    }
  }

  reservationService = inject(ReservationService);

  public checkAvailability() {
    const params = {
      date: this.reservationDate,
      time: this.reservationTime,
      numberOfPeople: this.numberOfPersons,
    };

    this.reservationService.checkAvailability(params).subscribe(
      (response: any) => {
        this.isAvailable = response.isAvailable;
        this.notAvailable = !this.isAvailable;

        console.log("I'm returned");
        console.log(this.isAvailable);
      },
      (error) => {
        this.pastCheck = true;
      }
    );
  }

  proceedToReservation() {
    const data = {
      date: this.reservationDate,
      time: this.reservationTime,
      numberOfPeople: this.numberOfPersons,
    };

    console.log('Inside proceed');

    this.reservationService.reserveTable(data).subscribe((response: any) => {
      console.log('Send a request');
      console.log(response);
      this.reservationService.setReservationData(response);
      this.router.navigate(['/reservation-details', response.id]);
    });
  }
}
