import { Component, inject, OnInit } from '@angular/core';
import { GetAllOrderForStaffService } from 'src/app/order-service/get-all-order-for-staff.service';

@Component({
  selector: 'app-orders-list',
  templateUrl: './orders-list.component.html',
  styleUrls: ['./orders-list.component.css']
})
export class OrdersListComponent implements OnInit {
  orders = [];
  orderService = inject(GetAllOrderForStaffService);

  ngOnInit(): void {
      this.getData();
  }

  getData(){
    this.orderService.getData().subscribe(orders => {
      this.orders = orders
      console.log(this.orders);
    })
  }
}
