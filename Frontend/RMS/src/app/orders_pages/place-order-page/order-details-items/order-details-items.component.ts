import { Component, EventEmitter, Input, Output } from '@angular/core';

@Component({
  selector: 'app-order-details-items',
  templateUrl: './order-details-items.component.html',
  styleUrls: ['./order-details-items.component.css']
})
export class OrderDetailsItemsComponent {
  @Input() items: any;
  @Output() quantityChange = new EventEmitter<void>(); // Emit event to CardComponent

  onItemQuantityChange() {
    this.quantityChange.emit(); // Re-emit the event
  }
}
