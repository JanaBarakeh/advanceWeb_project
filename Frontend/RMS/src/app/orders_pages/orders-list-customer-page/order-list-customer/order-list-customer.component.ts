import { Component, inject, Input, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { OrderService } from 'src/app/order-service/order.service';
// @author Farah Elhasan

@Component({
  selector: 'app-order-list-customer',
  templateUrl: './order-list-customer.component.html',
  styleUrls: ['./order-list-customer.component.css']
})
export class OrderListCustomerComponent implements OnInit{
  //@Input() reservationId: any
  //reservationId =1; 
  // i need to replace it to be dynamic (pass or input) from salah: 
  reservationId: number | undefined;
  constructor(private route: ActivatedRoute) {}

  orders = [];
  orderService = inject(OrderService);

  ngOnInit(): void {
      this.reservationId = Number(this.route.snapshot.paramMap.get('reservationId'));
      this.getData(this.reservationId);
  }

  getData(reservationId: number){
    this.orderService.getOrdersForCustomer(reservationId).subscribe(orders => {
      this.orders = orders
      console.log(this.orders);
    })
  }
}

