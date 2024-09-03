import { Component, EventEmitter, Input, Output } from '@angular/core';
// @author Farah Elhasan

@Component({
  selector: 'app-order-item',
  templateUrl: './order-item.component.html',
  styleUrls: ['./order-item.component.css']
})
export class OrderItemComponent {
  @Input() item: any;

 
}
