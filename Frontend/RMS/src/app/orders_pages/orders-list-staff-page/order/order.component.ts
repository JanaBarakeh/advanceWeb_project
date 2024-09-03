import { Component, inject, Input } from '@angular/core';
import { Router } from '@angular/router';
import { OrderService } from 'src/app/order-service/order.service';

@Component({
  selector: 'app-order',
  templateUrl: './order.component.html',
  styleUrls: ['./order.component.css']
})
export class OrderComponent {
 @Input() order: any;

 constructor(private router: Router) {}
 orderService = inject(OrderService);
 goToOrderDetailsPage() {
   const orderId = this.order.id;
   this.router.navigate(['/order-details', orderId]);
 }

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

