import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-order-details-items',
  templateUrl: './order-details-items.component.html',
  styleUrls: ['./order-details-items.component.css']
})
export class OrderDetailsItemsComponent {
  @Input() items: any;
}
