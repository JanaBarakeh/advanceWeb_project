import { Component, inject, Input, OnInit } from '@angular/core';
import { OrderService } from 'src/app/order-service/order.service';

@Component({
  selector: 'app-order-details-summary',
  templateUrl: './order-details-summary.component.html',
  styleUrls: ['./order-details-summary.component.css']
})
export class OrderDetailsSummaryComponent{
  @Input() items: any; 
  @Input() reservationId: any
  @Input() userId: any


  itemsTotal = 0;
  total=0;
  discount = 0;
  
  orderService = inject(OrderService);


  ngOnChanges(): void {
    this.calculteTotal()
  }
  
   calculteTotal(){
    this.items.forEach((item: { price: number; quantity: number; }) => {
      this.itemsTotal =  this.itemsTotal + (item.price * item.quantity);
    });
    this.total = this.itemsTotal - this.discount;
  }
  
  placeOrder(){
    this.orderService.placeOrder(this.reservationId, this.userId).subscribe(response =>
      console.log(response)
    )
  }
}
