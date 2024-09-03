import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-order-item',
  templateUrl: './order-item.component.html',
  styleUrls: ['./order-item.component.css']
})
export class OrderItemComponent {
  @Input() item: any;

  incrementQuantity() {
    this.item.quantity++;
  }

  decrementQuantity() {
    if (this.item.quantity > 1) {
      this.item.quantity--;
    }

  }

  removeItem() {
    // Implement item removal logic
  }
}
