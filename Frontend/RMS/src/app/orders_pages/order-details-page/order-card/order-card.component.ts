import { Component, inject, Input, OnInit } from '@angular/core';
import { OrderService } from 'src/app/order-service/order.service';

@Component({
  selector: 'app-order-card',
  templateUrl: './order-card.component.html',
  styleUrls: ['./order-card.component.css']
})
export class OrderCardComponent implements OnInit{
  @Input() orderId :any
  orderItems = [];
  // [
  //   { id: 1, name: 'Product 1', price: 29.99, quantity: 1, imageUrl: 'item2.jpg' },
  //   { id: 2, name: 'Product 2', price: 59.99, quantity: 2, imageUrl: 'assets/product2.jpg' },
  //   { id: 2, name: 'Product 2', price: 59.99, quantity: 2, imageUrl: 'assets/product2.jpg' },

  // ]; // i will replace it with data from backend (get items from cart table  )

  orderService = inject(OrderService);

  ngOnInit(): void {
      this.getData(this.orderId);
  }

  getData(orderId: number){
    this.orderService.getOrderDetails(orderId).subscribe(orderItems => {
      this.orderItems = orderItems
      //console.log(this.orderItems);
    })
  }

}
