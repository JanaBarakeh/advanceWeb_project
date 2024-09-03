import { Component, Input } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
// @author Farah Elhasan

@Component({
  selector: 'app-order-details',
  templateUrl: './order-details.component.html',
  styleUrls: ['./order-details.component.css']
})
export class OrderDetailsComponent {
  // @Input() userId :any
  // @Input() reservationId: any
  
  // i should replace reservation id to be dynamic (pass or input) 
  reservationId=1;
  userId: number | undefined;
  // reservationId: number | undefined;
  constructor(private route: ActivatedRoute) {}

  ngOnInit() {
    this.userId = Number(this.route.snapshot.paramMap.get('userId'));
    // this.reservationId = String(this.route.snapshot.paramMap.get('reservationId'));
  }
}
