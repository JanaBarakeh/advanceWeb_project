import { Component, Input } from '@angular/core';
// @author Farah Elhasan

@Component({
  selector: 'app-order-details',
  templateUrl: './order-details.component.html',
  styleUrls: ['./order-details.component.css']
})
export class OrderDetailsComponent {
  // @Input() userId :any
  // @Input() reservationId: any
  
  // i should replace them to be dynamic (pass or input) (from lemara and salah)
  userId =1;
  reservationId=1;
  // userId: number | undefined;
  // reservationId: number | undefined;
  // constructor(private route: ActivatedRoute) {}

  // ngOnInit() {
  //   this.userId = Number(this.route.snapshot.paramMap.get('userId'));
  //   this.reservationId = String(this.route.snapshot.paramMap.get('reservationId'));
  // }
}
