import { Component, EventEmitter, Input, Output } from '@angular/core';

@Component({
  selector: 'app-order-details-item',
  templateUrl: './order-details-item.component.html',
  styleUrls: ['./order-details-item.component.css']
})
export class OrderDetailsItemComponent {
  @Input() item: any;
  @Output() quantityChange = new EventEmitter<void>(); // Emit event on quantity change

  incrementQuantity() {
    this.item.quantity++;
    this.quantityChange.emit(); // Emit event
    console.log("emit");
  }

  decrementQuantity() {
    if (this.item.quantity > 1) {
      this.item.quantity--;
      this.quantityChange.emit(); // Emit event
    }
  }

  removeItem() {
    // Implement item removal logic
    // remove from cart table
  }
}
