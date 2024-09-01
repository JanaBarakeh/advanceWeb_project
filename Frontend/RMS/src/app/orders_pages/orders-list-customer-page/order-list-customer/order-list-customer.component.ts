import { Component, inject, Input, OnInit } from '@angular/core';
import { OrderService } from 'src/app/order-service/order.service';

@Component({
  selector: 'app-order-list-customer',
  templateUrl: './order-list-customer.component.html',
  styleUrls: ['./order-list-customer.component.css']
})
export class OrderListCustomerComponent implements OnInit{
  @Input() reservationId: any
  orders = [];
  orderService = inject(OrderService);

  ngOnInit(): void {
      this.getData(this.reservationId);
  }

  getData(reservationId: number){
    this.orderService.getOrdersForCustomer(reservationId).subscribe(orders => {
      this.orders = orders
      console.log(this.orders);
    })
  }
}

