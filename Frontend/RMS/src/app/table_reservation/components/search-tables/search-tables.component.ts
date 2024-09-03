import { HttpClient } from '@angular/common/http';
import { Component, inject, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ReservationService } from '../../Services/ReservationService';

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

  hours: string[] = [];
  personsArray: number[] = Array.from({ length: 10 }, (_, i) => i + 1); // 1 to 10 persons

  constructor(private http: HttpClient, private router: Router) {}

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
    console.log('Buttono pressed!!!');
    this.http
      .get('http://127.0.0.1:8000/api/reservations/availability', { params })
      .subscribe((response: any) => {
        this.isAvailable = response.isAvailable;
        console.log("I'm returned");
        console.log(this.isAvailable);
      });
  }

  proceedToReservation() {
    const data = {
      date: this.reservationDate,
      time: this.reservationTime,
      numberOfPeople: this.numberOfPersons,
    };

    const headers = {
      Authorization:
        'Bearer 2|t95PAPV2NTUbwQX2EbbGNwhb7YG6Qsvj15jcMgon20071eb6',
      Accept: 'application/json',
    };

    console.log('Inside proceed');
    this.http
      .post('http://127.0.0.1:8000/api/reservations', data, { headers })
      .subscribe((response: any) => {
        console.log('Send a request');
        console.log(response);
        this.reservationService.setReservationData(response);
        this.router.navigate(['/reservation-details', response.id]);
      });
  }
}
