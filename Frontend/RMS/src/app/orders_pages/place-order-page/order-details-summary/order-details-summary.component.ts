import { Component, DoCheck, inject, Input, OnChanges, OnInit } from '@angular/core';
import { OrderService } from 'src/app/order-service/order.service';

@Component({
  selector: 'app-order-details-summary',
  templateUrl: './order-details-summary.component.html',
  styleUrls: ['./order-details-summary.component.css']
})
export class OrderDetailsSummaryComponent implements DoCheck{
  @Input() items: any; 
  @Input() reservationId: any
  @Input() userId: any


  itemsTotal = 0;
  total=0;
  discount = 0;
  
  orderService = inject(OrderService);


  ngDoCheck(): void {
    this.calculteTotal();
    console.log(this.items);
  }
  
   calculteTotal(){
    this.itemsTotal = 0; 
    this.items.forEach((item: { price: number; quantity: number; }) => {
      this.itemsTotal =  this.itemsTotal + (item.price * item.quantity);
    });
    this.total = this.itemsTotal - this.discount;
  }
  
  placeOrder(){
    console.log(this.items);
    this.orderService.placeOrder(this.reservationId, this.userId).subscribe(response =>
      console.log(response)
    )
    //to do:  delete item from cart.
    // dialoge
  }
}
