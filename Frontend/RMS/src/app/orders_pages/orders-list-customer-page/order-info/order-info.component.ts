import { Component, inject, Input } from '@angular/core';
import { Router } from '@angular/router';
import { OrderService } from 'src/app/order-service/order.service';

@Component({
  selector: 'app-order-info',
  templateUrl: './order-info.component.html',
  styleUrls: ['./order-info.component.css']
})
export class OrderInfoComponent {
  @Input() order: any;

  constructor(private router: Router) {}
  orderService = inject(OrderService);
  
  goToOrderDetailsPage() {
    const orderId = this.order.id;
    const orderStatus = this.order.status;
    this.router.navigate(['/order-details', orderId, orderStatus]);
  }
}
