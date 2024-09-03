import { Component, inject, OnInit } from '@angular/core';
import { OrderService } from 'src/app/order-service/order.service';
// @author Farah Elhasan

@Component({
  selector: 'app-orders-list',
  templateUrl: './orders-list.component.html',
  styleUrls: ['./orders-list.component.css']
})
export class OrdersListComponent implements OnInit {
  orders = [];
  orderService = inject(OrderService);

  ngOnInit(): void {
      this.getData();
  }

  getData(){
    this.orderService.getAllOrders().subscribe(orders => {
      this.orders = orders
      console.log(this.orders);
    })
  }
}
