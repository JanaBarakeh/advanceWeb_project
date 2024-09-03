import { Component, EventEmitter, Input, Output } from '@angular/core';
// @author Farah Elhasan

@Component({
  selector: 'app-order-details-items',
  templateUrl: './order-details-items.component.html',
  styleUrls: ['./order-details-items.component.css']
})
export class OrderDetailsItemsComponent {
  @Input() items: any;
  @Output() quantityChange = new EventEmitter<void>(); // Emit event to CardComponent4
  @Output() deleteItem = new EventEmitter<void>(); // Emit event on deleteItem

  onItemQuantityChange() {
    this.quantityChange.emit(); // Re-emit the event
  }

  onDeleteItem(){
    this.deleteItem.emit(); // Re-emit the event

  }
}
