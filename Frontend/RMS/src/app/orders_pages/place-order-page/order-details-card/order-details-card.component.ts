import { Component } from '@angular/core';

@Component({
  selector: 'app-order-details-card',
  templateUrl: './order-details-card.component.html',
  styleUrls: ['./order-details-card.component.css']
})
export class OrderDetailsCardComponent {
  items = [
    { id: 1, name: 'Product 1', price: 29.99, quantity: 1, imageUrl: 'item2.jpg' },
    { id: 2, name: 'Product 2', price: 59.99, quantity: 2, imageUrl: 'assets/product2.jpg' },
  ]; // i will replace it with data from backend (get items from cart table  )
}
