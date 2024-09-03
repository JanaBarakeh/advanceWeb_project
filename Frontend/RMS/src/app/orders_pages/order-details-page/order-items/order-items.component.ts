import { Component, EventEmitter, Input, Output } from '@angular/core';
// @author Farah Elhasan

@Component({
  selector: 'app-order-items',
  templateUrl: './order-items.component.html',
  styleUrls: ['./order-items.component.css']
})
export class OrderItemsComponent {
  @Input() items: any;
  

}
