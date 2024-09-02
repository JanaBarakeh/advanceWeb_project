import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-order-details-item',
  templateUrl: './order-details-item.component.html',
  styleUrls: ['./order-details-item.component.css']
})
export class OrderDetailsItemComponent {
  @Input() item: any;

  incrementQuantity() {
    this.item.quantity++;
    //save to database
  }

  decrementQuantity() {
    if (this.item.quantity > 1) {
      this.item.quantity--;
      //save to database
    }

  }

  removeItem() {
    // Implement item removal logic
    // remove from cart table
  }
}
