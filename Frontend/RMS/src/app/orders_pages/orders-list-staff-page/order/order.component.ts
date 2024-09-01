import { Component, inject, Input } from '@angular/core';
import { OrderService } from 'src/app/order-service/order.service';

@Component({
  selector: 'app-order',
  templateUrl: './order.component.html',
  styleUrls: ['./order.component.css']
})
export class OrderComponent {
 @Input() order: any;

 orderService = inject(OrderService);


 updateStatus(newStatus: string) {
  this.order.status = newStatus;
  this.saveStatus(newStatus);
 }

 saveStatus(newStatus: string){
  this.orderService.updateOrderStatus(this.order.id, newStatus).subscribe(response =>
    console.log(response)
  )
 }
 
}

